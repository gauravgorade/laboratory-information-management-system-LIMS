<!doctype html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Services</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>public/assets/media/image/favicon.png"/>

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/bundle.css" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

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

  <?php   $this->load->view('admin/file/header')?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
      
      <?php   $this->load->view('admin/file/navbar')?>
        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content ">
                
    <div class="page-header">
        <div>
            <h3>Update Services </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url();?>Admin">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url();?>Services/view">Services View</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Services Update</li>
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
<h6 class="card-title">Update Services </h6>
 <!--  <P>If your form layout  <code>.{valid|invalid}-feedback</code>  .</P> -->
 

 <?php  echo form_open_multipart('Services/update_Services' ,'class="needs-validation" novalidate'); ?>
			 				
 <?php foreach ($result as $row) {  
   $t_id = $row->services_id;  $status = $row->status;  
 ?>                

   <div class="form-row">
      <div class="col-md-6 mb-3">
        <input name="services_id" id="services_id" value="<?php echo $t_id?>" type="hidden" class="form-control">
        <input type="hidden"   name="url" value="<?php echo base_url().$this->uri->uri_string();?>">
	
      
         <label for="s_name">Services Name</label>
         <input name="s_name" id="s_name" value="<?php echo $row->s_name;?>" type="text" class="form-control" 
         onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" required>
         <div class="invalid-tooltip">   Please Enter Services Name.  </div>
      </div>
      <div class="col-md-6 mb-3">
         <label for="service_url">Services Url</label>
         <input name="service_url" id="service_url" value="<?php echo $row->service_url;?>"  type="text" class="form-control" required>
         <div class="invalid-tooltip">   Please Enter Services Url.  </div>
      </div>
      
      <div class="col-md-12">
          <div class="form-group">
          	<label for="short_desc">Short Description</label>
       	   <textarea class="form-control" name="short_desc" id="short_desc" 
       	   rows="2"><?php echo $row->short_desc;?></textarea>
        </div> 
		</div>
       
       
       
         <div class="col-md-12">
          <div class="form-group">
          	<label for="long_desc1">Long Description 1</label>
       	   <textarea class="form-control" name="long_desc1" id="long_desc1"
       	    rows="3"><?php echo $row->long_desc1;?></textarea>
        </div> 
		</div>
    
       <div class="col-md-12">
          <div class="form-group">
          	<label for="long_desc2">Long Description 2</label>
       	   <textarea class="editor form-control" name="long_desc2" id="long_desc2"
       	    rows="3"><?php echo $row->long_desc2;?></textarea>
        </div> 
		</div>
		
	 
     <div class="col-md-6" style="padding: 20px;">
      <div class="row">
       <div class="col-md-8 col-6">
       <label for="userImage">Services icon <code> Height=350px  and width=350px; Max Image Size 2MB 
 		 	   </code></label>
 			 <input name="userImage" id="userImage" type="file" class="form-control">
 		 	    <div class="invalid-tooltip">
          	  Please  Select User Image
        	 </div>
      </div>
       <div class="col-md-2 col-6">
         <input type="hidden" name="old_profile" value="<?php echo $row->small_img;?>">
 	
       	<img src="<?php echo base_url()."public/img/services/".$row->small_img;?>" id="pre_profile" 
       	 alt="profile-image"  style="max-width: 120px;">
						
      </div>
      </div>
      </div>
      <div class="col-md-6" style="padding: 20px;">
      <div class="row">
       <div class="col-md-8 col-6">
       <label for="userImage">Select Services Image <code> Height=720px  and width=1920px; Max Image Size 2MB 
 		 	   </code></label>
 			 <input name="userImage2" id="uploadImage" type="file" onchange="PreviewImage();"  class="form-control">
 		 	    <div class="invalid-tooltip">
          	  Please Services Image
        	 </div>
      </div>
       <div class="col-md-2 col-6">
           <input type="hidden" name="old_profile2" value="<?php echo $row->long_img;?>">
 	
       	<img src="<?php echo base_url()."public/img/services/".$row->long_img;?>" id="uploadPreview" 
       	 alt="uploadPreview"  style="max-width: 120px;">
						
      </div>
      </div>
      </div>
       
   </div> <br>
   <?php  } ?>
   <button class="btn btn-primary" type="submit">Update </button>
   
<?php  echo form_close();?>
                         
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
          
          
        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->

<!-- Main scripts -->
<script src="<?php echo base_url();?>public/vendors/bundle.js"></script>

    <!-- Form validation example -->
<script src="<?php echo base_url();?>public/assets/js/examples/form-validation.js"></script>

    <!-- Prism -->
<script src="<?php echo base_url();?>public/vendors/prism/prism.js"></script>

<!-- App scripts -->
<script src="<?php echo base_url();?>public/assets/js/app.min.js"></script>

   <script src="<?php echo base_url();?>public/vendors/ckeditor5/ckeditor.js"></script>
 
<script type="text/javascript">
function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
};

ClassicEditor
.create( document.querySelector( '#long_desc1' ), {
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
    heading: {
        options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
        ]
    }
})

ClassicEditor
.create( document.querySelector( '#long_desc2' ), {
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
    heading: {
        options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
        ]
    }
})

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

 
	function convertToSlug(str) 
	{
		  //replace all special characters | symbols with a space
	  str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
	  // trim spaces at start and end of string
	  str = str.replace(/^\s+|\s+$/gm,'');
	  // replace space with dash/hyphen
	  str = str.replace(/\s+/g, '-');	
	  document.getElementById('service_url').value = str;
	 }
 function readURL(input) 
 {
 	  if (input.files && input.files[0])
 		   {
 	        var reader = new FileReader();

 	        reader.onload = function (e) 
 	        {
 	            $('#pre_profile').attr('src', e.target.result);
 	        }
 		 	 reader.readAsDataURL(input.files[0]);
 	    	}
 }   $("#userImage").change(function(){readURL(this);	});

  
</script>
<script type="text/javascript"> 

 


</script>


 
</body>
 </html>
