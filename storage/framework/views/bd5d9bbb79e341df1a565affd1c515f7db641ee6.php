<?php $__env->startSection('titulo'); ?> Desenvolvimento Web <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="row">
    <div class="col">
        <table class="table align-middle caption-top table-striped">
            <caption>Tabela de <b>Atividades</b></caption>
            <thead>
            <tr>
                <th scope="col" class="d-none d-md-table-cell">ID</th>
                <th scope="col">NOME</th>
                <th scope="col" class="d-none d-md-table-cell">DESCRIÇÃO</th>
                <th scope="col">DATA</th>
                <th scope="col">FOTO</th>
                <th scope="col">AÇÕES</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td d-none d-md-table-cell><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->nome); ?></td>
                        <td class="d-none d-md-table-cell"><?php echo e($item->descricao); ?></td>
                        <td><?php echo e($item->data); ?></td>
                        <td><?php echo e($item->foto); ?></td>
                        <td>
                            <a href= "<?php echo e(route('atividade.edit', $item->id)); ?>" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                </svg>
                            </a>
                            <a nohref style="cursor:pointer" onclick="showRemoveModal('<?php echo e($item->id); ?>', '<?php echo e($item->nome); ?>')" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </a>
                        </td>
                        <form action="<?php echo e(route('atividade.destroy', $item->id)); ?>" method="POST" id="form_<?php echo e($item->id); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.main', ['menu' => "admin", 'submenu' => "Atividades",  'rota'=>"atividade.create"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/appbio-andrenicolas/resources/views/atividade/index.blade.php ENDPATH**/ ?>