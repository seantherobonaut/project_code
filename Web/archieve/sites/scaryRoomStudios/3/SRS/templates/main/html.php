<div id="mainTemplate.<?php echo $parentID;?>">
	<div id="dynBg"><div class="imgFull" style="display:none;">SRS/images/layout/background.jpg,1920,1200</div></div>
	<script type="text/javascript">
		dynBgInit();
	</script>
	<div id="wrapper">
		<div class="partition" id="header" style="padding-top:5px;padding-bottom:5px">
			<div id="navbar">
				<div id="navlogo" style="white-space:nowrap">
					<!-- This button is default invisible and only becomes visible when navlinks divs are displayed as block elements -->
					<img src="SRS/images/layout/logo.png" style="display:inline-block;height:60px;vertical-align:middle;cursor:pointer" onclick="window.open('/home','_self');" />
					<div id="mobileMenu" style="color:white;display:none;vertical-align:middle;cursor:pointer;font-size:18px;font-family:sans-serif;padding:0px 5px;margin-left:10px" onclick="$('#navlinks').slideToggle(300);">
						Menu
						<img src="SRS/images/layout/mobile_menu_icon.png" style="vertical-align:middle;border:1px solid white;border-radius:6px;display:inline-block;width:20px;padding:5px" />
					</div>
				</div>
				<div id="navlinks">
					<?php 
						//This prints out a list of menu links from the database
						if(!empty($menuLinks))
						{
							foreach($menuLinks as $value)
							{
								$marker = '';
								if($value['type'] == 'internal')
								{
									$getPage = $value['url'];
									$getPage = str_replace("/","",$getPage);
									if($getPage == $_GET['page'])
										$marker = 'class="activePage"';
								}

								echo '<a '.$marker.' href="'.$value['url'].'">'.$value['name'].'</a>';
							}
						}

						if(empty($_SESSION['user_data']))
							echo '<a href="/Login">Login</a>';
						else
							echo '<a href="/?requestproxy=logout">Logout</a>';
					?>
				</div>
			</div>
		</div>

		<div class="partition" style="margin-bottom:0px">
			<div id="main">
				<div id="content">
					<?php
						if(!empty($content))
							foreach ($content as $value)
								$value->exec();
						else
							echo htmlOut('Something went wrong loading the content.');

						echo '<hr style="margin-top:10px">';

						if(!empty($_SESSION['user_data']))
							if($_SESSION['user_data']['rank']=='admin')
								require Config::$path['app'].'Tools/buttons/addTemplate.php';
					?>							
				</div>
			</div>
		</div>

		<div class="partition" style="margin-top:0px;padding-top:7px;">
			<div id="footer">
				<div id="copyright">
					<!-- Some crazy white-space stuff to make sure the lines only break before "All rights reserved." -->
					<div style="white-space:nowrap;display:inline-block;font-size: 12px">
						Copyright &copy; 2014-<?php echo date('Y');?> Scary Room Studios. 
					</div>
					<div style="white-space:nowrap;display:inline-block;font-size:12px">
						All rights reserved.
					</div>
				</div>
				<div id="socmedia">
					<img src="SRS/images/socmediaicons/facebook_thumbnail.png" onclick="window.open('http://www.facebook.com/ScaryRoomStudios','_blank');" />
					<img src="SRS/images/socmediaicons/soundbetter_thumbnail.png" onclick="window.open('https://soundbetter.com/profiles/18055-brandon-dominguez-productions','_blank');" />
					<img src="SRS/images/socmediaicons/vimeo_thumbnail.png" onclick="window.open('http://www.vimeo.com/Brandominguez','_blank');" />
					<img src="SRS/images/socmediaicons/soundcloud_thumbnail.png" onclick="window.open('http://www.soundcloud.com/brandominguez','_blank');" />
					<img src="SRS/images/socmediaicons/linkedin_thumbnail.png" onclick="window.open('http://www.linkedin.com/in/Brandominguez','_blank');" />
				</div>
			</div>
		</div>
		
		<script type="text/javascript" src="SRS/js/base.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){adaptInit();});
		</script>
		<?php //require 'SRS/client_diag.php';?>
	</div>
</div>
