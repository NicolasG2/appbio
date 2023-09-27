<?php $__env->startSection('titulo'); ?> Desenvolvimento Web <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/atividade.css')); ?>">

<div class="row mb-3">
    <div class="col">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush_<?php echo e($item->id); ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                            <span class="descricao fs-5"><?php echo e($item->nome); ?></span>
                        </button>
                    </h2>
                    <div id="flush_<?php echo e($item->id); ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-2 col-xs-12">         
                                <a nohref style="cursor:pointer" onclick="showFotoModal('<?php echo e(asset('storage/')); ?>', '<?php echo e($item->foto); ?>')">
                                <a nohref style="cursor:pointer"
                                    onclick="showFotoModal('<?php echo e(asset('storage/')); ?>', '<?php echo e($item->foto); ?>')">
                                </div>
                                <div class="col-md-10 col-xs-12 d-flex align-items-center justify-content-center">
                                    <p class="descricao fs-6"><?php echo e($item->descricao); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.main', ['menu' => "list", "submenu" => "Atividades"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/appbio-andrenicolas/resources/views/site/atividade.blade.php ENDPATH**/ ?>