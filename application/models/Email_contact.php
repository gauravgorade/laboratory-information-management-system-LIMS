<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email_contact extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('url');
    }
    
    function contact_email_admin($name,$email, $mobile,$message)
    {
        
        date_default_timezone_set('Asia/Kolkata');
        $date=date('d-m-Y H:i:s');
        $weekday=date('l', strtotime( $date));
        $month = date('F', strtotime($date));
        $year = date('d, Y');
        $time = date('h:i:s a', strtotime($date));
        
        
      //  $to1 = "wd.crelite@gmail.com";
       $to1 = "detectathome.com@gmail.com";
        $subject1 = "New Contact Us Section Request DetectatHome";
        
        $htmlContent1 = '<html>
<head>
	<title>Detect Diagnostics Pathology Lab</title>
<style>
.bodydata {
    background-color: #f05536;;
	background-image: url("'.base_url().'public/web/images/background.png");
	background-size: 100% 100%;
	padding-top:20px;
	padding-bottom:30px;
}
.container {
	width:70%;
	margin:auto;
	margin-top:15px;
}
.imgsize {
	height:135px;
	width:200px;
	display:block;
    margin:auto;
}
.imgcontent{
	padding-top:20px;
	padding-bottom:10px;
}
.content{
	width:80%;
	margin:auto;
	padding:2px;
	padding-bottom:15px;
}
.contenthead{
	text-align:center;
	font-family: monospace;
	font-size:1.3em;
	padding-left:30px;
	padding-right:30px;
}
.contentmid {
	text-align:center;
	font-family: Arial, Helvetica, serif;
	font-size:1em;
}
.fonthead {
	color:#b35b5b;
}
.footer {
	text-align:center;
}
p.fonty {
    font-family: Arial, Helvetica, serif;
	font-size:0.9em;
}
.fb{
	padding-bottom:20px;
}
            
/* On tablet screens that are 900px wide or less*/
@media screen and (max-width: 900px) {
	.container {
		width:85%;
	}
	.content{
		width:88%;
	}
}
            
/* On Mobile screens that are 500px wide or less*/
@media screen and (max-width: 500px) {
	.container {
		width:100%;
	}
	.imgsize {
		height:100px;
		width:150px;
	}
	.content{
		width:95%;
	}
	.contenthead{
		font-size:1.2em;
	}
	.contentmid {
		font-size:0.9em;
	}
	p.fonty {
		font-size:0.8em;
	}
}
</style>
</head>
<body>
<div class="bodydata">
	<div class="container" style="background-color:#f5f5f5;">
		<div  class="imgcontent">
			 <a href="'.base_url().'"><img src="'.base_url().'public/web/images/detectlogo.png" class="imgsize"></a>
		</div>
		<div class="content" style="background-color:#ffffff;border-radius:8px;border:none;">
			<div class="contenthead">
				<h3>Contact Us section request by <b style="color:#f05536;">&nbsp;'.$name.'</b></h3>
			</div>
			<hr width="90%">
			<div class="contentmid">
				<div style="font-size:1em;">
					<p>Mail sent on&nbsp;'.$weekday.',&nbsp;'.$month.'&nbsp;'.$year.'&nbsp;at&nbsp;'.$time.',</p>
				</div>
					<table style="margin:auto;padding-left:30px;padding-right:30px;">
						<tr>
							<td style="text-align:right;"><b class="fonthead">Site</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.base_url().'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">By</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">Contact Us Section</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Name</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">
'.$name.'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Email</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">
'.$email.'</td>
						</tr>
	<tr>
							<td style="text-align:right;"><b class="fonthead">Mobile Number</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">
'.$mobile.'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Message</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">
'.$message.'</td>
						</tr>
					</table>
					<p style="color:#8d8d8d;"><b>Note</b> : Please! mail shortly & solve query of patient</p>
			</div>
		</div>
		<div class="footer">
				<p class="fonty">Please do not reply to this email as this is an automatic service.</p>
			<div class="fb">
				<a href="https://www.facebook.com/detectdiagnostics"><img src="'.base_url().'public/web/images/facebook.png" alt="fb" height="30px" width="30px"></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>';
        
     
        
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
         // Additional headers
         $headers .= "From:Detect Diagnostics<contact@detectdiagnostics.com>" . "\r\n";
         
         $headers .= "Reply-To:donotreply@detectdiagnostics.com" . "\r\n";
         
         $headers .= "X-Mailer:PHP/" . phpversion();
         
         mail($to1,$subject1,$htmlContent1,$headers,'-fcontact@detectdiagnostics.com');
         
         
        
        
    }
    
    
    
    
    function cotact_email_user($email)
    {
        
        
        date_default_timezone_set('Asia/Kolkata');
        $date=date('d-m-Y H:i:s');
        $weekday=date('l', strtotime( $date));
        $month = date('F', strtotime($date));
        $year = date('d, Y');
        $time = date('h:i:s a', strtotime($date));
        
        $to = $email;
        $subject = "Your Response is recorded | Detect Diaginostics";
        
        $htmlContent = '<html>
<head>
	<title>Detect Diagnostics Pathology Lab</title>
<style>
.bodydata {
    background-color: #f05536;
	background-image: url("'.base_url().'public/web/images/background.png");
	background-size: 100% 100%;
	padding-top:20px;
	padding-bottom:30px;
}
.container {
	width:70%;
	margin:auto;
	margin-top:15px;
}
.imgsize {
	height:135px;
	width:200px;
	display:block;
    margin:auto;
}
.imgcontent{
	padding-top:20px;
	padding-bottom:10px;
}
.content{
	width:80%;
	margin:auto;
	padding:2px;
	padding-bottom:10px;
}
.contenthead{
	text-align:center;
	font-family: monospace;
	font-size:1.3em;
	padding-left:30px;
	padding-right:30px;
}
.contentmid {
	text-align:center;
	font-family: Arial, Helvetica, serif;
	font-size:1em;
}
.fonthead {
	color:#b35b5b;
}
.footer {
	text-align:center;
	margin-top:15px;
}
p.fonty {
    font-family: Arial, Helvetica, serif;
	font-size:0.9em;
}
.fb{
	padding-bottom:20px;
	margin-top:8px;
}
            
/* On tablet screens that are 900px wide or less*/
@media screen and (max-width: 900px) {
	.container {
		width:85%;
	}
	.content{
		width:88%;
	}
}
            
/* On Mobile screens that are 500px wide or less*/
@media screen and (max-width: 500px) {
	.container {
		width:100%;
	}
	.imgsize {
		height:100px;
		width:150px;
	}
	.content{
		width:95%;
	}
	.contenthead{
		font-size:1.2em;
	}
	.contentmid {
		font-size:0.9em;
	}
	p.fonty {
		font-size:0.8em;
	}
}
</style>
</head>
<body>
<div class="bodydata">
	<div class="container" style="background-color:#f5f5f5;">
		<div  class="imgcontent">
			 <a href="'.base_url().'"><img src="'.base_url().'public/web/images/detectlogo.png" class="imgsize"></a>
		</div>
		<div class="content" style="background-color:#ffffff;border-radius:8px;border:none;">
			<div class="contenthead">
				<h3>Thank you for giving opportunity to serve you.</h3>
			</div>
			<hr width="90%">
			<div class="contentmid">
				<div style="font-size:1em;">
					<p>Our Representative will connect with you shortly,
					<br>Stay tuned.</p>
				</div>
            
					<p> Warm regards,</p>
					<p>Detect Diaginostics<br>
					A unit of mypath health care lab Pvt.Ltd.</p>
			</div>
		</div>
		<div class="footer">
				<table style="margin:auto;padding-left:30px;padding-right:30px;">
						<tr>
							<td style="text-align:right;"><b class="fonthead">Contacts</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">9822365247 / 9158966966</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Address</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">Shop No 12/13, Disha Sankul, Aside Reliance Mall, Garkheda, Aurangabad.</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Visit</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.base_url().'</td>
						</tr>
						</table>
			<div class="fb">
				<a href="https://www.facebook.com/detectdiagnostics"><img src="'.base_url().'public/web/images/facebook.png" alt="fb" height="30px" width="30px"></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>';
        
       
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // Additional headers
        $headers .= "From:Detect Diagnostics<contact@detectdiagnostics.com>" . "\r\n";
        
        $headers .= "Reply-To:donotreply@detectdiagnostics.com" . "\r\n";
        
        $headers .= "X-Mailer:PHP/" . phpversion();
        
        mail($to,$subject,$htmlContent,$headers,'-fcontact@detectdiagnostics.com');
      
    }
    
    
    
    function email_newslatter_admin($email)
    {
        date_default_timezone_set('Asia/Kolkata');
        $date=date('d-m-Y H:i:s');
        $weekday=date('l', strtotime( $date));
        $month = date('F', strtotime($date));
        $year = date('d, Y');
        $time = date('h:i:s a', strtotime($date));
        
       // $to1 = "wd.crelite@gmail.com";
     $to1 = "detectathome.com@gmail.com";
        $subject1 = "New Member Subscription Notification | Detect Diaginostics";
        
        $htmlContent1 = '<html>
<head>
	<title>Detect Diagnostics Pathology Lab</title>
<style>
.bodydata {
    background-color: #f05536;;
	background-image: url("'.base_url().'public/web/images/background.png");
	background-size: 100% 100%;
	padding-top:20px;
	padding-bottom:30px;
}
.container {
	width:70%;
	margin:auto;
	margin-top:15px;
}
.imgsize {
	height:135px;
	width:200px;
	display:block;
    margin:auto;
}
.imgcontent{
	padding-top:20px;
	padding-bottom:10px;
}
.content{
	width:80%;
	margin:auto;
	padding:2px;
	padding-bottom:15px;
}
.contenthead{
	text-align:center;
	font-family: monospace;
	font-size:1.3em;
	padding-left:30px;
	padding-right:30px;
}
.contentmid {
	text-align:center;
	font-family: Arial, Helvetica, serif;
	font-size:1em;
}
.fonthead {
	color:#b35b5b;
}
.footer {
	text-align:center;
}
p.fonty {
    font-family: Arial, Helvetica, serif;
	font-size:0.9em;
}
.fb{
	padding-bottom:20px;
}
	    
/* On tablet screens that are 900px wide or less*/
@media screen and (max-width: 900px) {
	.container {
		width:85%;
	}
	.content{
		width:88%;
	}
}
	    
/* On Mobile screens that are 500px wide or less*/
@media screen and (max-width: 500px) {
	.container {
		width:100%;
	}
	.imgsize {
		height:100px;
		width:150px;
	}
	.content{
		width:95%;
	}
	.contenthead{
		font-size:1.2em;
	}
	.contentmid {
		font-size:0.9em;
	}
	p.fonty {
		font-size:0.8em;
	}
}
</style>
</head>
<body>
<div class="bodydata">
	<div class="container" style="background-color:#f5f5f5;">
		<div  class="imgcontent">
			 <a href="'.base_url().'"><img src="'.base_url().'public/web/images/detectlogo.png" class="imgsize"></a>
		</div>
		<div class="content" style="background-color:#ffffff;border-radius:8px;border:none;">
			<div class="contenthead">
				<h3>New Subscriber Joined <b style="color:#f05536;">&nbsp;Check Out!</b></h3>
			</div>
			<hr width="90%">
			<div class="contentmid">
				<div style="font-size:1em;">
					<p>Mail sent on&nbsp;'.$weekday.',&nbsp;'.$month.'&nbsp;'.$year.'&nbsp;at&nbsp;'.$time.',</p>
				</div>
					<table style="margin:auto;padding-left:30px;padding-right:30px;">
						<tr>
							<td style="text-align:right;"><b class="fonthead">Site</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.base_url().'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">For</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">Newsletter Subscription</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Email</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$email.'</td>
						</tr>
					</table>
			</div>
		</div>
		<div class="footer">
				<p class="fonty">Please do not reply to this email as this is an automatic service.</p>
			<div class="fb">
				<a href="https://www.facebook.com/detectdiagnostics"><img src="'.base_url().'public/web/images/facebook.png" alt="fb" height="30px" width="30px"></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>';
        
        
        //Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // Additional headers
        $headers .= "From:Detect Diagnostics<contact@detectdiagnostics.com>" . "\r\n";
        
        $headers .= "Reply-To:donotreply@detectdiagnostics.com" . "\r\n";
        
        $headers .= "X-Mailer:PHP/" . phpversion();
        
        mail($to1,$subject1,$htmlContent1,$headers,'-fcontact@detectdiagnostics.com');
      
    }
    
    
    
    function email_newslatter_user($email)
    {
        date_default_timezone_set('Asia/Kolkata');
        $date=date('d-m-Y H:i:s');
        $weekday=date('l', strtotime( $date));
        $month = date('F', strtotime($date));
        $year = date('d, Y');
        $time = date('h:i:s a', strtotime($date));
        
        $to = $email;
        $subject = "Thank You For Subscribing Detect Diaginostics Newsletter";
        
        $htmlContent = '<html>
<head>
	<title>Detect Diagnostics Pathology Lab</title>
<style>
.bodydata {
    background-color: #f05536;
	background-image: url("'.base_url().'public/web/images/background.png");
	background-size: 100% 100%;
	padding-top:20px;
	padding-bottom:30px;
}
.container {
	width:70%;
	margin:auto;
	margin-top:15px;
}
.imgsize {
	height:135px;
	width:200px;
	display:block;
    margin:auto;
}
.imgcontent{
	padding-top:20px;
	padding-bottom:10px;
}
.content{
	width:80%;
	margin:auto;
	padding:2px;
	padding-bottom:10px;
}
.contenthead{
	text-align:center;
	font-family: monospace;
	font-size:1.3em;
	padding-left:30px;
	padding-right:30px;
}
.contentmid {
	text-align:center;
	font-family: Arial, Helvetica, serif;
	font-size:1em;
}
.fonthead {
	color:#b35b5b;
}
.footer {
	text-align:center;
	margin-top:15px;
}
p.fonty {
    font-family: Arial, Helvetica, serif;
	font-size:0.9em;
}
.fb{
	padding-bottom:20px;
	margin-top:8px;
}
	    
/* On tablet screens that are 900px wide or less*/
@media screen and (max-width: 900px) {
	.container {
		width:85%;
	}
	.content{
		width:88%;
	}
}
	    
/* On Mobile screens that are 500px wide or less*/
@media screen and (max-width: 500px) {
	.container {
		width:100%;
	}
	.imgsize {
		height:100px;
		width:150px;
	}
	.content{
		width:95%;
	}
	.contenthead{
		font-size:1.2em;
	}
	.contentmid {
		font-size:0.9em;
	}
	p.fonty {
		font-size:0.8em;
	}
}
</style>
</head>
<body>
<div class="bodydata">
	<div class="container" style="background-color:#f5f5f5;">
		<div  class="imgcontent">
			 <a href="'.base_url().'"><img src="'.base_url().'public/web/images/detectlogo.png" class="imgsize"></a>
		</div>
		<div class="content" style="background-color:#ffffff;border-radius:8px;border:none;">
			<div class="contenthead">
				<h3>Congratulations! You are now member of Detect Diaginostics Subscription.</h3>
			</div>
			<hr width="90%">
			<div class="contentmid">
				<div style="font-size:1em;">
					<p>Thank you for Subscribing us for latest offers & updates,
					<br>Stay tuned.</p>
				</div>
			     
					<p> Warm regards,</p>
					<p>Detect Diaginostics<br>
					A unit of mypath health care lab Pvt.Ltd.</p>
			</div>
		</div>
		<div class="footer">
				<table style="margin:auto;padding-left:30px;padding-right:30px;">
						<tr>
							<td style="text-align:right;"><b class="fonthead">Contacts</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">9822365247 / 9158966966</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Address</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">Shop No 12/13, Disha Sankul, Aside Reliance Mall, Garkheda, Aurangabad.</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Visit</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.base_url().'</td>
						</tr>
						</table>
			<div class="fb">
				<a href="https://www.facebook.com/detectdiagnostics"><img src="'.base_url().'public/web/images/facebook.png" alt="fb" height="30px" width="30px"></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>';
        
        
        //Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // Additional headers
        $headers .= "From:Detect Diagnostics<notification@detectdiagnostics.com>" . "\r\n";
        
        $headers .= "Reply-To:donotreply@detectdiagnostics.com" . "\r\n";
        
        $headers .= "X-Mailer:PHP/" . phpversion();
        
        mail($to,$subject,$htmlContent,$headers,'-fnotification@detectdiagnostics.com');
        
        
        
        
        
    }
    
  
    
    
    
    
}