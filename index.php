<?php


if(!isset($_POST['submit'])){
    $url="https://api.weatherapi.com/v1/current.json?key=4020352bef2c4307b0282828211710&q=chandigarh&aqi=yes";
    $ch= curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,$url);
    $res=curl_exec($ch);
    curl_close($ch);
    $result=json_decode($res,true); 
   /* echo "<pre>";
    print_r($result);
*/
}
else{
  if(isset($_POST['submit'])){

        $city=$_POST['city'];
         if(strlen($city)<1){
            $url="https://api.weatherapi.com/v1/current.json?key=4020352bef2c4307b0282828211710&q=chandigarh&aqi=yes";
            $ch= curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,$url);
            $res=curl_exec($ch);
            curl_close($ch);
            $result=json_decode($res,true); 
    
         }
         if(strlen($city)>1){
            $url="https://api.weatherapi.com/v1/current.json?key=4020352bef2c4307b0282828211710&q=".$city."&aqi=yes";
            $ch= curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,$url);
            $res=curl_exec($ch);
            curl_close($ch);
            $result=json_decode($res,true);


         }
}
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link rel="stylesheet" href="style.css">
    <style>
        #submit{
           background-color:tomato;
           color:#fff;
  border-radius:10%;
           padding:10px;
           cursor: pointer;
           border:none;
           margin-left:10px;
        }
        h2{
            margin-top:10px;
        }
    </style>
</head>
<body>
     <div class="card">
    <h7 style="margin-left:150px;"><?php echo $result['location']['localtime'] ?></h7>
        <form method="POST">
<input type="text" class="city" name="city" placeholder="enter city name" style="border-radius:20px; height:30px; padding:0px; width:180px; margin-top:30px; padding-left:20px;"><input type="submit" value="submit" id="submit" name="submit">
       </form> 
       <h2 ><?php echo @$result['location']['name'] ?></h2>
       <h4 style=" margin-top:-10%;"><?php echo @$result['location']['country'] ?></h4>
        <div id="image">
            <img src="<?php echo $result['current']['condition']['icon'];?>" id="myImage" width="100" height="110" style="border-radius :50%; margin-left:30%;">
            
    
            </div>
   
        <h3 ><?php echo @$result['current']['condition']['text'];?><span>Wind <?php echo @round($result['current']['wind_kph']); ?> km/h<span class="dot">•</span> humidity <?php echo @$result['current']['humidity']; ?>%</span></h3>
        <h1 style="margin-bottom:20px;" >
             <?php echo round(@$result['current']['temp_c']); ?>°</h1>
      
        
    </div>
   
</body>
</html>
