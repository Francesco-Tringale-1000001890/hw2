

<?php $__env->startSection('title', '| home'); ?>

<?php $__env->startSection('css'); ?>
<link rel='stylesheet' href='<?php echo e(asset('css/home.css')); ?>'>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/home.js')); ?>' defer></script>
<script type="text/javascript">
    const CSFR_TOKEN = '<?php echo e(csrf_token()); ?>';
    const HOME_ROUTE = "<?php echo e(route('home')); ?>";
    const CHECK_LIKE_OR_UNLIKE_ROUTE = "<?php echo e(route('check_like_or_unlike')); ?>";
    const ADD_LIKES_ROUTE = "<?php echo e(route('add_likes')); ?>";
    const REMOVE_LIKES_ROUTE = "<?php echo e(route('remove_likes')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenuto'); ?>
<div id="overlay"> </div> 

           <nav>
                  <div id="collegamenti">
                      <a href="<?php echo e(route('profile')); ?>"> PROFILO </a>
                      <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT </a>
                      <!--Mi permette di mandare una richiesta post perche' di default e' una richiesta get e tramite
                      event.prevent tolgo questo comportamento di default, invece documente... e' un form che non si 
                    vede ma serve per mandare la richiesta post-->
                  </div>

                <div id="menu">
                  <div></div>
                  <div></div>
                  <div></div>
               </div>

          </nav>

           <h1> 
                Cerca il tuo fumetto  
           </h1>
               <form  name ='search_comics' id='search_comics'   >
                  <?php echo csrf_field(); ?>
                <input type='text' name ='content' id='content' placeholder="Digita il nome di un supereroe (Example: Hulk, X-man, Spider-man, Iron-man...)" >
                <input type="submit" id="submit" value="Conferma scelta">
              </form>

              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">  <!-- Inserire il form per il logout -->
                  <?php echo csrf_field(); ?>
              </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/home.blade.php ENDPATH**/ ?>