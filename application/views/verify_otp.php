
<!DOCTYPE html>
<html lang="en">
<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html" charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Page Title Here -->
		<title>Home Sample Collection | Blood Test at Home | Detect Diagnostics Advanced Pathology & Microbiology Lab</title>
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-5WWTQFF');</script>
		<!-- End Google Tag Manager -->
		
		<script>
(function(i,s,o,g,r,a,m){
  i['GoogleAnalyticsObject']=r;
  i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},
  i[r].l=1*new Date();
  a=s.createElement(o),m=s.getElementsByTagName(o)[0];
  a.async=1;
  a.src=g;
  m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-132556366-1', 'auto');
ga('send', 'pageview');
</script>
		
		<!-- Meta -->
		<!-- Page Description Here -->
		<meta name="description" content="Detect Diagnostics offers sample collection at your doorstep. Detect Diagnostics Home Sample Collection, Now Book Online! Our expert phlebotomists will collect the sample from your home.">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
		
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#ff6600">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#ff6600">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#ff6600">
  
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>public/web/img/icon.png" />
		<link rel="canonical" href="http://www.detectathome.com">
		
		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700,900%7COpen+Sans:300,400,600,700,800%7CPermanent+Marker" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/vendor/font-awesome/css/fontawesome-all.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/vendor/linear-icons/css/linear-icons.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		 <link rel="stylesheet" href="<?php echo base_url();?>public/web/css/theme.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/css/theme-elements.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/vendor/rs-plugin/css/navigation.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/css/skins/default.css">	
		
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/web/css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url();?>public/web/vendor/modernizr/modernizr.min.js"></script>

</head>
	<body>
	<?php foreach ($result as $wrow) {?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5WWTQFF"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
		<div class="body">

			<?php   $this->load->view('header')?>

			<div role="main" class="main">
				 	<section class="section">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 mb-5 mb-lg-0"></div>
							<div class="col-lg-6 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
								<div class="border rounded h-100 p-5">
									
									<h2 class="font-weight-bold text-4 mb-0"> <?php 
								  
									//echo $this->session->userdata('support_otp'); 
									//echo $this->session->userdata('verify_otp');?><br>Validate OTP (One Time Passcode)</h2>
									<span class="top-sub-title text-color-primary"> A OTP (One Time Passcode) has been sent to your mobile number.</span>

									 <?php  echo form_open_multipart('Verify/validate_otp' ,'class="contact-form" data-toggle="validator" role="form"'); ?>
	 									<div class="form-row">
											<div class="form-group col mb-3 mt-3">
												<label for="frmRegisterEmail">Enter OTP</label>
											
												<input type="text" class="form-control bg-light-5 rounded border-0 text-1" name="verify_otp" onkeyup="this.value=this.value.replace(/[^\d]/,'')" minlength="6"  maxlength="6" required>
											</div>
										</div>
										<div class="row align-items-center">
											<div class="col text-left">
												<button type="submit" class="btn btn-primary btn-rounded btn-v-3 btn-h-3 font-weight-bold">Verify</button>
											</div>
										</div>
									   <?php   echo form_close();?>
								</div>
							</div>
							<div class="col-lg-3 mb-5 mb-lg-0"></div>
						</div>
					</div>
		</section>
		
		
			</div>
 <!-- 	footer  -->
			<?php   $this->load->view('footer')?>
		</div>
	
		<!-- Vendor -->
		<script src="<?php echo base_url();?>public/web/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/jquery-cookie/jquery-cookie.min.js"></script>

		<script src="<?php echo base_url();?>public/web/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/common/common.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/jquery.validation/jquery.validation.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/vide/vide.min.js"></script>
		<script src="<?php echo base_url();?>public/web/vendor/vivus/vivus.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url();?>public/web/js/theme.js"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="<?php echo base_url();?>public/web/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	   <script src="<?php echo base_url();?>public/web/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url();?>public/web/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url();?>public/web/js/theme.init.js"></script>
		
		<!-- Examples -->
		<script src="<?php echo base_url();?>public/web/js/examples/examples.lightboxes.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
        </script>
        
    	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>    
        
         <script type="text/javascript">
         
		<?php
		// $this->session->set_flashdata('successhome','Your Home Visit is Booked Succesfully,\nWe will connect with you shortly');
		
$msg= $this->session->flashdata('success');
if ( $msg != "" )
{
		    echo "Swal.fire('Thank you!','$msg','success')";
} 
$msg2= $this->session->flashdata('error');
if ( $msg2 != "" )
{
    echo "Swal.fire('Oops...','$msg2','error')";
} 
$msg3= $this->session->flashdata('successhome');
if ( $msg3 != "" )
{
    $url=   base_url();
    echo "Swal.fire( 'Thank You','$msg3','success').then(function(){  window.location.href = '$url'; });";
    
}
?>
		 </script>
        
        
	<?php }?>
	</body>
</html>
