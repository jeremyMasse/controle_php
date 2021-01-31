

<?php $__env->startSection('contenu'); ?>

    <div class="container bootstrap snipets">
    <h1 class="text-center text-muted">Bibliothèque de livre</h1>
    <div class="row flow-offset-1">
    <?php $__currentLoopData = $livres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div class="col-xs-6 col-md-4 produit">
       <div class="product tumbnail thumbnail-3">
          <a href="<?php echo e(route('livre', [$l->id])); ?>">
            <img src="https://via.placeholder.com/250<?php // echo "images/".$livres->photo;?>" alt="" class="image_produit">
          </a>
          
         <div class="caption">
           <h6><a href="<?php echo e(route('livre', [$l->id])); ?>"><?php echo e($l->titre); ?></a> 
           <span class="auteur"><?php echo e($l->auteur); ?></span></h6>
            <span class="price"><?php echo e($l->prix); ?>€</span>
         </div>
       </div>
     </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\php\controle\resources\views/catalogue.blade.php ENDPATH**/ ?>