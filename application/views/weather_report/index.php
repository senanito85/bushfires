<?php
$apiKey = 'b960e9f6a75083344551bf0b2e217c08';
$cityId = 7839805;
$lat = -37.8131;
$lon = 144.9442;

/* 
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
$googleApiUrl = 'http://api.openweathermap.org/data/2.5/uvi?appid='.$apiKey.'&lat='..'&lon='.; 
*/
$googleApiUrl = 'https://api.openweathermap.org/data/2.5/forecast/?id='.$cityId.'&lang=en&units=metric&cnt=24&appid='.$apiKey;


$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
// echo "<pre>";var_dump($data);echo "</pre>";
$city     = $data->city->name;
$data     = $data->list;
$temp1_ma    = array();
$temp1_mi    = array();
$temp_today = 0;
$temp_today_min = 0;
$wind_today = 0;
$humidity_today = 0;
for($i=0;$i<=7;$i++){
$temp1_ma[]     = $data[$i]->main->temp_max;
$temp1_mi[]     = $data[$i]->main->temp_min;
$temp_today     = $temp_today + $data[$i]->main->temp_max;
$temp_today_min = $temp_today_min + $data[$i]->main->temp_min;
$wind_today     = $wind_today + $data[$i]->wind->speed; 
$humidity_today = $humidity_today + $data[$i]->main->humidity;
}
$wind_today = $wind_today/8;
$temp_today = $temp_today/8;
$temp_today_min = $temp_today_min/8;
$humidity_today = $humidity_today/8;
$fdi_today = (($temp_today*2)*($wind_today*2)) / ($humidity_today);

if($fdi_today>0){
    if($fdi_today>=0&&$fdi_today<=11){
    $angle_today = 10;
    }elseif($fdi_today>=11&&$fdi_today<=24){
    $angle_today = 40;
    }elseif($fdi_today>=24&&$fdi_today<=49){
    $angle_today = 70;
    }elseif($fdi_today>=49&&$fdi_today<=74){
    $angle_today = 110;
    }elseif($fdi_today>=74&&$fdi_today<=99){
    $angle_today = 140;
    }else{
    $angle_today = 170;
    } 
}

$temp2_ma    = array();
$temp2_mi    = array();
$temp_tomorrow = 0;
$temp_tomorrow_min = 0;
$wind_tomorrow = 0;
$humidity_tomorrow = 0;

for($i=8;$i<=15;$i++){
$temp2_ma[]     = $data[$i]->main->temp_max;
$temp2_mi[]     = $data[$i]->main->temp_min;
$temp_tomorrow     = $temp_tomorrow + $data[$i]->main->temp_max;
$temp_tomorrow_min = $temp_tomorrow_min + $data[$i]->main->temp_min;
$wind_tomorrow     = $wind_tomorrow + $data[$i]->wind->speed; 
$humidity_tomorrow = $humidity_tomorrow + $data[$i]->main->humidity;
}
$wind_tomorrow = $wind_tomorrow/8;
$temp_tomorrow = $temp_tomorrow/8;
$temp_tomorrow_min = $temp_tomorrow_min/8;
$humidity_tomorrow = $humidity_tomorrow/8;
$fdi_tomorrow = (($temp_tomorrow*2)*($wind_tomorrow*2)) / ($humidity_tomorrow);

if($fdi_tomorrow>0){
    if($fdi_tomorrow>=0&&$fdi_tomorrow<=11){
    $angle_tomorrow = 10;
    }elseif($fdi_tomorrow>=11&&$fdi_tomorrow<=24){
    $angle_tomorrow = 40;
    }elseif($fdi_tomorrow>=24&&$fdi_tomorrow<=49){
    $angle_tomorrow = 70;
    }elseif($fdi_tomorrow>=49&&$fdi_tomorrow<=74){
    $angle_tomorrow = 110;
    }elseif($fdi_tomorrow>=74&&$fdi_tomorrow<=99){
    $angle_tomorrow = 140;
    }else{
    $angle_tomorrow = 170;
    } 
}

$temp3_ma    = array();
$temp3_mi    = array();
$temp_tomorrow_after = 0;
$temp_tomorrow_after_min = 0;
$wind_tomorrow_after = 0;
$humidity_tomorrow_after = 0;
for($i=16;$i<=23;$i++){
$temp3_ma[]     = $data[$i]->main->temp_max;
$temp3_mi[]     = $data[$i]->main->temp_min;
$temp_tomorrow_after     = $temp_tomorrow_after + $data[$i]->main->temp_max;
$temp_tomorrow_after_min = $temp_tomorrow_after_min + $data[$i]->main->temp_min;
$wind_tomorrow_after     = $wind_tomorrow_after + $data[$i]->wind->speed; 
$humidity_tomorrow_after = $humidity_tomorrow_after + $data[$i]->main->humidity;
}
$wind_tomorrow_after = $wind_tomorrow_after/8;
$temp_tomorrow_after = $temp_tomorrow_after/8;
$temp_tomorrow_after_min = $temp_tomorrow_after_min/8;
$humidity_tomorrow_after = $humidity_tomorrow_after/8;
$fdi_tomorrow_after = (($temp_tomorrow_after*2)*($wind_tomorrow_after*2)) / ($humidity_tomorrow_after);

if($fdi_tomorrow_after>0){
    if($fdi_tomorrow_after>=0&&$fdi_tomorrow_after<=11){
    $angle_tomorrow_after = 10;
    }elseif($fdi_tomorrow_after>=11&&$fdi_tomorrow_after<=24){
    $angle_tomorrow_after = 40;
    }elseif($fdi_tomorrow_after>=24&&$fdi_tomorrow_after<=49){
    $angle_tomorrow_after = 70;
    }elseif($fdi_tomorrow_after>=49&&$fdi_tomorrow_after<=74){
    $angle_tomorrow_after = 110;
    }elseif($fdi_tomorrow_after>=74&&$fdi_tomorrow_after<=99){
    $angle_tomorrow_after = 140;
    }else{
    $angle_tomorrow_after = 170;
    } 
}

$uvi = 'https://api.openweathermap.org/data/2.5/uvi?appid='.$apiKey.'&lat='.$lat.'&lon='.$lon;
$dh = curl_init();

curl_setopt($dh, CURLOPT_HEADER, 0);
curl_setopt($dh, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($dh, CURLOPT_URL, $uvi);
curl_setopt($dh, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($dh, CURLOPT_VERBOSE, 0);
curl_setopt($dh, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($dh);
curl_close($dh);
$data = json_decode($response);
$to_uv = $data->value;
$to_uv = ($to_uv*5)-5;
?>


<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forecast Weather using OpenWeatherMap with PHP</title>

    <!-- fire rating meter css -->
    <style type="text/css">
        body{
          padding: 0;
          margin: 0;
          font-family: arial;
          font-size: 14px;
        }
        body *{
          box-sizing:border-box;
        }
        .report-container{
          padding: 0 10px;
          max-width: 1500px;
          width: 100%;
          margin: auto;
          display: table;
        }

        .fire-chart-wrap{
          width: 380px;
          float: left;
          margin-bottom: 25px;
          background: #f2f2f2;
          padding-top: 20px;
          padding-bottom: 10px;
        }

        @media(min-width: 1200px){
          .fire-chart-wrap{
            width: 32.3%;
            margin: 0.5%;
           } 
        }

        @media(max-width: 767px){
          .fire-chart-wrap{
            width: 100%;
           } 
        }

        .fire-rating-wrap{
          font-family: arial;
        }

        .fire-rating-wrap h2{
          text-align: center;
          margin-top: 8px;
          font-size: 26px;
          font-weight: bold;
        }
        .red{
            color: red;
        }
        .chart-skills {
          margin: 0 auto;
          padding: 0;
          list-style-type: none;
        }

        .chart-skills *,
        .chart-skills::before {
          box-sizing: border-box;
        }

        .graph-row{
          width: 100%;
          float: left;
        }

        /* CHART-SKILLS STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */

        .chart-skills {
          position: relative;
          width: 350px;
          height: 175px;
          overflow: hidden;
          font-family: arial;
        }

        .chart-skills::before,
        .chart-skills::after {
          position: absolute;
        }

        .chart-skills::before {
          content: '';
          width: inherit;
          height: inherit;
          border: 118px solid rgba(211, 211, 211, .3);
          border-bottom: none;
          border-top-left-radius: 175px;
          border-top-right-radius: 175px;
        }

        .chart-skills::after {
            content: ' ';
            left: 50%;
            bottom: 0px;
            transform: translateX(-50%);
            font-size: 1.1rem;
            font-weight: bold;
            color: cadetblue;
            background-image: url(https://amritanshukalia.com/santiano/fire.png);
            height: 57px;
            width: 59px;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .chart-skills li {
          position: absolute;
          top: 100%;
          left: 0;
          width: inherit;
          height: inherit;
          border: 118px solid;
          border-top: none;
          border-bottom-left-radius: 175px;
          border-bottom-right-radius: 175px;
          transform-origin: 50% 0;
          transform-style: preserve-3d;
          backface-visibility: hidden;
          animation-fill-mode: forwards;
          animation-duration: .4s;
          animation-timing-function: linear;
        }

        .chart-skills li:nth-child(1) {
          z-index: 6;
          border-color: #01af56;
          transform: rotate(30deg);
        }

        .chart-skills li:nth-child(2) {
          z-index: 5;
          border-color: #0098bd;
          transform: rotate(60deg);
        }

        .chart-skills li:nth-child(3) {
          z-index: 4;
          border-color: #f6ba48;
          transform: rotate(90deg);
        }

        .chart-skills li:nth-child(4) {
          z-index: 3;
          border-color: #f18544;
          transform: rotate(120deg);
        }

        .chart-skills li:nth-child(5) {
          z-index: 2;
          border-color: #f73a34;
          transform: rotate(150deg);
        }

        .chart-skills li:nth-child(6) {
          z-index: 1;
          border-color: #ed0710;
          transform: rotate(180deg);
        }

        .chart-skills span {
            position: absolute;
            font-size: 13px;
            backface-visibility: hidden;
            animation: fade-in .4s linear forwards;
            text-transform: uppercase;
            color: #000000;
            font-weight: 600;
        }

        .chart-skills li:nth-child(1) span {
            top: 39px;
            left: -102px;
            transform: rotate(-28.6deg);
        }

        .chart-skills li:nth-child(2) span {
            top: 27px;
            left: -89px;
            transform: rotate(-12deg);
        }

        .chart-skills li:nth-child(3) span {
            top: 25px;
            left: -96px;
            transform: rotate(-14.4deg);
        }

        .chart-skills li:nth-child(4) span {
          top: 28px;
          left: -98px;
          transform: rotate(-196deg);
        }

        .chart-skills li:nth-child(5) span {
          top: 25px;
          left: -98px;
          transform: rotate(-196deg);
        }

        .chart-skills li:nth-child(6) span {
          top: 3px;
          left: -107px;
          transform: rotate(-180deg);
        }

        .fire-alert{
          position: relative;
          width: 350px;
          height: 175px;
          overflow: hidden;
          margin: 40px auto 25px;
        }

        img{
          max-width: 100%;
        }

        .fire-meter-needle{
            display: inline-block;
            right: 50%;
            position: absolute;
            bottom: 0;
            -webkit-animation: move 5s infinite;
            transform: rotate(0deg);
            transform-origin:right;
            z-index: 99;

            border-top: 11px solid transparent;
            border-bottom: 11px solid transparent;
            border-right: 129px solid #f5e40e;
        }

        .needle-base{
            height: 20px;
            width: 20px;
            background: #000000;
            display: inline-block;
            right: 47%;
            position: absolute;
            bottom: 0px;
            z-index: 100;
            border-radius: 50%;
            border: 1px solid #000000;
        }
        
        .uv-graph *{
        box-sizing:border-box;
        }
        .uv-graph{
          height: 300px;
          max-width: 300px;
          width: 100%;
          position: relative;
          border-left: 3px solid #000000;
          border-bottom: 3px solid #000000;
          margin-left: 30px;
          margin-top: 40px;
          margin-bottom: 40px;
        }

        .uv-graph-point{
          /*background: #f2f2f2;*/
          /*position: absolute;*/
          left: 0;
          width: 100%;
          /*height: 100%;*/
          left: 0;
          bottom: 0;
          position: relative;
        }

        .uv-graph-point .uv-color{
          width: 25px;
          display: block;
          height: 100%;
        }
        .uv-graph-point.uv-low{
          height: 15%;
        }
        .uv-graph-point.uv-mod{
          height: 15%;
        }
        .uv-graph-point.uv-high{
          height: 10%;
        }
        .uv-graph-point.uv-vh{
          height: 45px;
        }
        .uv-graph-point.uv-extreme{
          height: 45%;
        }

        .uv-graph-point.uv-low .uv-color{
          background: #93c03d;
        }
        .uv-graph-point.uv-mod .uv-color{
          background: #f2e828;
        }
        .uv-graph-point.uv-high .uv-color{
          background: #f39339;
        }
        .uv-graph-point.uv-vh .uv-color{
          background: #e4372f;
        }
        .uv-graph-point.uv-extreme .uv-color{
          background: #a03b85;
        }

        .uv-graph-point .uv-title{
          position: absolute;
          font-size: 14px;
          text-transform: uppercase;
          font-family: arial;
          left: 35px;
          font-weight: 600;
          top:50%;
          -webkit-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .uv-graph-point:before{
          content: attr(data-label);
            position: absolute;
            top: 0;
            line-height: 0;
            left: -23px;
            font-size: 18px;
            font-weight: 600;
            width: 14px;
            text-align: right;
        }

        .uv-graph-point.uv-extreme:after{
          content: "15";
            position: absolute;
            top: 50%;
            line-height: 0;
            left: -23px;
            font-size: 18px;
            font-weight: 600;
            width: 14px;
            text-align: right;
        }

        .uv-arrow-point{
          position: absolute;
          right: 0;
          width: 95px;
          padding-left: 20px;
        }

        .uv-arrow{
          height: 15px;
          width: 75px;
          background: red;
          position: relative;
        }
        .uv-arrow:before{
          width: 0;
            height: 0;
            border: 0 solid transparent;
            border-top-width: 14px;
            border-bottom-width: 14px;
            border-right: 28px solid red;
            content: "";
            position: absolute;
            left: -19px;
            top: -7.5px;
        }
        .fire-info-wrap{
          text-align: center;
          font-size: 15px;
        }
        .fire-info-wrap>div{
          margin-bottom: 12px;
        }
    </style>
    <section class="banner-another ">
        <!-- Banner section Start-->
    </section>
</head>
<body>
<div class="report-container">
    <br>
    <h2><?php echo $city; ?> Weather</h2>
    <!-- chart1 -->
    <div class="fire-chart-wrap">
      <div class="fire-info-wrap">
        <strong>Today</strong>
        <div class="time">
	 <!--   <div><?php echo date("l g:i a", $currentTime); ?></div> -->
<br>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
         <!--   <div><?php echo ucwords($data->weather[0]->description); ?></div>  -->
        </div>
        <div class="weather-forecast">
           <?php echo min($temp1_mi); ?>C  - <span
                class="min-temperature"><?php echo max($temp1_ma); ?>C  </span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $humidity_today; ?> %</div>
            <div>Wind: <?php echo $wind_today; ?> km/h</div>
            <div>FDI: <?php echo $fdi_today; ?></div>
        </div>
      </div>  
      
      
      <div class="fire-rating-wrap">
      
        <div class="fire-alert">
            <ul class="chart-skills">
              <li>
                <span>low moderate</span>
              </li>
              <li>
                <span>high</span>
              </li>
              <li>
                <span>very high</span>
              </li>
              <li>
                <span>severe</span>
              </li>
              <li>
                <span>extreme</span>
              </li>
              <li>
                <span>catastrophic</span>
              </li>
            </ul>
            <?php if($angle_today): ?>
                <div class="fire-meter-needle" style="transform: rotate(<?php echo $angle_today;?>deg);"></div>
                <div class="needle-base"></div>
            <?php endif; ?>

        </div>
        <h2><span class="red">FIRE</span> DANGER RATING</h2>

      </div>
    </div>


    <!-- chart2 -->
    <div class="fire-chart-wrap"> 
      <div class="fire-info-wrap"> 
        <strong>Tomorrow</strong>
        <div class="time">
<!--             <div><?php echo date("l g:i a",strtotime('+1 day', $currentTime) ); ?></div> -->
<br>
            <div><?php echo date("jS F, Y",strtotime('+1 day', $currentTime)); ?></div>
         <!--   <div><?php echo ucwords($data->weather[0]->description); ?></div>  -->
        </div>
        <div class="weather-forecast">
           <?php echo min($temp2_mi); ?>C  - <span
                class="min-temperature"><?php echo max($temp2_ma); ?>C  </span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $humidity_tomorrow; ?> %</div>
            <div>Wind: <?php echo $wind_tomorrow; ?> km/h</div>
            <div>FDI: <?php echo $fdi_tomorrow; ?></div>
        </div>
      </div>
      
      
      <div class="fire-rating-wrap">
      
        <div class="fire-alert">
            <ul class="chart-skills">
              <li>
                <span>low moderate</span>
              </li>
              <li>
                <span>high</span>
              </li>
              <li>
                <span>very high</span>
              </li>
              <li>
                <span>severe</span>
              </li>
              <li>
                <span>extreme</span>
              </li>
              <li>
                <span>catastrophic</span>
              </li>
            </ul>
            <?php if($angle_tomorrow): ?>
                <div class="fire-meter-needle" style="transform: rotate(<?php echo $angle_tomorrow;?>deg);"></div>
                <div class="needle-base"></div>
            <?php endif; ?>

        </div>
        <h2><span class="red">FIRE</span> DANGER RATING</h2>

      </div>
    </div>


    <!-- chart3 -->
    <div class="fire-chart-wrap">  
      <div class="fire-info-wrap">
        <strong>Day after tomorrow</strong>
        <div class="time">
<!--             <div><?php echo date("l g:i a", $currentTime); ?></div> -->
<br>
            <div><?php echo date("jS F, Y",strtotime('+2 day', $currentTime)); ?></div>
         <!--   <div><?php echo ucwords($data->weather[0]->description); ?></div>  -->
        </div>
        <div class="weather-forecast">
	   <?php echo min($temp3_mi); ?>C  - <span
                class="min-temperature"><?php echo max($temp3_ma); ?>C  </span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $humidity_tomorrow_after; ?> %</div>
            <div>Wind: <?php echo $wind_tomorrow_after; ?> km/h</div>
            <div>FDI: <?php echo $fdi_tomorrow_after; ?></div>
        </div>
      </div>
      
      
      <div class="fire-rating-wrap">
      
        <div class="fire-alert">
            <ul class="chart-skills">
              <li>
                <span>low moderate</span>
              </li>
              <li>
                <span>high</span>
              </li>
              <li>
                <span>very high</span>
              </li>
              <li>
                <span>severe</span>
              </li>
              <li>
                <span>extreme</span>
              </li>
              <li>
                <span>catastrophic</span>
              </li>
            </ul>
            <?php if($angle_tomorrow_after): ?>
                <div class="fire-meter-needle" style="transform: rotate(<?php echo $angle_tomorrow_after;?>deg);"></div>
                <div class="needle-base"></div>
            <?php endif; ?>

        </div>
        <h2><span class="red">FIRE</span> DANGER RATING</h2>

      </div>
    </div>  
    <?php 
    if($to_uv): 
    $to_uv = $to_uv-3;  
    ?>
      <div class="graph-row">
        <br>
        <hr style="border: 2px solid red;" />
        <br>
         
         <br>
         <div style="display:flex">
              <div style="flex:1;padding-right:5px;">
                     <img src="includes/assets/images/fdiimage.jpg">
    
            </div>
                 <div style="flex:1;padding-left:5px;">
                      <img src="includes/assets/images/firedanger.jpg">
            </div>
         </div>


	<br>
        <hr style="border: 2px solid red;" />
        <br>

	<h2>UV Index for Today</h2>
        <div class="uv-graph">

          <div class="uv-graph-point uv-extreme" data-label="20">
            <span class="uv-color"></span>
            <span class="uv-title">extreme</span>
          </div>
          <div class="uv-graph-point uv-vh" data-label="11">
            <span class="uv-color"></span>
            <span class="uv-title">very hight</span>
          </div>
          <div class="uv-graph-point uv-high" data-label="8">
            <span class="uv-color"></span>
            <span class="uv-title">high</span>
          </div>
          <div class="uv-graph-point uv-mod" data-label="6">
            <span class="uv-color"></span>
            <span class="uv-title">mod</span>
          </div>
          <div class="uv-graph-point uv-low" data-label="3">
            <span class="uv-color"></span>
            <span class="uv-title">low</span>
          </div>
          
          <div class="uv-arrow-point" style="bottom:<?php echo $to_uv;?>%;">
            <div class="uv-arrow"></div>
          </div>
        </div>
      </div>
    <?php endif; ?>
</div>
</body>

</html>
