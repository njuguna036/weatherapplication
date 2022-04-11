<html>
<?php
if(array_key_exists('submit',$_GET)){
    //checking if the input is empty
    if(!$_GET['city']){

        $error="Sooory, your input field is empty";
    }
    if($_GET['city']){
        $apiData=file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".
        $_GET['city'] ."&APPID=04b396ca89f89da2dadb48dac9575a7e"
        );
        $weatherArray=json_decode($apiData,true);
        $weather=$weatherArray['weather']['0']['description'];
        //temp from celsius to kelvin
        $tempCelsius=$weatherArray['main']['temp']-273.15;
        $pressure=$weatherArray['main']['pressure'];
        $wind=$weatherArray['wind']['speed'];
       // $sunrise=$weatherArray['sys']['sunrise'];
        
        
     
    }
    
}
?>
<title>weather api</title>
<link rel="stylesheet" href="weather.css">

<body>
<div class="container">
<h1>Search Global weather</h1>
<form action="" method="GET">


<label for="city">Enter your city</label>
<input type="text" name="city",id="city" placeholder="Enter your city">
<button type="submit" name="submit" class="btn btn-sucess">Submit now</button>
</form>
</div>

<div class="output">
    <?php
      if($weather){
        echo "weather condition is  :". $weather. "";
        echo "<br>";
        echo "city's temparature is :". $tempCelsius. "";
        echo "<br>";
        echo "City's Atmospheric pressure is :". $pressure. "pscal";
        echo "<br>";
        echo "wind speed is :". $wind."meter/second";
        //echo "time in the city :". $sunrise. "";
    }else{
        echo $error;
    }
    
    ?>
</div>



</body>




    </html>