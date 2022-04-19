<?php
class Home_data extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function insert_home_sample($data)
    {
        $this->db->insert('home_collection', $data);
        $this->session->set_userdata('temp_home_sample',$this->db->insert_id());
    }
    function update_home_sample($data,$cid)
    {
        $this->db->where('h_id', $cid);
        $this->db->update('home_collection', $data);
    }
    
    
    function single_home_sample($temp_home_sample)
    {
        $codition = array('h_id' => $temp_home_sample);
        $this->db->select('*');
        $this->db->from('home_collection');
        $this->db->where($codition);
        $query = $this->db->get();
        $result=$query->result();
        return $result;
    }
    
    function email_admin_home_sample($h_name,$h_email,$h_mobno)
    {
        date_default_timezone_set('Asia/Kolkata');
        $date=date('d-m-Y H:i:s');
        $weekday=date('l', strtotime( $date));
        $month = date('F', strtotime($date));
        $year = date('d, Y');
        $time = date('h:i:s a', strtotime($date));
        
      //  $to1 = "wd.crelite@gmail.com";
       $to1 = "detectathome.com@gmail.com";
        $subject1 = "New Home Sample Collection Visit Request DetectatHome";
        
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
				<h3>Home visit requested by <b style="color:#f05536;">&nbsp;'.$h_name.'</b></h3>
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
							<td style="text-align:right;"><b class="fonthead">For</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">home sample collection</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Name</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$h_name.'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Mobile No.</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$h_mobno.'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Email</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$h_email.'</td>
						</tr>
					</table>
					<p style="color:#8d8d8d;"><b>Note</b> : Please! call back shortly & Visit for sample collection</p>
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
    
    
    
    function email_user_home_sample($h_email){
        date_default_timezone_set('Asia/Kolkata');
        $date=date('d-m-Y H:i:s');
        $weekday=date('l', strtotime( $date));
        $month = date('F', strtotime($date));
        $year = date('d, Y');
        $time = date('h:i:s a', strtotime($date));
        
        $to = $h_email;
        $subject = "Your Home Sample Collection Booking is Confirmed | Detect Diaginostics";
        
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
					<p>Our Representative will contact you shortly,
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
        $headers .= "From:Detect Diagnostics<contact@detectdiagnostics.com>" . "\r\n";
        
        $headers .= "Reply-To:donotreply@detectdiagnostics.com" . "\r\n";
        
        $headers .= "X-Mailer:PHP/" . phpversion();
        
        mail($to,$subject,$htmlContent,$headers,'-fcontact@detectdiagnostics.com');
        
        
        
    }
    
    
    
    
    function insert_package_collection($data)
    {
        $this->db->insert('inquiry', $data);
        $this->session->set_userdata('temp_inquiry_id',$this->db->insert_id());
    }
    function update_package_collection($data,$cid)
    {
        $this->db->where('c_id', $cid);
        $this->db->update('inquiry', $data);
    }
    
    function email_admin_package_collection($p_name,$p_mobno,$p_email,$p_package ){
        date_default_timezone_set('Asia/Kolkata');
        $date=date('d-m-Y H:i:s');
        $weekday=date('l', strtotime( $date));
        $month = date('F', strtotime($date));
        $year = date('d, Y');
        $time = date('h:i:s a', strtotime($date));
      //  $to1 = "wd.crelite@gmail.com";
        $to1 = "detectathome.com@gmail.com";
        $subject1 = "New ".$p_package." Package Home Visit Request | Detect Diaginostics";
        
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
				<h3>For Package Home visit requested by <b style="color:#f05536;">&nbsp;'.$p_name.'</b></h3>
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
							<td style="text-align:right;"><b class="fonthead">For</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">home sample collection</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Name</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$p_name.'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Mobile No.</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$p_mobno.'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Email</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$p_email.'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Package</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$p_package.'</td>
						</tr>
					</table>
					<p style="color:#8d8d8d;"><b>Note</b> : Please! call back shortly & Visit for package sample collection</p>
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
     
    function email_user_package_collection($h_email,$p_package)
    {
        
        date_default_timezone_set('Asia/Kolkata');
        $date=date('d-m-Y H:i:s');
        $weekday=date('l', strtotime( $date));
        $month = date('F', strtotime($date));
        $year = date('d, Y');
        $time = date('h:i:s a', strtotime($date));
        
        $to = $h_email;
        $subject = "Your ".$p_package." Package Booking is Confirmed | Detect Diaginostics";
        
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
					<p>Our Representative will contact you shortly,
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
        $headers .= "From:Detect Diagnostics<contact@detectdiagnostics.com>" . "\r\n";
        
        $headers .= "Reply-To:donotreply@detectdiagnostics.com" . "\r\n";
        
        $headers .= "X-Mailer:PHP/" . phpversion();
        
        mail($to,$subject,$htmlContent,$headers,'-fcontact@detectdiagnostics.com');
        
        
        
        
    }
    
    
    
     
    function insert_get_support($data)
    {
        $this->db->insert('get_support', $data);
        $this->session->set_userdata('temp_get_support_id',$this->db->insert_id());
    }
    
    function update_get_support($data,$cid)
    {
        $this->db->where('g_id', $cid);
        $this->db->update('get_support', $data);
    }
    
    function email_admin_get_support($g_name, $g_mobno, $g_email, $g_message)
   {
       date_default_timezone_set('Asia/Kolkata');
       $date=date('d-m-Y H:i:s');
       $weekday=date('l', strtotime( $date));
       $month = date('F', strtotime($date));
       $year = date('d, Y');
       $time = date('h:i:s a', strtotime($date));
       
      // $to1 = "wd.crelite@gmail.com";
       
       $to1 = "detectathome.com@gmail.com";
       $subject1 = "New Get Support Section Request Detect at Home";
       
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
				<h3>Get Support requested by <b style="color:#f05536;">&nbsp;'.$g_name.'</b></h3>
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
							<td style="text-align:right;"><b class="fonthead">By</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">Get Support Section</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Name</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$g_name.'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Mobile No.</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$g_mobno.'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Email</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$g_email.'</td>
						</tr>
						<tr>
							<td style="text-align:right;"><b class="fonthead">Message</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">'.$g_message.'</td>
						</tr>
					</table>
					<p style="color:#8d8d8d;"><b>Note</b> : Please! mail or call back shortly & solve query of patient</p>
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
    
    
    
    function email_user_get_support($g_email) 
    {
        date_default_timezone_set('Asia/Kolkata');
        $date=date('d-m-Y H:i:s');
        $weekday=date('l', strtotime( $date));
        $month = date('F', strtotime($date));
        $year = date('d, Y');
        $time = date('h:i:s a', strtotime($date));
        
        $to = $g_email;
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
					<p>Our Representative will contact you shortly,
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
        $headers .= "From:Detect Diagnostics<contact@detectdiagnostics.com>" . "\r\n";
        
        $headers .= "Reply-To:donotreply@detectdiagnostics.com" . "\r\n";
        
        $headers .= "X-Mailer:PHP/" . phpversion();
        
        mail($to,$subject,$htmlContent,$headers,'-fcontact@detectdiagnostics.com');
        
        
    }
    
    
    
}


?>