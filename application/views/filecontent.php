

<form action="filecontent" method="POST">
    <p><?php echo Form::textarea('code', $file,array('class'=>'php','' => ''));?></p>
<p><input type="submit"></p>
</form>
<?php if($error != ''):?> <p><?=$error;?></p> <?php endif;?>
<?php if($message != ''):?> <p><?= $message;?></p> <?php endif;?>
