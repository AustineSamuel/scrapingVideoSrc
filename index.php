<?php
$output=[];
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(file_exists('simplehtmldom_1_9_1/simple_html_dom.php')){
  include 'simplehtmldom_1_9_1/simple_html_dom.php';
  }
  else if(!file_exists('simplehtmldom_1_9_1/simple_html_dom.php')){
    exit("DOM file not found");
  }
  else{
    exit("fail to load files");
  }
  
if(isset($_POST["url"])){

  $url=$_POST["url"];
$html = file_get_html($url); 

$video=$html->find('video');
if(count($video)<=0){
  array_push($output,"no video element found in ".$url." please try  another video website "
  );
 }
 foreach($video as $element){
      array_push($output,array(
        "type"=>"videoUrl",
        "description"=>$element->title,
        "src"=>$element->src
      ));
    
  }
}
else{
  array_push($output,array(
    "type"=>"videoUrl",
    "description"=>"NO data to see , Enter a video website and all video links (URLs)",
    "src"=>null
  ));
}
}
else{
  array_push($output,array(
    "type"=>"videoUrl",
    "description"=>"NO data to see , Enter a video website and all video links (URLs)",
    "src"=>null
  ));
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sraping video src PHP</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="lib/w3css.css">
  <link rel="stylesheet" href="lib/cssLibrary.css">
<script src="lib/jquery3.js"></script>
<script src="lib/MfunctionsLap.js"></script>
</head>
<body>
  <nav>
    Scraping || Video URls
  </nav>
<br>
<div id="box">
  <section class="W w3-padding">
    Get all Video URL of any website in JSON format
  </section>
<form class="w3-padding" method="post">
  <b>WEB LINK:</b>
  <input class="w3-padding w3-block" type="url" name="url" placeholder="Enter web URL : https://videos.com" required><button type="submit" class="w3-button w3-green" style="margin-top:3px;">start</button>
</form>

</div>

<h2 class="w3-padding">SRC JSON FORMAT</h2>

<div id="box">
  <p id="dataHolder" hidden><?php echo json_encode($output);?>
</p>
<textarea value="<?php echo json_encode($output);?>" class="w3-block w3-code" disabled>
</textarea>
<button class="w3-button w3-green" id="copy">COPY</button>
</div>
<footer class="w3-padding  w3-center w3-black">
  <a  style="color:white;text-decoration: underline !important;" href="https://austinesamuel.netlify.app" >Austine Samuel </a>API Projects 2021
</footer>
<div id="loader" class="flexCenter fixedTop">
<div class="w3-padding">PLease Wait...</div>

</div>
</body>
<script src="fileJs.js"></script>
</html>