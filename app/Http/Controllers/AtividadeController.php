<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Http\Request;

class AtividadeController extends Controller {
    
    private $path = "fotos/atividades";

    public function index() {
        $data = Atividade::orderBy('data')->get();
        return view('atividade.index', compact('data'));
    }

    public function create() {
        return view('atividade.create');
    }

    public function store(Request $request) {
        $regras = [
            'nome' => 'required|max:100|min:10',
            'descricao' => 'required|max:1000|min:20',
            'data' => 'required',
            'foto' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        if($request->hasFile('foto')) {

            // Insert no Banco
            $reg = new Atividade();
            $reg->nome = $request->nome;
            $reg->descricao = $request->descricao;
            $reg->data = $request->data;
            $reg->save();    

            // Upload da Foto
            $id = $reg->id;
            $extensao_arq = $request->file('foto')->getClientOriginalExtension();
            $nome_arq = $id.'_'.time().'.'.$extensao_arq;
            $request->file('foto')->storeAs("public/$this->path", $nome_arq);
            $reg->foto = $this->path."/".$nome_arq;
            $reg->save();
        }
        
        return redirect()->route('atividade.index');
    }

    public function show($id) {
        
    }

    public function edit($id) {
        $dados = Atividade::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('atividade.edit', compact('dados'));    
    }

    public function update(Request $request, $id) {
     
        $regras = [
            'nome' => 'required|max:100|min:10',
            'descricao' => 'required|max:1000|min:20',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = Atividade::find($id);
        
        if(isset($reg)) {
            $reg->nome = $request->nome;
            $reg->descricao = $request->descricao;
            $reg->save();
        } else {
            return "<h1>ID: $id não encontrado!";
        }

        return redirect()->route('atividade.index');
    }

    public function destroy($id) {
        $reg=Atividade::find($id);

        if(!isset($reg)) { return "<h1>ID: $id não encontrado!"; }

        $reg->delete();

        return redirect()->route('atividade.index');
    }
}
