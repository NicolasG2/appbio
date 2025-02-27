<?php $__env->startSection('titulo'); ?> Desenvolvimento Web <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

<form action="<?php echo e(route('material.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>  
    <div class="row">
        <div class="col" >
            <div class="form-floating mb-3">
                <input 
                    type="text" 
                    class="form-control <?php if($errors->has('nome')): ?> is-invalid <?php endif; ?>" 
                    name="nome" 
                    placeholder="Nome"
                    value="<?php echo e(old('nome')); ?>"
                />
                <label for="nome">Nome</label>
                <?php if($errors->has('nome')): ?>
                    <div class='invalid-feedback'>
                        <?php echo e($errors->first('nome')); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3">
                <textarea
                    type="text"
                    class="form-control <?php if($errors->has('descricao')): ?> is-invalid <?php endif; ?>"
                    name="descricao"
                    placeholder="Descrição"
                    style="min-height: 100px"
                ><?php echo e(old('descricao')); ?></textarea>
                <label for="descricao">Descrição</label>
                <?php if($errors->has('descricao')): ?>
                    <div class='invalid-feedback'>
                        <?php echo e($errors->first('descricao')); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col" >
            <div class="input-group mb-3">
                <span class="input-group-text bg-success text-white">Foto</span>
                <input class="form-control <?php if($errors->has('foto')): ?> is-invalid <?php endif; ?>" type="file" name="foto"/>
                <?php if($errors->has('foto')): ?>
                    <div class='invalid-feedback'>
                        <?php echo e($errors->first('foto')); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="<?php echo e(route('material.index')); ?>" class="btn btn-secondary btn-block align-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                </svg>
                &nbsp; Voltar
            </a>
            <button type="submit" class="btn btn-success btn-block align-content-center">
                Confirmar &nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </button>
        </div>
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.main', ['menu' => "admin", 'submenu' => "Novo Material"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/appbio-andrenicolas/resources/views/material/create.blade.php ENDPATH**/ ?>