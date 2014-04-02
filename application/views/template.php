<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title;?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="/media/css/bootstrap.min.css" rel="stylesheet">
        <link href="/media/css/style.css" rel="stylesheet">
        
        <?php

foreach ($scripts as $script) {
    echo HTML::script('media/js/'.$script);
}
?>
        
     
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="/media/js/main.js" type="text/javascript"></script>
        
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0;">
        <link href="/media/css/bootstrap-responsive.min.css" rel="stylesheet">
    </head>
    <body>
        
        <? if(!Auth::instance()->get_user()): { ?>
            
   
             <div id="articles"><?= $loginbox; ?></div>
             
       
        <? }else:{?>
        <div id="wrap">
            <div class="push"></div>
            <div class="container"> 
                 <div id="nav">
            <ul class="nav nav-pills">
                <li class="<?=$work;?>" style="width: 150px;text-align: center;"><a href="/">Вакансии</a></li>
              <li class="<?=$postbook;?>" style="width: 150px;text-align: center;"><a href="postbook">Записная книжка</a></li>
              
             
            </ul>
            
          </div>
                <div class="page-header">
                    <h1><? echo $title;?> <small></small></h1>
                </div>				
            </div>
            <div class="container"> 
                <div id="articles"><?= $articles; ?></div>
               
            </div>
        </div>
             
              <? } endif;?>
    </body>
</html>