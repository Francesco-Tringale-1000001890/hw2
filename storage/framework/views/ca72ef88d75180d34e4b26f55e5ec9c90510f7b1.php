

<?php $__env->startSection('title', '| login'); ?>

<?php $__env->startSection('css'); ?>
<link rel='stylesheet' href='<?php echo e(asset('css/login.css')); ?>'>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/login.js')); ?>' defer></script>
<script type="text/javascript">
    const LOGIN_ROUTE = "<?php echo e(route('login')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
<form name='sign_up' method='post' action="<?php echo e(route('login')); ?>">
<?php echo csrf_field(); ?>
              <div class="username"> 
                <label> Username <input type='text' name='username'> </label>
                <span></span>
              </div>
              <div class="password"> 
                <label> Password <input type='password' name='password'> </label>
              </div>
              <div id="accedi"> 
                <input type='submit' value='Accedi'>
              </div>
            <p id="crea_account">Non hai ancora un account? <a href="<?php echo e(route('registr')); ?>"> Registrati</a></p>
          </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/login.blade.php ENDPATH**/ ?>