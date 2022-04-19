	<div class="slider-container slider-container-height-800 rev_slider_wrapper">
					<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 3000, 'gridwidth': [1140,800,800,800], 'gridheight': [800,522,422,422], 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,576], 'navigation' : {'arrows': { 'enable': true, 'hide_under': 767, 'style': 'slider-arrows-style-1' }, 'bullets': {'enable': true, 'hide_under': 767, 'hide_onleave': false, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 110, 'h_offset': 0}}}">
						<ul>
						<?php   
						foreach ($result2 as $slider_row) 
						{
						    $slider_id = $slider_row->slider_id;
						  if ($slider_id =='1')
						    {
						?>	
							
							<li data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0" data-saveperformance="off">
								<img src="<?php echo base_url()."public/img/slider/".$slider_row->img_path?>"
									alt=""
									data-bgposition="center right" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat"
									class="rev-slidebg">

								<div class="tp-caption text-color-primary font-primary font-weight-bold"
									data-frames='[{"from":"y:[-50%];opacity:0;","speed":1500,"to":"o:1;","delay":1100,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:left(R);","ease":"Power3.easeIn"}]'
									data-x="['53','90','140','135']"
									data-y="['240','140','113','113']" data-voffset="['-50','-50','-50','-50']"
									data-fontsize="['23','23','20','20']"> <?php echo  $slider_row->heading;?></div>

								<h1 class="tp-caption text-color-dark font-weight-bold"
									data-frames='[{"from":"y:[-20%];opacity:0;","speed":1500,"to":"o:1;","delay":1200,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:left(R);","ease":"Power3.easeIn"}]'
									data-x="['50','86','135','132']"
									data-y="['266','165','138','138']"
									data-fontsize="['60','60','50','40']"
									data-lineheight="['65','65','45','45']"><?php echo  $slider_row->sub_heading;?> </h1>

								<div class="tp-caption text-color-dark font-primary font-weight-bold-2"
									data-frames='[{"from":"y:[-50%];opacity:0;","speed":1500,"to":"o:1;","delay":1300,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:left(R);","ease":"Power3.easeIn"}]'
									data-x="['165','211','185','182']"
									data-y="['339','240','190','188']" data-voffset="['60','60','60','50']"
									data-fontsize="['28','28','28','28']"><?php echo  $slider_row->paragraph1;?> </div>
								
							</li>
							
						<?php  } 
						if ($slider_id =='2') {?>	
							<li data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0" data-saveperformance="off">
								<img src="<?php echo base_url()."public/img/slider/".$slider_row->img_path?>"  
									alt=""
									data-bgposition="center right" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat"
									class="rev-slidebg">

								<div class="tp-caption text-color-primary layer-bg-color font-quaternary"
									data-frames='[{"from":"y:[-50%];opacity:0;","speed":1500,"to":"o:1;","delay":1100,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:left(R);","ease":"Power3.easeIn"}]'
									data-x="['708','480','463','462']" data-hoffset="['190','190','158','130']"
									data-y="['135','85','65','65']" data-voffset="['95','95','95','95']"
									data-fontsize="['36','25','20','20']"
									data-paddingtop="8"
									data-paddingbottom="8"
									data-paddingleft="16"
									data-paddingright="16"> <?php echo  $slider_row->heading;?></div>
								
							</li>
							
							<?php  }  if ($slider_id =='3') {?>	
							<li data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0" data-saveperformance="off">
								<img src="<?php echo base_url()."public/img/slider/".$slider_row->img_path?>"  
									alt=""
									data-bgposition="center right" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat"
									class="rev-slidebg">

								<div class="tp-caption text-color-dark font-primary font-weight-bold-2"
									data-frames='[{"from":"y:[-50%];opacity:0;","speed":1500,"to":"o:1;","delay":1300,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:left(R);","ease":"Power3.easeIn"}]'
									data-x="['460','305','322','325']"
									data-y="['40','20','12','12']" data-voffset="['60','60','60','50']"
									data-fontsize="['35','25','23','22']"> <?php echo  $slider_row->heading;?></div>
								
							</li>
							<?php  } if ($slider_id !='1' AND $slider_id !='2' AND $slider_id !='3' ) { ?>	
						<li data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0" data-saveperformance="off">
								<img src="<?php echo base_url()."public/img/slider/".$slider_row->img_path?>"
									alt=""
									data-bgposition="center right" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat"
									class="rev-slidebg">

								<div class="tp-caption text-color-primary font-primary font-weight-bold"
									data-frames='[{"from":"y:[-50%];opacity:0;","speed":1500,"to":"o:1;","delay":1100,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:left(R);","ease":"Power3.easeIn"}]'
									data-x="['53','90','140','135']"
									data-y="['240','140','113','113']" data-voffset="['-50','-50','-50','-50']"
									data-fontsize="['23','23','20','20']"> <?php echo  $slider_row->heading;?></div>

								<h1 class="tp-caption text-color-dark font-weight-bold"
									data-frames='[{"from":"y:[-20%];opacity:0;","speed":1500,"to":"o:1;","delay":1200,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:left(R);","ease":"Power3.easeIn"}]'
									data-x="['50','86','135','132']"
									data-y="['266','165','138','138']"
									data-fontsize="['60','60','50','40']"
									data-lineheight="['65','65','45','45']"><?php echo  $slider_row->sub_heading;?> </h1>

								<div class="tp-caption text-color-dark font-primary font-weight-bold-2"
									data-frames='[{"from":"y:[-50%];opacity:0;","speed":1500,"to":"o:1;","delay":1300,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:left(R);","ease":"Power3.easeIn"}]'
									data-x="['165','211','185','182']"
									data-y="['339','240','190','188']" data-voffset="['60','60','60','50']"
									data-fontsize="['28','28','28','28']"><?php echo  $slider_row->paragraph1;?> </div>
								
							</li>
						
						
							<?php } }  ?>
						</ul>
					</div>
				</div>
				