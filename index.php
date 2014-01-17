<?php 
  function getContent ($path){
    if($file = file_get_contents($path)){
        return $file;
    } else {
        return file_get_contents("error/404.html");
    }

  }
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $url_object = parse_url($actual_link);
  $path_array = explode('/', $url_object['path']);
  $content = '';
  $title = 'Wired Horizon';
  switch($path_array[1]){
    case '': 
      $title = $title." | Resume";
      $content = getContent("partials/resume-body.html");
      break;
    case 'blog':
      $content = getContent("partials/blog.html");
      break;
    default:
      //header('Location: http://wiredhorizon.com');
  }
?>
<html>
  <title><?echo $title?></title>
  <link href="/assets/stylesheets/bootstrap.min.css" rel="stylesheet"></link>
  <link href="/assets/stylesheets/stylesheet.css" rel='stylesheet'></link>
  <link href="/assets/stylesheets/stylesheet_print.css" rel='stylesheet' type="text/css" media="print"></link>
  
  <body>
    <? echo $content ?>
  </body>
</html>
