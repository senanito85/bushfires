<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       } 
       a.btn.btn-success.cm {
            background: #90EE90 !important;
        }
    </style> 
    <style type="text/css">
    .custom-checkbox{
        width: 16px;
        height: 16px;
        display: inline-block;
        position: relative;
        z-index: 1;
        top: 3px;
        background: url(<?php echo site_url('includes/assets/images/checkbox-sprite.png'); ?>) no-repeat 0 0 transparent;
    }
    .custom-checkbox:hover{
        background-position: 0 -16px;
    }
    .custom-checkbox.selected{
        background-position: 0 -32px;
    }
    .custom-checkbox input[type="checkbox"]{
        margin: 0;
        position: absolute;
        z-index: 2;            
        cursor: pointer;
        outline: none;
        opacity: 0;
        /* CSS hacks for older browsers */
        _noFocusLine: expression(this.hideFocus=true); 
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
        -khtml-opacity: 0;
        -moz-opacity: 0;
    }
    /* Let's Beautify Our Form */
    form{
        margin: 20px;
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
                        <a href="<?php echo site_url('Combined_Map'); ?>" class="btn btn-success btn-lg active cm" role="button" aria-pressed="true">Combined Map</a>
                        <a href="<?php echo site_url('Emergency_Shelters'); ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Emergency Shelters</a>
                        <a href="<?php echo site_url('Drinkable_Water'); ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Drinkable Water</a>
                        <a href="<?php echo site_url('Fresh_Food'); ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Fresh Food</a>
                        <a href="<?php echo site_url('Hospitals'); ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Hospitals</a>
                        
                 </div>
             </div>
       
         </div>
         <!-- container Ended-->
     </section>
     <!-- About section Ended-->        
    <!-- services section Start -->
    <section id="products">
        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">Combined Map</h2>
            <div class="part-1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
               
                <div class="row">
                    <div class="col-lg-9 col-md-4 col-12">
                        <figure>
			    <!--  <img src="<?php echo base_url("includes/assets/images/Web-Food.jpg") ?>" alt="Web Design" width="100%"> -->
  				<p>The Combined Map provides vision for all available datasets in one place and additionally offers search function </p>
                        </figure>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12 col1">
                     <!--   <p>The Combined Map provides vision for all available datasets in one place and additionally offers search function </p> -->
                    </div>
                    <form id="form_map" method="post" action="<?php echo base_url('Combined_Map/show_result'); ?>">
                       <label>Search : </label> <input class="form-control" type="text" name="search" id="search" placeholder="Enter for Search" value="<?php if(!empty($this->session->search)) echo $this->session->search; ?>"><br>
                       <label class="custom-control overflow-checkbox black">
                            <input type="checkbox" class="overflow-control-input" name="e_shelter" value="emergency_shelters" <?php if(!empty($this->session->userdata('e_shelter'))) echo 'checked'; ?>>
                            <span class="overflow-control-indicator"></span>
                            <span class="overflow-control-description">Emergency Shelter</span>
                        </label>
                        <label class="custom-control overflow-checkbox blue">
                            <input type="checkbox" class="overflow-control-input" name="d_water" value="drinkable_water" <?php if(!empty($this->session->d_water)) echo 'checked'; ?>>
                            <span class="overflow-control-indicator"></span>
                            <span class="overflow-control-description">Drinkable Water</span>
                        </label>
                        <label class="custom-control overflow-checkbox green">
                            <input type="checkbox" class="overflow-control-input" name="f_food" value="fresh_food" <?php if(!empty($this->session->f_food)) echo 'checked'; ?>>
                            <span class="overflow-control-indicator"></span>
                            <span class="overflow-control-description">Fresh Food</span>
                        </label>
                        <label class="custom-control overflow-checkbox red">
                            <input type="checkbox" class="overflow-control-input" name="hospital" value="hospital" <?php if(!empty($this->session->hospital)) echo 'checked'; ?>>
                            <span class="overflow-control-indicator"></span>
                            <span class="overflow-control-description">Hospitals</span>
                        </label>
                        <style>

                        .custom-controls-stacked .custom-control+.custom-control {
                        margin-left: 0;
                        }

                        .custom-controls-stacked .custom-control {
                        margin-bottom: .25rem;
                        }
                        .custom-control {
                        position: relative;
                        display: -ms-inline-flexbox;
                        display: inline-flex;
                        min-height: 1.5rem;
                        padding-left: 1.5rem;
                        margin-right: 1rem;
                        }
                        .custom-control.overflow-checkbox .overflow-control-input {
                        display: none;
                        }
                        .custom-control.overflow-checkbox .overflow-control-indicator {
                        border-radius: 3px;
                        display: inline-block;
                        position: absolute;
                        top: 4px;
                        left: 0;
                        width: 16px;
                        height: 16px;
                        border: 2px solid #aaa;
                        }
                        .custom-control.overflow-checkbox .overflow-control-indicator::before {
                        content: '';
                        display: block;
                        position: absolute;
                        width: 16px;
                        height: 16px;
                        transition: .3s;
                        width: 10px;
                        border-right: 7px solid #fff;
                        border-radius: 3px;
                        -webkit-transform: rotateZ(45deg) scale(1);
                        transform: rotateZ(45deg) scale(1);
                        top: -4px;
                        left: 5px;
                        opacity: 0;
                        }
                        .custom-control.overflow-checkbox.black .overflow-control-indicator::after{
                        border-bottom: 4px solid #000;
                        border-right: 4px solid #000;
                        }
                        .custom-control.overflow-checkbox.blue .overflow-control-indicator::after{
                        border-bottom: 4px solid blue;
                        border-right: 4px solid blue;
                        }
                        .custom-control.overflow-checkbox.green .overflow-control-indicator::after{
                        border-bottom: 4px solid green;
                        border-right: 4px solid green;
                        }
                        .custom-control.overflow-checkbox.red .overflow-control-indicator::after{
                        border-bottom: 4px solid red;
                        border-right: 4px solid red;
                        }
                        .custom-control.overflow-checkbox .overflow-control-indicator::after {
                        content: '';
                        display: block;
                        position: absolute;
                        width: 16px;
                        height: 16px;
                        transition: .3s;
                        -webkit-transform: rotateZ(90deg) scale(0);
                        transform: rotateZ(90deg) scale(0);
                        width: 10px;
                        border-radius: 3px;
                        top: -2px;
                        left: 2px;
                        }
                        .custom-control.overflow-checkbox .overflow-control-input:checked ~ .overflow-control-indicator::after {
                        -webkit-transform: rotateZ(45deg) scale(1);
                        transform: rotateZ(45deg) scale(1);
                        top: -6px;
                        left: 5px;
                        }
                        .custom-control.overflow-checkbox .overflow-control-input:checked ~ .overflow-control-indicator::before {
                        opacity: 1;
                        }
                        </style>
                        <input type="submit" class="btn btn-success active ml-5" name="allmap_btn" value="Filter">
                    </form>
                     <div class="col-lg-12 col-md-12 col-12">
                        <!--The div element for the map -->
                        <div id="map"></div>                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- services section Ended -->

<?
?> 
