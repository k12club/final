	<aside class="sidebar">
		<div class="left-aside-container">
			<div class="user-profile-container">
				<div class="user-profile clearfix">
					<div class="admin-user-thumb">
						<img src="assets/images/faces/face<?=$awdscx->picture?>.png" alt="<?=$awdscx->name_surname?>" class="img-circle">
					</div>
					<div class="admin-user-info">
						<ul class="user-info">
							<li><a href="my_profile.c" class="text-semibold text-size-large"><?=$awdscx->name_surname?></a></li>
							<li><a href="my_profile.c"><small>Administrator</small></a></li>
						</ul>
						<div class="logout-icon"><a href="session.c?q=lagout"><i class="icon-exit2"></i></a></div>
					</div>
					
				</div>				
			</div>			
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active" id="tab-menu"><a href="#menu" aria-controls="menu" role="tab" data-toggle="tab"><i class="icon-home2"></i></a></li>
				<li role="presentation" class="" id="tab-email"><a href="#email" aria-controls="email" role="tab" data-toggle="tab"><i class="icon-clipboard6"></i></a></li>
			</ul>
		  
			<div class="tab-content">
			
			
				<div role="tabpanel" class="tab-pane active fadeIn" id="menu">
					<ul class="sidebar-accordion">
					
						<li class="list-title">Menus</li>

						<li><a href="index.c"><i class="icon-display4"></i><span class="list-label"> Dashboards</span></a></li>
						
						<li>
							<a href="javascript:;"><i class="icon-reddit"></i> <span>Coins</span></a>
							<ul>
								<li><a href="coin_l.c">Coin List</a></li>	
								<li><a href="coin_a_l.c">Coin Affiliate Link</a></li>					
							</ul>
						</li>
						
						<li><a href="coin_alert.c"><i class="icon-bell3"></i> <span>Coin Alert</span></a></li>
						
						<li>
							<a href="javascript:;"><i class="icon-loop"></i> <span>Exchange Sites</span></a>
							<ul>
								<li><a href="exchange_l.c">Exchange / List</a></li>	
								<li><a href="exchange_a.c">Exchange / Add</a></li>						
							</ul>
						</li>
						
						<li>
							<a href="javascript:;"><i class="icon-stack"></i> <span>Pages</span></a>
							<ul>
								<li><a href="page_l.c">Pages / List</a></li>	
								<li><a href="page_a.c">Page / Add</a></li>	
								<li><a href="page_faq.c">Faq Page</a></li>	
								<li><a href="page_donate.c">Donate Page</a></li>					
							</ul>
						</li>
						
						<li><a href="languages.c"><i class="icon-superscript2"></i> <span>Languages</span></a></li>
						
						<li><a href="currencies.c"><i class="icon-coin-dollar"></i> <span>Currencies</span></a></li>
						
						<li>
							<a href="javascript:;"><i class="icon-cog"></i> <span>Settings</span></a>
							<ul>
								<li><a href="setting_site.c">Site Settings</a></li>	
								<li><a href="setting_seo.c">SEO Settings</a></li>	
								<li><a href="setting_smtp.c">SMTP Settings</a></li>						
							</ul>
						</li>


						<li class="list-title">Remaining Time</li>

						<div class="panel-body">
							<div class="progress m-b-10">
								<div id="sayac_yuzde" class="progress-bar progress-bar-striped active" style="width: 10%">10%</div>
							</div>
							<span id="sayac" class="label bg-purple" style="font-size: 11px;letter-spacing: 2.1px;">Loading</span>
						</div>
						
						
					</ul>
				</div>
				
				
				<div role="tabpanel" class="tab-pane email fade" id="email">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							
							<div class="email-buttons">
								<div class="row m-t-5">
									<div class="col-xs-6 no-padding-left">
										<a href="languages.c" class="btn bg-primary btn-block btn-float btn-float-lg" type="button"><i class="icon-superscript2"></i> <span>Languages</span></a>
										<a href="page_l.c" class="btn bg-success btn-block btn-float btn-float-lg" type="button"><i class="icon-stack"></i> <span>Pages</span></a>
									</div>
									
									<div class="col-xs-6 no-padding-right">
										<a href="currencies.c" class="btn bg-info btn-block btn-float btn-float-lg" type="button"><i class="icon-coin-dollar"></i> <span>Currencies</span></a>
										<a href="setting_site.c" class="btn bg-danger btn-block btn-float btn-float-lg" type="button"><i class="icon-gear"></i> <span>Settings</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>					
				
				
			

			</div>		
		</div>
	</aside>