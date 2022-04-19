<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Get Support Inquiry details</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>public/assets/media/image/favicon.png"/>

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/bundle.css" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
 
	 <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/datatables/media/css/dataTables.bootstrap4.css" />
    <!-- Prism -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/prism/prism.css" type="text/css">

<!-- App css -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/app.min.css" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="preloader-icon"></div>
    <span>Loading...</span>
</div>
<!-- ./ Preloader -->


<!-- Layout wrapper -->
<div class="layout-wrapper">

  
    <!-- ./ Header -->
<?php   $this->load->view('admin/file/header')?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- begin::navigation -->
     

		<?php   $this->load->view('admin/file/navbar')?>
        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content">
                
    <div class="page-header">
        <div>
            <h3>Get Support Inquiry  details</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url();?>Admin">Home</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="<?php echo base_url();?>Inquiry/view_get_support"> 
                    Get Support Inquiry  List </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#"> 
 					Get Support Inquiry  Full Details </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-12">
  			  <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title mb-2"> Get Support Inquiry  Details</h6>
                         
                    </div>
                    <div>
                      <?php 
                          foreach ($result as $row) {  
                                    	    $t_id = $row->g_id;  $status = $row->g_status; ?>
                    
                             <div class="list-group list-group-flush">
                            <div class="row list-group-item d-flex justify-content-between align-items-center px-0">
                                <div class="col-md-2 col-12">
                                    <h5>Full Name  <?php
                   							   $verify = $row->verify;
                   							   if ($verify=="1") { ?>
                   							    <span title="Mobile number is Verified" class="badge btn-primary"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  </span>
                   							   <?php }?> </h5>
                                   
                                </div>
                                <div class="col-md-10 col-12">
                                <h3 class="text-success mb-0 float-right"> <?php echo $row->g_name; ?></h3>
                            	</div>
                            </div>
                            <div class="row list-group-item d-flex justify-content-between align-items-center px-0">
                                <div class="col-md-2 col-12">
                                    <h5>Email</h5>
                                    
                                </div>
                                <div class="col-md-10 col-12">
                                    <h3 class="text-danger mb-0 float-right"><?php echo $row->g_email; ?> </h3>
                                </div>
                            </div>
                            <div class="row list-group-item d-flex justify-content-between align-items-center px-0">
                                <div class="col-md-2 col-12">
                                    <h5>Mobile Number</h5>
                                     
                                </div>
                                <div class="col-md-10 col-12">
                                    <h3 class="text-info mb-0 float-right"><?php echo $row->g_mobno; ?></h3>
                                </div>
                            </div>
                             <div class="row list-group-item d-flex justify-content-between align-items-center px-0">
                                <div class="col-md-2 col-12">
                                    <h5> Message </h5>
                                     
                                </div>
                                <div class="col-md-10 col-12">
                                    <h3 class="text-info mb-0 float-right"><?php echo $row->g_message; ?></h3>
                                </div>
                            </div>
                              
                             <div class="row list-group-item d-flex justify-content-between align-items-center px-0">
                                <div class="col-md-2 col-12">
                                    <h5>Date </h5>
                                     
                                </div>
                                <div class="col-md-10 col-12">
                                    <h3 class="text-primary mb-0 float-right"><?php 
                                   
                                    echo date("d-M-Y",strtotime($row->g_date)) ;
                                      
                                      ?></h3>
                                </div>
                            </div>
                            
                        </div>
                        
                        <?php  } ?>
                        
                    </div>
                    
                </div>
            </div>

                 

                    

                </div>
            </div>

        </div>
    </div>

            </div>
            <!-- ./ Content -->

            <!-- Footer -->
            <?php  $this->load->view('admin/file/footer')?>
            <!-- ./ Footer -->
        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->

<!-- Main scripts -->
<script src="<?php echo base_url();?>public/vendors/bundle.js"></script>
  <!-- Prism -->
  
  <script src="<?php echo base_url();?>public/vendors/prism/prism.js"></script>

		<script src="<?php echo base_url();?>public/vendors/datatables/media/js/jquery.dataTables.min.js"></script>	
		<script src="<?php echo base_url();?>public/vendors/datatables/media/js/dataTables.bootstrap4.min.js"></script>		
		<script src="<?php echo base_url();?>public/vendors/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>	
		<script src="<?php echo base_url();?>public/vendors/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>	
		<script src="<?php echo base_url();?>public/vendors/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>		
		<script src="<?php echo base_url();?>public/vendors/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>	
		<script src="<?php echo base_url();?>public/vendors/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
		<script src="<?php echo base_url();?>public/vendors/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>	
		<script src="<?php echo base_url();?>public/vendors/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>



<!-- App scripts -->
<script src="<?php echo base_url();?>public/assets/js/app.min.js"></script>

<script src="<?php echo base_url();?>public/assets/js/examples.datatables.default.js"></script>
<script src="<?php echo base_url();?>public/assets/js/examples.datatables.row.with.details.js"></script>
<script src="<?php echo base_url();?>public/assets/js/examples.datatables.tabletools.js"></script>



<script type="text/javascript">
$(document).ready(function (){
    $('#example2').DataTable();
});

 
 toastr.options = {
        timeOut: 6000,
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
