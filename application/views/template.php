<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title;?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0;">
        
                          <?php

foreach ($styles as $style) {
    echo HTML::style('media/css/'.$style);
}

?>
        <script src="/media/js/jquery.min.js" type="text/javascript"></script>
          <?php

foreach ($scripts as $script) {
    echo HTML::script('media/js/'.$script);
}
?>
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