<div class="cX-widget cX-widgettrendingposts">
	<div class="cX-sidebartitle"><h2><?php echo $system_xml->other_1->text; ?></h2></div>
		<div class="cX-widgetcontent">
			<ul>
				<li>
					<a href="<?php echo $site_url; ?>" title="<?php echo $system_xml->header_2->text; ?>">
						<span>- <?php echo $system_xml->header_2->text; ?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo $site_url; ?>/converter-calculator" title="<?php echo $system_xml->calculator_1->text; ?>">
						<span>- <?php echo $system_xml->calculator_1->text; ?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo $site_url; ?>/coin-price-alert" title="<?php echo $system_xml->alert_11->text; ?>">
						<span>- <?php echo $system_xml->alert_11->text; ?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo $site_url; ?>/qr-code-generator" title="<?php echo $system_xml->qrcode_1->text; ?>">
						<span>- <?php echo $system_xml->qrcode_1->text; ?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo $site_url; ?>/exchange-sites" title="<?php echo $system_xml->exchange_1->text; ?>">
						<span>- <?php echo $system_xml->exchange_1->text; ?></span>
					</a>
				</li>
			</ul>
		</div>
</div>

<div class="cX-widget cX-widgettrendingposts">
	<div class="cX-sidebartitle"><h2><?php echo $system_xml->other_2->text; ?></h2></div>
		<div class="cX-widgetcontent">
			<ul>
				
				<?php
				$var_pages = $db->get_var("SELECT count(*) FROM pages");
				if($var_pages!=0) {
				$datas_pages = $db->get_results("SELECT id,p_name FROM pages order by id desc");
              		foreach( $datas_pages as $data_page ){
              		$page_d_name = json_decode($data_page->p_name,JSON_UNESCAPED_UNICODE);?>
				<li>
					<a href="<?php echo $site_url; ?>/page/<?php echo $data_page->id; ?>" title="<?php echo stripslashes(base64_decode($page_d_name[$system_language])); ?>">
						<span>- <?php echo stripslashes(base64_decode($page_d_name[$system_language])); ?></span>
					</a>
				</li>
				<?php }} ?>
				<li>
					<a href="<?php echo $site_url; ?>/page/faq" title="Faq">
						<span>- <?php echo $system_xml->footer_1->text;?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo $site_url; ?>/page/donate" title="Donate">
						<span>- <?php echo $system_xml->donate_1->text;?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo $site_url; ?>/page/contact" title="Contact">
						<span>- <?php echo $system_xml->contact_1->text;?></span>
					</a>
				</li>
			</ul>
		</div>
</div>