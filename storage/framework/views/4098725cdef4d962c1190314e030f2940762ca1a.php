

<?php $__env->startSection('title', '| profile'); ?>

<?php $__env->startSection('css'); ?>
<link rel='stylesheet' href='<?php echo e(asset('css/profile.css')); ?>'>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/profile.js')); ?>' defer></script>
<script type="text/javascript">
    const CSFR_TOKEN = '<?php echo e(csrf_token()); ?>';
    const REMOVE_LIKES_PROFILE = "<?php echo e(route('remove_likes_profile')); ?>";
    const STAMPA_LIKES = "<?php echo e(route('stampa_likes')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenuto'); ?>
<div id="overlay"> </div> 

           <nav>
                  <div id="collegamenti">
                      <a href="<?php echo e(route('home')); ?>"> HOME  </a>
                      <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT </a>
                  </div>

                <div id="menu">
                  <div></div>
                  <div></div>
                  <div></div>
               </div>

          </nav>

           
               <h1><strong> BENTORNATO </strong></h1> 
               
                <!--se non ho fatto il login non ho nessuna variabile di sessione settata, si ritorna login-->
                      <h2><?php echo e($username_sessione); ?> </h2>; <!-- nel ProfileController passiamo il valore con with alla view profile -->
                

                
                
               <form  name ='search_comics' id='stampa_comics'   >
               <?php echo csrf_field(); ?>
               
                <input type="submit" id="mostra_comics" value="Mostra i miei fumetti preferiti">
                </form>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">  <!-- Inserire il form per il logout -->
        <?php echo csrf_field(); ?>
        </form>
              
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/profile.blade.php ENDPATH**/ ?>