
    <!-- fire rating meter css -->
    <style type="text/css">
        .fire-rating-wrap{
          font-family: arial;
          width: 350px;
        }

        .fire-rating-wrap h2{
          text-align: left;
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
          margin: 40px 0 25px;
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
    </style>
<?php

$currentTime = time();
// echo "<pre>";var_dump($data);echo "</pre>";
$temp     = $data->main->temp_max;
$wind     = $data->wind->speed; 
$humidity = $data->main->humidity;
$fdi = (($temp*2)*($wind*2)) / ($humidity);
if($fdi>0){
    if($fdi>=0&&$fdi<=11){
    $angle = 10;
    }elseif($fdi>=11&&$fdi<=24){
    $angle = 40;
    }elseif($fdi>=24&&$fdi<=49){
    $angle = 70;
    }elseif($fdi>=49&&$fdi<=74){
    $angle = 110;
    }elseif($fdi>=74&&$fdi<=99){
    $angle = 140;
    }else{
    $angle = 170;
    } 
}
?>

    <section class="banner-another ">
        <!-- Banner section Start-->
    </section>

    
    <!-- services section Start -->
    <section id="products">
        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate"><?php echo $data->name; ?> Weather</h2>
            <div class="part-1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
               
                <div class="row">
     
      
                     <div class="col-lg-12 col-md-12 col-12">
                            <div class="report-container">

        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
         <!--   <div><?php echo ucwords($data->weather[0]->description); ?></div>  -->
        </div>
        <div class="weather-forecast">
           <br> <?php echo $data->main->temp_max; ?>째C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>째C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
            <div>FDI: <?php echo $fdi; ?></div>
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
              <?php if($angle): ?>
                  <div class="fire-meter-needle" style="transform: rotate(<?php echo $angle;?>deg);"></div>
                  <div class="needle-base"></div>
              <?php endif; ?>

          </div>
          <h2><span class="red">FIRE</span> DANGER RATING</h2>

        </div>
        
    </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- services section Ended -->



