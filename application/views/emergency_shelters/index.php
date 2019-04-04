<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
    <section class="banner-another ">
        <!-- Banner section Start-->
    </section>

   
     <!-- About section start-->
     <section class="about" style="padding-bottom: 0px !important;">
         <!-- container Start-->
         <div class="container">
             <div class="row">
                 <div class="col-md-12 col-12 heading">
                        <a href="<?php echo site_url('Emergency_Shelters'); ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Emergency Shelters</a>
                        <a href="<?php echo site_url('Drinkable_Water'); ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Drinkable Water</a>
                        <a href="<?php echo site_url('Fresh_Food'); ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Fresh Food</a>
                 </div>
             </div>
       
         </div>
         <!-- container Ended-->
     </section>

     <!-- About section Ended-->    
    <!-- services section Start -->
    <section id="products">
        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">Emergency Shelters</h2>
            <div class="part-1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
               
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <figure>
                            <img src="<?php echo base_url("includes/assets/images/Web-Shelter.jpg") ?>" alt="Web Design" width="100%">
                        </figure>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12 col1">
                        <p>Community Fire Refuges (CFRs) are only activated and opened once there is significant fire in the local area. 
Community Fire Refuges offer a last resort shelter option if you cannot leave the area in the event of a fire. 
Most Neighbourhood Safer Places - Places of Last Resort are open-air spaces such as sports ovals, 
whereas Community Fire Refuges are enclosed buildings that are built or modified to withstand bushfire. 
Another last resort shelter option is a Bushfire Place of Last Resort. These do not provide the same level of protection 
as a well-constructed defendable home, private bushfire shelter or a Community Fire Refuge. 
They may be no more than an open space, but have been assessed to provide a level of protection from the effects of radiant heat. 
There are more than 290 Bushfire Places of Last Resort in Victoria</p>
                    </div>
                     <div class="col-lg-12 col-md-12 col-12">
                        <!--The div element for the map -->
                        <div id="map"></div>                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- services section Ended -->


<script>

function initMap() {

var center = {lat: -28.4400743, lng: 132.9820586};
var locations = <?php echo $data['locations']; ?>;
var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 3,
    center: center
  });
var infowindow =  new google.maps.InfoWindow({});
var marker, count;
for (count = 0; count < locations.length; count++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[count][1], locations[count][2]),
      map: map,
      title: locations[count][0]
    });
google.maps.event.addListener(marker, 'click', (function (marker, count) {
      return function () {
        infowindow.setContent(locations[count][0]);
        infowindow.open(map, marker);
      }
    })(marker, count));
  }
}    
</script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAagQEfKTfr-TJTX-adxKcIk3hWZ6jDRy4&callback=initMap">
</script>    