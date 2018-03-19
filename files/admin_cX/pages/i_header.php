<header class="main-nav clearfix">	
		
		
		<div class="navbar-left pull-left">
			<div class="clearfix">
				<ul class="left-branding pull-left">
					<li><span class="left-toggle-switch visible-handheld"><i class="icon-menu7"></i></span></li>
					<li>
						<a href="<?=$site?>index.c"><div class="logo"></div></a>
					</li>
				</ul>				
			</div>
		</div>
		
		<div class="navbar-right pull-right">
			<div class="clearfix">				
				<ul class="pull-right top-right-icons">
					
					
					<li class="dropdown user-dropdown">
						<a href="javascript:;" class="btn-user dropdown-toggle hidden-xs" data-toggle="dropdown"><img src="assets/images/faces/face<?=$awdscx->picture?>.png" class="img-circle user" alt="<?=$awdscx->name_surname?>"/></a>
						<a href="javascript:;" class="dropdown-toggle visible-xs" data-toggle="dropdown"><i class="icon-more"></i></a>
						<div class="dropdown-menu">	
							<div class="text-center"><img src="assets/images/faces/face<?=$awdscx->picture?>.png" class="img-circle img-70" alt="<?=$awdscx->name_surname?>"/></div>
							<h5 class="text-center"><b>Hi! <?=$awdscx->name_surname?></b></h5>
							<ul class="more-apps">
								<li><a href="my_profile.c"><i class="icon-profile"></i> My Profile</a></li>
								<li><a href="session.c?q=lookscreen&redirect=<?=url_base64()?>"><i class="icon-lock5"></i> Lookscreen</a></li>
							</ul>
							<div class="text-center"><a href="session.c?q=lagout" class="btn btn-sm btn-info"><i class="icon-exit3 i-16 position-left"></i> Lagout</a></div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>