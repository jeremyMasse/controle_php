

<?php $__env->startSection('contenu'); ?>
<?php 
//   if (!empty($_GET['id'])){
//     $livres = DB::select("SELECT *  FROM livre WHERE id = '$_GET[id]' "); 
//     foreach($livres as $livre){}}
    $i = 0;
    $rempli = "★";
    $vide = "☆";
    if ($i > 5){
      $max = 5;
    }
    else{
      $max = $i;
    }
    $i = 0;?> 
<div class="container_prod">
    <div class="col-lg-9">
      <div class="card mt-4 card-flex">
        <img class="card-img-top img-fluid" src="<?php //echo "images/".$livre->photo;?>" alt="">
        <div class="card-body">
          <h3 class="card-title"> <?php echo e($livre->titre); ?> </h3>
          <p class="card-text espace-prod"><?php echo e($livre->description); ?></p>
          <span class="text-warning">
            <?php while($i < 5): ?>
              <?php if($i < $livre->note): ?>
                <?php echo e($rempli); ?>

              <?php else: ?>
                <?php echo e($vide); ?>

              <?php endif; ?>
              <?php $i = $i + 1; ?>
            <?php endwhile; ?>
          </span>
          <h4 class="prix-prod">Prix : <?php echo e($livre->prix); ?>€</h4>
        </div>
    </div>
    <?php if(auth()->guard()->check()): ?>
        <div class="card mt-4 paiement_prod"> 
            <form action="<?php echo e($livre->id); ?>/possede" method="post">
                <?php echo e(csrf_field()); ?>

                <?php if(auth()->user()->possession($livre)): ?>
                    <?php echo e(method_field('delete')); ?>

                    <button type="submit" class="btn btn-primary">Enlever de ma bibliothèque</button>
                <?php else: ?>
                    <?php echo e(method_field('post')); ?>

                    <button type="submit" class="btn btn-primary">Ajouter a ma bibliothèque</button>
                <?php endif; ?>
            </form>
        </div>
    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Avis acheteur
      </div>
      <div class="card-body">
<!--  
          <?php for($i = 0; $i < $max; $i++): ?>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> <?php echo e($avi[$i]->note); ?>

            <p><?php echo e($avi[$i]->description); ?></p>
            <small class="text-muted">Posté le <?php echo e($avi[$i]->date_avi); ?> </small>
            <hr>
          <?php endfor; ?>
        <?php else: ?> -->
          <p>Il n'y a aucun avi pour ce livre</p>
        <!-- <?php endif; ?> -->
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\php\controle\resources\views/livre.blade.php ENDPATH**/ ?>