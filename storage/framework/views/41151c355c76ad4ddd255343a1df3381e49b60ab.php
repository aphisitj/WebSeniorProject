Hello, <?php echo e($name.' '.$lname); ?> <br/>

<?php if($name=='Aphisit'): ?>
 yes
<?php else: ?>
 no
<?php endif; ?>

<hr/>

<?php foreach($people as $person): ?>
  <?php echo e($person); ?><br/>
 <?php endforeach; ?>
