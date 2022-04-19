<!doctype html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>public/assets/media/image/favicon.png"/>

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/bundle.css" type="text/css">

    <!-- Google font -->
    <link href="<?php echo base_url();?>public/assets/css/css2.css" rel="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/datepicker/daterangepicker.css" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/dataTable/datatables.min.css" type="text/css">

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
            <div class="content ">
                    <div class="page-header d-md-flex justify-content-between">
        <div>
            <h3>Welcome back,
            
            
              <?php  echo $this->session->userdata('ci_name');?></h3>
            <p class="text-muted">This page shows an overview for your account summary.</p>
      
      <?php
      $lastyear="";
      $count_inq2 = $this->db->query("SELECT * FROM `inquiry` ORDER BY `inquiry`.`c_id` DESC LIMIT 0,1");
        foreach ($count_inq2->result() as $crow) 
      {
            $lastyear = date("Y", strtotime($crow->date));
      }
      $counti=$month_data="";
      for ($i=1;$i <=12;$i++)
      {
         // echo $i;echo "<br>";
        $date1 = date("$lastyear-$i-01");
      // echo "<br>";
          $date2 = date("$lastyear-$i-31");
       //echo "<br>";echo "<br>";
       
          $count_inq3 = $this->db->query("SELECT * FROM `inquiry`  WHERE date
                BETWEEN '$date1' AND '$date2' ");
          $counti =count($count_inq3->result());
       
          $month_data.=$counti.", ";
       }
      
      
      
            ?>
      
      
      
        </div>
         
    </div>

    <div class="row">
       
         <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title mb-2"><?php echo  $lastyear;?>  Inquiry Report Month wise</h6>
                        <div class="d-flex justify-content-between">
                            <a href="<?php echo base_url()."Admin"?>" class="btn btn-floating">
                                <i class="ti-reload"></i>
                            </a>
                             
                        </div>
                    </div>
                    <p class="text-muted mb-4">Check how you're doing Swasthyam Wellness Packages
                     inquiry for current month</p>
                    <div id="sales"></div>
                     
                     
                     <br> <br>
                </div>
            </div>
        </div>
       
       
        <div class="col-lg-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Packages  Inquiry </h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                            <i data-feather="gift"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">
                                <?php $count_inq21 = $this->db->query("SELECT * FROM inquiry WHERE DATE(date) = DATE(NOW()) ");
                                echo     $count21=count($count_inq21->result());
                                 ?></div>
                            </div>
                            <p class="mb-0"><a href="<?php echo base_url();?>Inquiry/view_inquiry" class="link-1">See More Swasthyam Wellness Packages
                             inquiry</a> Today's number of
                             inquiry ..</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Contact us</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-info-bright text-info rounded-pill">
                                            <i class="ti-back-right"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3"> 
                                 <?php $count_inq22 = $this->db->query("SELECT * FROM contact WHERE DATE(date) = DATE(NOW())");
                                 echo     $count112=count($count_inq22->result());
                                 ?></div>
                            </div>
                            <p class="mb-0"><a class="link-1" href="<?php echo base_url();?>Contact/view_contact">See more</a> ,Today's number of peple connect with us.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Get Support</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-secondary-bright text-secondary rounded-pill">
                                            <i class="ti-support"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">
                                 <?php $count_inq23 = $this->db->query("SELECT * FROM get_support WHERE DATE(g_date) = DATE(NOW())");
                                 echo     $count23=count($count_inq23->result());
                                 ?></div>
                            </div>
                            <p class="mb-0"><a class="link-1" href="<?php echo base_url();?>Inquiry/view_get_support">See More</a> 
                              Today's  number of Want Support.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"> Home Sample Collection </h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                            <i class="ti-home"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">
                                <?php 
                                
                            $count_inq24 = $this->db->query("SELECT * FROM home_collection WHERE DATE(h_date) = DATE(NOW())");
                            echo     $count24=count($count_inq24->result());
                            ?>
                            
                          
                                
                                </div>
                            </div>
                            <p class="mb-0"><a class="link-1" href="<?php echo base_url();?>Inquiry/view_home_sample_collection">See Today Home Sample Collection </a> List of Our Website.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        </div>
            <div class="row">
        <div class="col-md-6">
           
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title mb-2">Monthly Statistics</h6>
                        
                    </div>
                    <div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5> Packages Inquiry</h5>
                                    <div>Monthly Swasthyam Wellness Packages Inquiry </div>
                                </div>
                                <h3 class="text-primary mb-0">
                                <?php $count_inq25 = $this->db->query("SELECT * FROM inquiry WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                                echo     $count25=count($count_inq25->result());
                                 ?></h3>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Contact </h5>
                                    <div>Monthly Visitors Contact us</div>
                                </div>
                                <div>
                                    <h3 class="text-success mb-0">
                                     <?php $count_inq26 = $this->db->query("SELECT * FROM contact WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                                 echo     $count26=count($count_inq26->result());
                                 ?></h3>
                                </div>
                            </div>
                             <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Home Sample Collection </h5>
                                    <div>Monthly Inquiry Home Sample Collection</div>
                                </div>
                                <div>
                                    <h3 class="text-warning mb-0">
                                     <?php $count_inq30 = $this->db->query("SELECT * FROM home_collection WHERE MONTH(h_date) = MONTH(CURRENT_DATE()) AND YEAR(h_date) = YEAR(CURRENT_DATE())");
                                 echo     $count30=count($count_inq26->result());
                                 ?></h3>
                                </div>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5> Get Support</h5>
                                    <div>Monthly Get Support  Inquiry </div>
                                </div>
                                <h3 class="text-primary mb-0">
                                <?php $count_inq31 = $this->db->query("SELECT * FROM get_support WHERE MONTH(g_date) = MONTH(CURRENT_DATE()) AND YEAR(g_date) = YEAR(CURRENT_DATE())");
                                echo     $count31=count($count_inq31->result());
                                 ?></h3>
                            </div>
                           
                        </div>
                    </div>
                    
                </div>
            </div>
            
            
             <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title mb-2">Statistics Over All</h6>
                        
                    </div>
                    <div>
                        <div class="list-group list-group-flush">
                            <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Total Packages Inquiry </h5>
                                    <div>Total Inquiry for Swasthyam Wellness Packages </div>
                                </div>
                                <h3 class="text-primary mb-0">
                                <?php $count_inq27 = $this->db->query("SELECT * FROM inquiry ");
                                 echo     $count27=count($count_inq27->result());
                                 ?></h3>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Contact </h5>
                                    <div>Total Visitors Contact us</div>
                                </div>
                                <div>
                                    <h3 class="text-success mb-0">
                                     <?php $count_inq28 = $this->db->query("SELECT * FROM contact");
                                 echo     $count28=count($count_inq28->result());
                                 ?></h3>
                                </div>
                            </div>
                           
                        </div>
                            
                           <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Home Sample Collection</h5>
                                    <div>Total Home Sample Collection </div>
                                </div>
                                <div>
                                    <h3 class="text-primary mb-0">
                                      <?php $count_inq28 = $this->db->query("SELECT * FROM home_collection");
                                 echo     $count28=count($count_inq28->result());
                                 ?></h3>
                                </div>
                            </div>
                              <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Newsletter Subscribers</h5>
                                    <div>Total Newsletter Subscribers </div>
                                </div>
                                <div>
                                    <h3 class="text-primary mb-0">
                                      <?php $count_inq28 = $this->db->query("SELECT * FROM subcribeus");
                                 echo     $count28=count($count_inq28->result());
                                 ?></h3>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="col-md-6">
             <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <h6 class="card-title mb-1">Monthly Inquiry</h6>
                             
                        </div>
                        <div>
                            <a href="#" class="btn btn-floating">
                                <i class="fa fa-refresh"></i>
                            </a>
                            
                        </div>
                    </div>
                    <div id="monthly-sales"></div>
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <i class="fa fa-circle mr-1 text-primary "></i>Packages Inquiry <br>
                            <small class="text-muted"> <?php echo $count25;?></small>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-circle mr-1 text-success"></i> Contact us Inquiry <br>
                            <small class="text-muted"> <?php echo $count26;?></small>
                        </li>
                          <li class="list-inline-item">
                            <i class="fa fa-circle mr-1 text-warning"></i>  Home Sample Collection <br>
                            <small class="text-muted"> <?php echo $count30;?></small>
                        </li>
                        
                       
                    </ul>
                </div>
            </div>
      
        </div>
    </div>
    
    <div class="row">
     
      	<div class="col-md-12"> 
    	  <div class="card">
        <div class="card-body">
            <h6 class="card-title">Recent Swasthyam Wellness Packages Inquiry</h6>
            <div class="table-responsive">
                <table id="recent-orders" class="table">
                    <thead>
                    <tr>
                            <th>#id</th>
                         <th> Name </th>
                                        <th> Email</th>
                                        <th> Mobile </th>
                                        <th>Subject </th>
                   
                        <th class="text-right">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                       <?php 
                       $count_inq3 = $this->db->query("SELECT * FROM `inquiry` ORDER BY `inquiry`.`c_id` DESC LIMIT 0,10");
                       foreach ($count_inq3->result() as $irow)
                           
                                    	
                           {  
                               $t_id = $irow->c_id;   
                               $status = $irow->status;?>
				 			   		 <tr>  
				 			   		  
				 			   		   <td> <?php echo $irow->c_id; ?></td>       
                                        <td> <?php echo substr($irow->name,0,10); ?></td>
                                        <td> <?php echo substr($irow->email,0,30); ?>  </td>
                                        <td> <?php echo substr($irow->mobile,0,10); ?></td>
                                        <td> <?php echo substr( $irow->subject,0,30); ?></td>
                                         <td> <?php 
                                         echo date("d-M-Y",strtotime($irow->date)).' at '.date("h:i: A",strtotime($irow->time));
                                        ?></td>
                              </tr>
                             <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
    	</div>
    	
  <div class="col-md-12"> 
    	  <div class="card">
        <div class="card-body">
            <h6 class="card-title">Recent Contact us  Inquiry</h6>
            <div class="table-responsive">
                <table id="recent-orders2" class="table">
                    <thead>
                    <tr>
                                            <th>#id</th>
                                         <th> Name </th>
                                        <th> Email</th>
                                        
                                        <th> Mobile </th>
                                        <th> Message</th>
                   
                        <th class="text-right">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                       <?php 
                       $count_inq3 = $this->db->query("SELECT * FROM `contact` ORDER BY `contact`.`c_id` DESC LIMIT 0,10");
                       foreach ($count_inq3->result() as $irow)
                           
                                    	
                           {  
                               $t_id = $irow->c_id;   
                               $status = $irow->status;?>
				 			   		 <tr>  
				 			   		  
				 			   		   <td> <?php echo $irow->c_id; ?></td>       
                                        <td> <?php echo substr($irow->name,0,10); ?></td>
                                        <td> <?php echo substr($irow->mobile,0,30); ?>  </td>
                                        <td> <?php echo substr($irow->email,0,10); ?></td>
                                          <td> <?php echo substr($irow->subject,0,30); ?></td>
                                       
                                          <td> <?php 
                                          echo date("d-M-Y",strtotime($irow->date));
                                        ?></td>
                              </tr>
                             <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
    	
    	
    	
    	</div>
    
  
  
  <div class="col-md-12"> 
    	  <div class="card">
        <div class="card-body">
            <h6 class="card-title">Recent Home Sample Collection Inquiry</h6>
            <div class="table-responsive">
                <table id="orders3" class="table">
                    <thead>
                    <tr>
                            <th>#id</th>
                         <th> Name </th>
                                        <th> Email</th>
                                        <th> Mobile </th>
                                        
                   
                        <th class="text-right">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                       <?php 
                       $count_inq3 = $this->db->query("SELECT * FROM `home_collection` ORDER BY `home_collection`.`h_id` DESC LIMIT 0,10");
                       foreach ($count_inq3->result() as $irow)
                           
                                    	
                           {  
                               $t_id = $irow->h_id;   
                               $status = $irow->h_status;?>
				 			   		 <tr>  
				 			   		  
				 			   		   <td> <?php echo $irow->h_id; ?></td>       
                                        <td> <?php echo substr($irow->h_name,0,10); ?></td>
                                        <td> <?php echo substr($irow->h_email,0,30); ?>  </td>
                                        <td> <?php echo substr($irow->h_mobno,0,10); ?></td>
                                          <td> <?php 
                                          echo date("d-M-Y",strtotime($irow->h_date));
                                        ?></td>
                              </tr>
                             <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
    	</div>
    	
  
  
    
  <div class="col-md-12"> 
    	  <div class="card">
        <div class="card-body">
            <h6 class="card-title">Recent Get Support Inquiry</h6>
            <div class="table-responsive">
                <table id="recent-orders4" class="table">
                    <thead>
                    <tr>
                                            <th>#id</th>
                                         <th> Name </th>
                                        <th> Email</th>
                                        
                                        <th> Mobile </th>
                                        <th> Message</th>
                   
                        <th class="text-right">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                       <?php 
                       $count_inq3 = $this->db->query("SELECT * FROM `get_support` ORDER BY `get_support`.`g_id` DESC LIMIT 0,10");
                       foreach ($count_inq3->result() as $irow)
                           
                                    	
                           {  
                               $t_id = $irow->g_id;   
                               $status = $irow->g_status;?>
				 			   		 <tr>  
				 			   		  
				 			   		   <td> <?php echo $irow->g_id; ?></td>       
                                        <td> <?php echo substr($irow->g_name,0,10); ?></td>
                                        <td> <?php echo substr($irow->g_mobno,0,30); ?>  </td>
                                        <td> <?php echo substr($irow->g_email,0,10); ?></td>
                                          <td> <?php echo substr($irow->g_message,0,10); ?></td>
                                       
                                          <td> <?php 
                                          echo date("d-M-Y",strtotime($irow->g_date));
                                        ?></td>
                              </tr>
                             <?php  } ?>
                    </tbody>
                </table>
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

    <!-- Apex chart -->
    <script src="<?php echo base_url();?>public/vendors/charts/apex/apexcharts.min.js"></script>

    <!-- Daterangepicker -->
    <script src="<?php echo base_url();?>public/vendors/datepicker/daterangepicker.js"></script>

    <!-- DataTable -->
    <script src="<?php echo base_url();?>public/vendors/dataTable/datatables.min.js"></script>

    <!-- Dashboard scripts -->
    <script src="<?php echo base_url();?>public/assets/js/examples/pages/dashboard.js"></script>
	 
   <!-- App scripts -->
   <script src="<?php echo base_url();?>public/assets/js/app.min.js"></script>

<script type="text/javascript">
$(function () {
 
		


	
	   var colors = {
		        primary: $('.colors .bg-primary').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
		        secondary: $('.colors .bg-secondary').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
		        info: $('.colors .bg-info').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
		        success: $('.colors .bg-success').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
		        danger: $('.colors .bg-danger').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
		        warning: $('.colors .bg-warning').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
		    };

		    var rgbToHex = function (rgb) {
		        var hex = Number(rgb).toString(16);
		        if (hex.length < 2) {
		            hex = "0" + hex;
		        }
		        return hex;
		    };

		    var fullColorHex = function (r, g, b) {
		        var red = rgbToHex(r);
		        var green = rgbToHex(g);
		        var blue = rgbToHex(b);
		        return red + green + blue;
		    };

		    colors.primary = '#' + fullColorHex(colors.primary[0], colors.primary[1], colors.primary[2]);
		    colors.secondary = '#' + fullColorHex(colors.secondary[0], colors.secondary[1], colors.secondary[2]);
		    colors.info = '#' + fullColorHex(colors.info[0], colors.info[1], colors.info[2]);
		    colors.success = '#' + fullColorHex(colors.success[0], colors.success[1], colors.success[2]);
		    colors.danger = '#' + fullColorHex(colors.danger[0], colors.danger[1], colors.danger[2]);
		    colors.warning = '#' + fullColorHex(colors.warning[0], colors.warning[1], colors.warning[2]);



		    function monthlySales() {
		        var options = {
		            series: [<?php echo $count25." , ".$count26." , ".$count30?>],
		            chart: {
		                type: 'donut',
		                // fontFamily: chartFontStyle,
		            },
		            labels: ['Swasthyam Wellness Packages Inquiry', 'Contact us Inquiry', 'Home Sample Collection '],
		            colors: [colors.primary, colors.success, colors.warning],
		            track: {
		                background: "#cccccc"
		            },
		            dataLabels: {
		                enabled: false
		            },
		            stroke: {
		                colors: [colors.primary, colors.success, colors.warning],
		            },
		            plotOptions: {
		                pie: {
		                    expandOnClick: true,
		                    donut: {
		                        labels: {
		                            show: true,
		                            value: {
		                                formatter: function (val) {
		                                    return '' + val;
		                                }
		                            }
		                        }
		                    }
		                }
		            },
		            tooltip: {
		                shared: false,
		                y: {
		                    formatter: function (val) {
		                        return '' + val;
		                    }
		                }
		            },
		            legend: {
		                show: false
		            }
		        };

		        var chart = new ApexCharts(document.querySelector("#monthly-sales"), options);

		        chart.render();
		    }

		    monthlySales();

				
function sales() {
    if ($('#sales').length) {
        var options = {
            chart: {
                type: 'bar',
                fontFamily: "Inter",
                offsetX: -26,
                stacked: false,
                height: 265,
                width: '102%',
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Swasthyam Wellness Packages Inquiry',
                data: [<?php echo ($month_data);?>]
            }],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '20%',
                    endingShape: 'rounded'
                },
            },
            colors: [colors.primary],
            xaxis: {
                categories:  ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "" + val + ""
                    }
                }
            }
        };

        var chart = new ApexCharts(
            document.querySelector("#sales"),
            options
        );

        chart.render();
    }
}

sales();










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
}  $msg3= $this->session->flashdata('fileerror');
if ( $msg3 != "" )
{
    echo "toastr.error('$msg3');";
}


?>



$('#recent-orders2').DataTable({
    lengthMenu: [5, 10],
    "columnDefs": [{
        "targets": 5,
        "orderable": false
    }]
});

 $(document).ready(function (){
	    $('#orders3').DataTable({
	        "scroll": "400px",
	        "scrollCollapse": true
	    });
	});
$(document).ready(function (){
    $('#recent-orders4').DataTable({
        "scroll": "400px",
        "scrollCollapse": true
    });
});

</script>

</body>
</html>
