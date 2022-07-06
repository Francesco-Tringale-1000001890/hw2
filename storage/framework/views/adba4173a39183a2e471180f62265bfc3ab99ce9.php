<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $__env->yieldContent('css'); ?>
    <?php echo $__env->yieldContent('script'); ?>    
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Inspiration&display=swap" rel="stylesheet">
  </head>

  <body>
      <header>   
  <?php echo $__env->yieldContent('contenuto'); ?>
 </header>

 <section>
        

        <section id="comics_view">
        </section>
        <section id="comics_view_error">
        </section>

</section>

  </body>

</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/layouts/layout_profile.blade.php ENDPATH**/ ?>