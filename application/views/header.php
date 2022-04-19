<?php foreach ($result as $wrow) {?>
<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 120, 'stickySetTop': 0}">
				<div class="header-body">
					<div class="header-top header-top-dark">
						<div class="header-top-container container">
							<div class="header-row">
								<div class="header-column justify-content-start">
									<span class="d-none d-sm-flex align-items-center">
										<i class="fas fa-map-marker-alt mr-1" style="color:#000000;"></i>
										<?php echo $wrow->short_address;?>
									</span>
									<span class="d-none d-sm-flex align-items-center ml-4">
										<i class="fas fa-phone mr-1" style="color:#000000;"></i>
										<a href="tel:+91<?php echo $wrow->mobile;?>" title="Call Us Now" onMouseOver="this.style.color='#000'" onMouseOut="this.style.color='#fff'">+91 <?php echo $wrow->mobile;?></a>
									</span>
								</div>
								<div class="header-column justify-content-end">
									<ul class="nav">
										<li class="nav-item">
											<a class="nav-link" onMouseOver="this.style.color='#000'" onMouseOut="this.style.color='#fff'" href="#" data-toggle="modal" data-target="#exampleModal2">Collection Centers</a>
										</li>
									</ul>
									<ul class="header-top-social-icons social-icons social-icons-transparent d-none d-md-block">
										<li class="social-icons-facebook">
											<a href="<?php echo $wrow->fb_id;?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
										</li>
										<li class="social-icons-twitter">
											<a href="<?php echo $wrow->twit_id;?>"  title="Twitter"><i class="fab fa-twitter"></i></a>
										</li>
										<li class="social-icons-instagram">
											<a href="<?php echo $wrow->insta_id;?>"  title="Instragram"><i class="fab fa-instagram"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container" style="height:130px;">
						<div class="header-row">
							<div class="header-column justify-content-start">
								<div class="header-logo">
									<a href="<?php echo base_url();?>">
										<img alt="Detect Diagnostics" title="Detect Diagnostics Advanced Pathology & Microbiology Lab" width="160" height="85" src="<?php echo base_url()."public/img/".$wrow->header_logo;?>">
									</a>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-nav">
									<div class="header-nav-main header-nav-main-uppercase header-nav-main-effect-1 header-nav-main-sub-effect-1">
										<nav class="collapse">
											<ul class="nav flex-column flex-lg-row" id="mainNav">
												<li class="dropdown dropdown-mega">
													<a class="dropdown-item dropdown-toggle active" href="<?php echo base_url();?>">
														Home
													</a>
												</li>
												<li class="dropdown dropdown-mega">
													<a class="dropdown-item dropdown-toggle active" href="<?php echo base_url();?>home/beed">
														Beed
													</a>
												</li>
											</ul>
										</nav>
									</div>
									<div class="header-button d-none d-sm-flex ml-3">
										<a class="btn btn-outline popup-gmaps btn-rounded btn-primary btn-4 btn-icon-effect-1" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3752.405290669745!2d75.3469080149135!3d19.86510108664011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1ef22b7c575a53a7!2sDetect+Diagnostics%2C+Advanced+Pathology+%26+Microbiology+Main+Lab!5e0!3m2!1sen!2sin!4v1542882078906">
											<span class="wrap">
												<span>Get Direction</span>
												<i class="fas fa-map-marker-alt"></i>
											</span>
										</a>
									</div>
									<button class="header-btn-collapse-nav ml-3" data-toggle="collapse" data-target=".header-nav-main nav">
										<span class="hamburguer">
											<span></span>
											<span></span>
											<span></span>
										</span>
										<span class="close">
											<span></span>
											<span></span>
										</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			
<?php } ?>