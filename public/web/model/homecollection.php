<?php
include_once 'dbconfig.php';
include_once 'encrypt.php';
if(isset($_POST['h_name']) && isset($_POST['h_mobno']) && isset($_POST['h_email']) && isset($_POST['h_verify']) && isset($_POST['verify_otp']))
{
	$otp_no = $_POST['h_verify'];
	$otp = decryptIt($otp_no);
	$verify_otp = $_POST['verify_otp'];
	if ($otp == $verify_otp)
	{
	
	$h_name = $_POST['h_name'];
	$h_mobno = $_POST['h_mobno'];
	$h_email = $_POST['h_email'];
	
	$admin = "Alert!!\r\nInquiry From Detect Website,\r\nName: ".$h_name."\r\nMobile No.: ".$h_mobno."\r\nEmail: ".$h_email."\r\nFrom: Home Sample Collection Form\r\nTake a note & Call Immediately...";
	$message_send ="Thank you for choosing us!\r\nOur representative will contact you, We guarantee you an extraordinary doorstep service.\r\nRegards,\r\nDetect Diagnostics\r\n9822365247";
	$admin_no1 = 9822365247;
	$admin_no2 = 9890590499;
	$admin = urlencode($admin);
	$message_send = urlencode($message_send);
	
	$url="http://sms.crelite.in/vendorsms/pushsms.aspx?clientid=6209cd73-4b7e-4bd8-82b1-f63cb28a51e7&apikey=98ef07d8-84e7-44f5-b0cd-62859275db26&msisdn=$h_mobno&sid=DETECT&msg=$message_send&fl=0&gwid=2";
	$c=curl_init();
	curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($c,CURLOPT_URL,$url);
	$contents=curl_exec($c);
	curl_close($c);
	
	$url1="http://sms.crelite.in/vendorsms/pushsms.aspx?clientid=6209cd73-4b7e-4bd8-82b1-f63cb28a51e7&apikey=98ef07d8-84e7-44f5-b0cd-62859275db26&msisdn=$admin_no1,$admin_no2&sid=DETECT&msg=$admin&fl=0&gwid=2";
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_URL,$url1);
	$contents1=curl_exec($ch);
	curl_close($ch);
	
	$insertQuery="INSERT INTO home_collection (h_name,h_mobno,h_email,h_date,h_status) VALUES ('$h_name','$h_mobno','$h_email',now(),'No')";
	mysqli_query($con,$insertQuery);
	
	$addingc ="SELECT * FROM text_contact WHERE t_mobno='$h_mobno'";
    $resultcon = mysqli_query($con,$addingc);
    if(mysqli_num_rows($resultcon) == 0)
    {
    $insertQuery12="INSERT INTO text_contact(t_name,t_mobno,t_status,t_date) VALUES('$h_name','$h_mobno','Yes',now())";
	mysqli_query($con,$insertQuery12);
    }
	$addings ="SELECT * FROM subscribe_email WHERE s_email='$h_email'";
    $resultsub = mysqli_query($con,$addings);
    if(mysqli_num_rows($resultsub) == 0)
    {
	$insertQuery123="INSERT INTO subscribe_email(s_email,s_status,s_date) VALUES ('$h_email','Yes',now())";
	mysqli_query($con,$insertQuery123);
    }
	mysqli_close($con);
	
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
	background-image: url("http://www.detectathome.in/images/background.png");
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
			 <a href="http://www.detectathome.com"><img src="http://www.detectathome.in/images/detectlogo.png" class="imgsize"></a>
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
							<td style="text-align:right;"><b class="fonthead">Visit</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">http://www.detectathome.com</td>
						</tr>
						</table>
			<div class="fb"> 
				<a href="https://www.facebook.com/detectdiagnostics"><img src="http://www.detectathome.in/images/facebook.png" alt="fb" height="30px" width="30px"></a>
			</div>
		</div>
	</div>	
</div>	
</body>
</html>';

	// Set content-type header for sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// Additional headers
	$headers .= 'From:contact@detectdiagnostics.com';
	mail($to,$subject,$htmlContent,$headers);
	
	$to1 = "detectathome.com@gmail.com";
	$subject1 = "New Home Sample Collection Visit Request DetectatHome";

	$htmlContent1 = '<html>
<head>
	<title>Detect Diagnostics Pathology Lab</title>
<style>
.bodydata {
    background-color: #f05536;;
	background-image: url("http://www.detectathome.in/images/background.png");
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
			 <a href="http://www.detectathome.com"><img src="http://www.detectathome.in/images/detectlogo.png" class="imgsize"></a>
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
							<td style="text-align:right;"><b class="fonthead">Site</b></td><td style="text-align:center;">&nbsp;&nbsp;:&nbsp;&nbsp;</td><td style="text-align:left;">detectathome.com</td>
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
				<a href="https://www.facebook.com/detectdiagnostics"><img src="http://www.detectathome.in/images/facebook.png" alt="fb" height="30px" width="30px"></a>
			</div>
		</div>
	</div>	
</div>	
</body>
</html>';

	// Set content-type header for sending HTML email
	$headers1 = "MIME-Version: 1.0" . "\r\n";
	$headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// Additional headers
	$headers1 .= 'From:contact@detectdiagnostics.com';
	mail($to1,$subject1,$htmlContent1,$headers1);
?>
	<script>
		alert("Your Home Visit is Booked Succesfully,\nWe will connect with you shortly, Thank you!");
		window.location.href="../index.html";
	</script>
<?php	
	}
	else
	{
	?>
	<script>
		alert("Wrong OTP. Please re-verify!");
		window.location.href="../index.html";
	</script>
<?php	
	}
}
else
{
	echo "<script language='javascript' type='text/javascript'>window.open('../index.html','_self')</script>";
}
?>
