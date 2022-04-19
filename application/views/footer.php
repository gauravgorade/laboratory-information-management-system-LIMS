<?php foreach ($result as $wrow) {?>
<footer id="footer" class="footer-hover-links-light mt-0">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 mb-4 mb-md-0">
							<a href="<?php echo base_url();?>" class="logo" title="Detect Diagnostics Advanced Pathology & Microbiology Lab">
								<img alt="Detect Diagnostics" class="img-fluid mb-3" src="<?php echo base_url()."public/img/".$wrow->footer_logo;?>">
							</a>
						</div>
						<div class="col-lg-3  ml-auto mb-4 pt-lg-2">
							
							<h2 class="text-3 mb-3">ABOUT US</h2>
							<p class="text-justify"><?php echo $wrow->footer_about;?></p>
						</div>
						<div class="col-lg-4 ml-auto mb-4 pt-lg-2">
							<h2 class="text-3 mb-3">CONTACTS</h2>
							<ul class="list list-icon list-unstyled mb-0 mb-lg-3">
								<li class="mb-3"><i class="fas fa-angle-right mr-2 ml-1"></i> <span style="color:#f57c00;">Address:</span>
								<?php echo $wrow->address_line1. ", ".$wrow->address_line2. ",".$wrow->city.", ".$wrow->state.",".$wrow->country.", ".$wrow->pincode?> 
								</li>
								<li class="mb-3"><i class="fas fa-angle-right mr-2 ml-1"></i> <span style="color:#f57c00;">Phone:</span><a 
								href="tel:+91<?php echo $wrow->mobile;?>" onMouseOver="this.style.color='#000'" onMouseOut="this.style.color='#777'" title="Call Us Now"> 
								+(91) <?php echo $wrow->mobile;?>  </a></li>
								<li class="mb-3"><i class="fas fa-angle-right mr-2 ml-1"></i> <span style="color:#f57c00;">Email:</span> <a href="mailto:<?php echo $wrow->email;?>"
								 onMouseOver="this.style.color='#000'" onMouseOut="this.style.color='#777'" 
								 title="Email Now">  <?php echo $wrow->email;?> </a></li>
							</ul>
						</div>
						<div class="col-lg-2  ml-auto mb-4 pt-lg-2">
							<h2 class="text-3 mb-3">USEFUL LINKS</h2>
							<ul class="list list-icon list-unstyled">
								<li class="mb-3"><i class="fas fa-angle-right mr-2 ml-1"></i> <a onMouseOver="this.style.color='#f57c00'" onMouseOut="this.style.color='#777'" href="#" data-toggle="modal" data-target="#exampleModal2">Our Centers</a></li>
								<li class="mb-3"><i class="fas fa-angle-right mr-2 ml-1"></i> <a onMouseOver="this.style.color='#f57c00'" onMouseOut="this.style.color='#777'" href="#" data-toggle="modal" data-target="#exampleModalprofile">Our Profile</a></li>
								<li class="mb-3"><i class="fas fa-angle-right mr-2 ml-1"></i> <a onMouseOver="this.style.color='#f57c00'" onMouseOut="this.style.color='#777'" href="#" data-toggle="modal" data-target="#exampleModalsupport">Get Support</a></li>
							</ul>
							<span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=BL6JQzDwwUPicQuNxwtSpzDPVuvST0VKYWCr98uoqFD95d0t6frqSrpVg56h"></script></span>
						</div>
					</div>
				</div>
	<div class="footer-copyright mt-0">
		<div class="container">
			<div class="row text-center text-md-left align-items-center">
				<div class="col-md-6 col-lg-7">
					<ul
						class="social-icons social-icons-transparent social-icons-icon-light social-icons-lg">
						<li class="social-icons-facebook"><a
							href="<?php echo $wrow->fb_id;?>" target="_blank"
							title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
						<li class="social-icons-twitter"><a
							href="<?php echo $wrow->twit_id;?>" target="_blank"
							title="Twitter"><i class="fab fa-twitter"></i></a></li>
						<li class="social-icons-instagram"><a
							href="<?php echo $wrow->insta_id;?>" target="_blank"
							title="Instagram"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
				<div class="col-md-6 col-lg-5">
					<p class="text-md-right pb-0 mb-0">&copy; <?php echo date("Y")?> <a
							onMouseOver="this.style.color='#f57c00'"
							onMouseOut="this.style.color='#777'"
							href="<?php echo base_url();?>"
							title="Detect Diagnostics Advanced Pathology & Microbiology Lab">Detect
							Diagnostics</a>. All Rights Reserved | Developed by 
							<a href="tel:+918308303340" onMouseOver="this.style.color='#000'"
							onMouseOut="this.style.color='#777'"
							title="Website Development & Digital Marketing">Crelite</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php } ?>