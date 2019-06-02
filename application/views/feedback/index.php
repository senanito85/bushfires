<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->
<section class="banner-another ">
        <!-- Banner section Start-->
    </section>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">
                    <?php
                    // if(isset($this->session->flashdata('item') ) ) {
                    if($this->session->userdata('message')){
                    
                    ?>
                    <div id="mess" class="<?php echo $this->session->userdata('class'); ?>">
                       <?php echo $this->session->userdata('message'); ?>
                    </div>
                    <?php 
                    }
                    ?>
                    <!-- Form with header -->
                    <form action="<?php echo base_url('Feedback/send_feedback'); ?>" method="POST">
                        <div class="card border-primary rounded-2">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Feedback</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->session->userdata('name');?>" placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $this->session->userdata('email');?>" placeholder="Enter Your Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comments-o text-info"></i></div>
                                        </div>
                                        <textarea id="txt" class="form-control" maxlength="300" name="message" placeholder="Text Feedback" required><?php echo $this->session->userdata('txt');?></textarea>
                                    </div>
                                   <div id="limit" style="display:none"><span><small><p style="color:red;">Only 300 characters are allowed.</p></small></span></div>
                                </div>

                                <div class="text-center">
                                    <input id="sendbtns" type="submit" value="Send" class="btn btn-info btn-block rounded-2 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->
                </div>
	</div>
    <hr>
    <?php
        
        unset(
            $_SESSION['name'],
            $_SESSION['email'],
            $_SESSION['message'],
            $_SESSION['class'],
            $_SESSION['txt']
    );    
    foreach($data as $res){?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-primary mb-4">
                    <div class="card-body text-primary">
                        <h5 class="card-title"><?php echo $res->name; ?> <small><i><?php echo "Posted on ".$res->date; ?></i></small></h5>
                        <p class="card-text"><?php echo $res->message; ?>.</p>
                    </div>
                </div>
            </div>
        <!-- <img src="images/avatar.svg" class="ml-3" alt="Sample Image"> -->
        </div>
        <?php } ?>
</div>
<script>
$(function() {
    setTimeout(function() { $("#mess").hide(); }, 5000);
    $("#txt").on('input', function() {
    if($(this).val().length >299) {
        document.getElementById("limit").style.display = "block";
    }
    else{
        document.getElementById("limit").style.display = "none";
    }
});

});
</script>