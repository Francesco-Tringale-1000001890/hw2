<html>
  
  <head>
    <meta charset="utf-8">
    <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $__env->yieldContent('css'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
   <?php echo $__env->yieldContent('script'); ?> 
  </head>
  
  <body>
    <div id="overlay"></div>
      <main>
         <?php echo $__env->yieldContent('form'); ?>
      </main>
  </body>

</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/layouts/base.blade.php ENDPATH**/ ?>