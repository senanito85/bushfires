<script>

$(document).ready(function (){

    if (window.location.href.indexOf('show_result') > 0) {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#form_map").offset().top
        }, 2000);
    }
});

function initMap() {

    var center = { lat:-37.8134712, lng: 144.893017};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: center
    });
    var infowindow =  new google.maps.InfoWindow({});
    var locations = <?php if(!empty($data['locations'])) echo $data['locations']; else echo 'null'; ?>;
    var marker, count;
    for (count = 0; count < locations.length; count++) {
        if(locations[count][3] == 3){
            var icon_color = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
        }
        if(locations[count][3] == 1){
            var icon_color =  "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
        }
        if(locations[count][3] == 2){
            var icon_color = "http://maps.google.com/mapfiles/marker_black.png";
        }
        if(locations[count][3] == 4){
            var icon_color = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
        }
        marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[count][1], locations[count][2]),
        map: map,
        icon: {
        url: icon_color
        },
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
<script type="text/javascript">
    function customCheckbox(checkboxName){
        var checkBox = $('input[name="'+ checkboxName +'"]');
        $(checkBox).each(function(){
            $(this).wrap( "<span class='custom-checkbox'></span>" );
            if($(this).is(':checked')){
                $(this).parent().addClass("selected");
            }
        });
        $(checkBox).click(function(){
            $(this).parent().toggleClass("selected");
        });
    }
</script>