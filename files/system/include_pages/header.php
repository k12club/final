<header id="cX-header" class="cX-header cX-haslayout">
			<div class="cX-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="cX-navcurrency">
								<li>
									<div class="form-group">
										<div class="cX-select2" id="cX_select_language">
											<select>
												<?php 
				                      $datas_h_lang = $db->get_results("SELECT id,lang_name,lang_secure FROM languages where lang_status='1' order by lang_order ASC");
				                      foreach( $datas_h_lang as $d_h_l ){ ?><option<?php if($lang_cX==$d_h_l->lang_secure){?> selected="selected"<?php } ?> value="<?php echo $site_url; ?>/change-language?lang=<?php echo $d_h_l->id; ?>&loc=<?php echo base64_encode(full_link()); ?>"><?php echo $d_h_l->lang_name; ?></option><?php }?></select>
										</div>
									</div>
								</li><li>
									<div class="form-group">
										<div class="cX-select2" id="cX_select_currency">
											<select>
											<?php $currencies_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'curreny_setting' ");
													$d_h_c = json_decode($currencies_data->setting_value,JSON_UNESCAPED_UNICODE);
													for ($i = 0; $i <= count($d_h_c)-1 ; $i++) {
													if($d_h_c[$i][status]==1){?><option<?php if($curr_cX==md5($d_h_c[$i][code])){?> selected="selected"<?php } ?> value="<?php echo $site_url; ?>/change-curreny?curreny=<?php echo $d_h_c[$i][code]; ?>&loc=<?php echo base64_encode(full_link()); ?>"><?php echo $d_h_c[$i][code]; ?> - <?php echo $d_h_c[$i][name]; ?></option><?php } } ?></select>
										</div>
									</div>
								</li>
							</ul>
							<div class="dropdown cX-themedropdown cX-userdropdown">
								<a class="cX-btn cX-color" href="<?php echo $site_url; ?>/page/donate">
								<i class="icon-gift"></i>
								<span><?php echo $system_xml->header_1->text; ?></span>
							</a>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cX-navigationarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong class="cX-logo"><a href="<?php echo $site_url; ?>"><img src="<?php echo $site_url; ?>/<?php echo substr($site_setting[logo],3); ?>"></a></strong>
							
							<nav id="cX-nav" class="cX-nav">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#cX-navigation" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div id="cX-navigation" class="collapse navbar-collapse cX-navigation">
									<ul>
										
										<li class="menu-item">
											<a href="<?php echo $site_url; ?>"><?php echo $system_xml->header_2->text; ?></a>
										</li>
										<li class="menu-item">
											<a href="<?php echo $site_url; ?>/converter-calculator"><?php echo $system_xml->header_3->text; ?></a>
										</li>
										<li class="menu-item">
											<a href="<?php echo $site_url; ?>/coin-price-alert"><?php echo $system_xml->header_4->text; ?></a>
										</li>
										<?php if ( $detect->isMobile() ) { ?>
										<li class="menu-item">
											<a href="<?php echo $site_url; ?>/qr-code-generator"><?php echo $system_xml->header_6->text; ?></a>
										</li>										
										<li class="menu-item">
											<a href="<?php echo $site_url; ?>/exchange-sites"><?php echo $system_xml->header_7->text; ?></a>
										</li>
										<?php }else{ ?>
										<li class="menu-item-has-children">
											<a href="javascript:void(0);"><?php echo $system_xml->header_5->text; ?></a>
											<ul class="sub-menu">
												<li><a href="<?php echo $site_url; ?>/qr-code-generator"><?php echo $system_xml->header_6->text; ?></a></li>
												<li><a href="<?php echo $site_url; ?>/exchange-sites"><?php echo $system_xml->header_7->text; ?></a></li>
											</ul>
										</li>
										<?php } ?>
										
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>