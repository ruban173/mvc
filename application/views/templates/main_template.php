<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Cache-Control" content="no-cache">
      <title>Тестовое задание</title>
      <script src="application/views/templates/js/bootstrap.min.js"></script>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link href="/application/views/templates/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="/application/views/templates/js/bootstrap.js"></script>
   </head>
   <body>
      <div class="navbar navbar-inverse" style="border-radius:0;" role="navigation" >
         <div class="container ">
            <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav  ">
                  <li class=""><a href="/">Главная</a></li>
                  <?php
                     if (isset($_COOKIE['user']))
                     	{
                     	$user = Users::userData();
                     	print '<li ><a href="/autorization/exit">Выйти (' . $user['login'] . ')</a></li> ';
                     	}
                       else print '<li class=""><a href="/autorization">Войти</a></li>';
                     ?>
               </ul>
            </div>
            
         </div>
      </div>
      <div class="container-flour">
         <div class="row" style="padding-left:20px;padding-right:20px;">
            <div class="col-lg-12">
               <?php
                  include 'application/views/' . $content_view;
                   ?>
            </div>
         </div>
      </div>
   </body>
</html>