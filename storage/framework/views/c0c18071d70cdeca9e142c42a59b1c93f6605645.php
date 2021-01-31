

<?php $__env->startSection('contenu'); ?>
<style>
    .form_livre {
        margin: 1em auto 2em;
        width: 400px;
        padding: 1em;
        border: 1px solid #CCC;
        border-radius: 1em;
    }

    form div+div {
        margin-top: 1em;
    }

    input {
        font: 1em sans-serif;
        width: 365px;
        box-sizing: border-box;
        border: 1px solid #999;
    }

    input:focus {
        border-color: #000;
    }
</style>
<div class="container bootstrap snipets">
    <h1 class="text-center text-muted">Votre bibliothèque</h1>
    <div class="row">
        <?php if(auth()->user()->posseder->isEmpty()): ?>
            <p>Vous ne possedez aucun livre</p>
        <?php else: ?>
            <?php $__currentLoopData = auth()->user()->posseder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product tumbnail thumbnail-3">
                    <a href="<?php echo e(route('livre', [$l->id])); ?>">
                        <img src="https://via.placeholder.com/250<?php // echo "images/".$livres->photo;?>" alt="" class="image_produit">
                    </a>
                    <div class="caption">
                        <h6><a href="<?php echo e(route('livre', [$l->id])); ?>"><?php echo e($l->titre); ?></a> 
                        <span class="auteur"><?php echo e($l->auteur); ?></span></h6>
                        <span class="price"><?php echo e($l->prix); ?>€</span>
                        <form action="/livre/<?php echo e($l->id); ?>/possede" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('delete')); ?>

                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> 
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <div class="container bootstrap snipets">
        <h1 class="text-center text-muted">Ajouter un livre</h1>
        <form class="form_livre" action="/livre/ajouter" method="post">
            <?php echo e(csrf_field()); ?>

            <div>
                <input type="string" name="titre" placeholder="Titre">
            </div>
            <div>
                <input type="string" name="auteur" placeholder="Auteur">
            </div>
            <div>
                <input type="string" name="prix" placeholder="Prix">
            </div>
            <div>
                <input type="string" name="note" placeholder="Note"  min="0" max="5">
            </div>
            <div>
                <input type="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>                 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\controle\resources\views/profil.blade.php ENDPATH**/ ?>