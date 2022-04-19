<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Reset password </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>public/assets/media/image/favicon.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/app.min.css" type="text/css">
</head>
<body class="form-membership">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img width="50%" src="<?php echo base_url()."public/img/".$this->session->userdata('website_logo');?>" alt="image">
     </div>
    <!-- ./ logo -->

    
    <h5> Reset password</h5>

    <!-- form -->
    <?php echo form_open('admin/check_reset_psw'); ?>
            <input type="hidden"   name="url" value="<?php echo base_url().$this->uri->uri_string();?>">
	
    
        <div class="form-group">
          <label> Password</label>
            <input name="password" type="password" class="form-control" placeholder="password" required autofocus>
        </div>
        
          <div class="form-group">
          <label>Confirm Password</label>
            <input name="password2" type="password" class="form-control" placeholder="confirm password" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
        <hr>
  		 <a href="<?php echo base_url();?>admin/" class="btn btn-sm btn-outline-light ml-1">Login!</a>
           
   <?php   echo form_close();?>

</div>

<!-- Plugin scripts -->
<script src="<?php echo base_url();?>public/vendors/bundle.js"></script>

<!-- App scripts -->
<script src="<?php echo base_url();?>public/assets/js/app.min.js"></script>


<script type="text/javascript">


toastr.options = {
       timeOut: 10000,
       progressBar: true,
       showMethod: "slideDown",
       hideMethod: "slideUp",
       showDuration: 200,
       hideDuration: 200
   };

<?php

$msg= $this->session->flashdata('success');
if ( $msg != "" )
{ 
echo "toastr.success('$msg');";
} 
$msg2= $this->session->flashdata('error');
if ( $msg2 != "" )
{
    echo "toastr.error('$msg2');";
} ?>


</script>


</body>
</html>
