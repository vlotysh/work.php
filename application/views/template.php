<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Works</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="/media/css/bootstrap.min.css" rel="stylesheet">
        <link href="/media/css/style.css" rel="stylesheet">
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
                <div class="page-header">
                    <h1><a href="/">Work!</a> <small></small></h1>
                </div>				
            </div>
            <div class="container"> 
                <div id="articles"><?= $articles; ?></div>
               
            </div>
        </div>
             
              <? } endif;?>
    </body>
</html>