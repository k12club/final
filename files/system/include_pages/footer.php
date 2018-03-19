<footer id="cX-footer" class="cX-footer cX-haslayout">
			<div class="container">
				<div class="row">
					<div class="cX-footerinfo">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="cX-widget cX-widgettext">
								<div class="cX-widgetcontent">
								<?php if ( $detect->isMobile() ) {$footer_num=4;} else{$footer_num=9;} ?>
									<div class="cX-widget cX-widgetsearchbylocations">
											<ul>
												<?php 
							                      $datas_footer_coin = $db->get_results("SELECT coin_name,coin_flag,coin_symbol,coin_price FROM coins order by rand() limit $footer_num");
							                      foreach( $datas_footer_coin as $d_f_c ){
						                      	  $coin_footer_link=$site_url."/currencies/".$d_f_c->coin_flag;
							                    ?>
<li class="col-md-4 col-sm-6 col-xs-12"><a href="<?php echo $coin_footer_link; ?>" title="<?php echo $d_f_c->coin_name; ?> - <?php echo $d_f_c->coin_symbol; ?>"><span class="currency-logo-sprite3"><img src="<?php echo $site_url; ; ?>/assets/images/coin/16/<?php echo $d_f_c->coin_flag; ?>.png" alt="<?php echo $d_f_c->coin_name; ?>"></span>  <?php echo $d_f_c->coin_name; ?> (<?php echo $d_f_c->coin_symbol; ?>) <span><sup><?php echo $system_currency_symbol; ?></sup><?php echo price2($d_f_c->coin_price*$currency_cx); ?></span></a></li>
												<?php } ?>
											</ul>
										</div>

									<nav class="cX-footernav">
										<ul>
											<?php 
									$var_pages = $db->get_var("SELECT count(*) FROM pages");
									if($var_pages!=0) {
									$datas_pages = $db->get_results("SELECT id,p_name FROM pages order by id desc");
					              		foreach( $datas_pages as $data_page ){
					              		$page_d_name = json_decode($data_page->p_name,JSON_UNESCAPED_UNICODE);?><li><a href="<?php echo $site_url; ?>/page/<?php echo $data_page->id; ?>" title="<?php echo stripslashes(base64_decode($page_d_name[$system_language])); ?>"><?php echo stripslashes(base64_decode($page_d_name[$system_language])); ?></a></li><?php }} ?>

											<li><a href="<?php echo $site_url; ?>/page/faq" title="<?php echo $system_xml->footer_1->text; ?>"><?php echo $system_xml->footer_1->text; ?></a></li>
											<li><a href="<?php echo $site_url; ?>/page/donate" title="<?php echo $system_xml->footer_2->text; ?>"><?php echo $system_xml->footer_2->text; ?></a></li>
											<li><a href="<?php echo $site_url; ?>/page/contact" title="<?php echo $system_xml->footer_3->text; ?>"><?php echo $system_xml->footer_3->text; ?></a></li>
											<li><a href="<?php echo $site_url; ?>/sitemap.xml" title="<?php echo $system_xml->footer_4->text; ?>"><?php echo $system_xml->footer_4->text; ?></a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>