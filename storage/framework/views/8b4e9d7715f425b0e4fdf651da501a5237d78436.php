

<?php $__env->startSection('title', '| registrazione'); ?>

<?php $__env->startSection('css'); ?>
<link rel='stylesheet' href='<?php echo e(asset('css/registr.css')); ?>'>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/registr.js')); ?>' defer></script>
<script type="text/javascript">
    const REGISTR_ROUTE = "<?php echo e(route('registr')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
<form name='sign_up' method='post' action="<?php echo e(route('registr')); ?>">
    <?php echo csrf_field(); ?>
              <div class="nome">
                <label> Nome <input type='text' name='nome' > </label>
                <span></span>
              </div>
              <div class="cognome"> 
                <label> Cognome <input type='text' name='cognome' > </label>
                <span></span>
              </div>
              <div class="username"> 
                <label> Username <input type='text' name='username' > </label>
                <span></span>
              </div>
              <div class="email"> 
                <label> Email <input type='text' name='email' > </label>
                <span></span>
              </div>
              <div class="password"> 
                <label> Password <input type='password' name='password'> </label>
                <span></span>
              </div>
              <div class="registrati" id="div_registrati"> 
                <input type='submit' id='submit' name='Registrati' value='Registrati' > 
              </div>
              <p id="log">Hai già un account? <a href="<?php echo e(route('login')); ?>"> Accedi</a></p>
          </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/registr.blade.php ENDPATH**/ ?>