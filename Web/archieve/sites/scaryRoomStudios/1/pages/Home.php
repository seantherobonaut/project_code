<!-- News page for places you visit and produce or events going on or places youw will play_thumbnail, http://snoopdogg.com/ -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<style type="text/css">
	#content
	{
		margin:0px;
	}

	#content h2
	{
		font-family: "Open Sans";
		font-weight: normal;
		color:white;
		width:90%;
		margin:25px auto 5px auto;
		padding:15px 0px;
		
		border:1px solid #ccc;
		border-width:1px 0px;
	}

	#banner
	{
		width:100%;
		display: block;
		margin:auto;
		border-radius: 7px;
	}
</style>

	<img id="banner" src="images/content/studio.jpg">
	<h3 style="background-color: #504F4E;margin:0px;padding:5px;width:100%;border:none;font-weight: normal;color:white">
		Original debut album <span style="white-space: nowrap;">"Not a Mixtape" by UsVsU!</span><br>
		<span style="border-top:1px solid white;display: inline-block;width:90%;margin-left:10px;margin-top:9px;padding-top:5px;font-size: 15px;color:#aa9">
			An independent music conglomerate based out of cameron park, CA. UsVsU strives to captivate and inspire listeners through high quality production mixed with impactful lyricism. Their goal is to incite a positive movement within the culture with the power of music.
		</span>
	</h3>

	<style type="text/css">
		.mixtapeA, .mixtapeB
		{
			display: none;
			margin:auto;
			border:1px solid white;
			border-width: 0px 0px 1px 0px;
			width:100%;
		}
	</style>

	<div class="resizeIframe" style="marin:0px;padding:0px">
		
		<iframe class="mixtapeB" name="full"></iframe>
		<script type="text/javascript">
			var ifLoadWidth = $(".resizeIframe").width();
			if(ifLoadWidth < 715)
				$(".resizeIframe").html('<iframe class="mixtapeA" style="max-width:600px;" name="full" src="//widget.cdbaby.com/e00c00c6-6f65-42a0-953d-c3794e1a9d27/square/dark/opaque"></iframe>');
			else
				$(".resizeIframe").html('<iframe class="mixtapeB" name="full" src="//widget.cdbaby.com/e00c00c6-6f65-42a0-953d-c3794e1a9d27/full/dark/opaque"></iframe>');



			$(document).ready(function(){dynIframe();});
			$(window).resize(function(){dynIframe();});


			function dynIframe()
			{
				var ifWidth = $(".resizeIframe").width();
				if(ifWidth < 715)
				{
					$(".mixtapeA").css("display", "block");
					$(".mixtapeB").css("display", "none");

					$(".mixtapeA").height($(".mixtapeA").width() * 1.1);

					var something = $(".mixtapeB").css("display");
					if(something == "none")
					{
						location.href = "http://scaryroomstudios.com/";
					}
				}
				else
				{
					$(".mixtapeA").css("display", "none");
					$(".mixtapeB").css("display", "block");
					$(".mixtapeB").height(500);

					var something = $(".mixtapeA").css("display");
					if(something == "none")
					{
						location.href = "http://scaryroomstudios.com/";
					}
				}
			}
		</script>
	</div>

 	<h2 style="border:none">Here is an epic interview with our wonderful friend Hector Jimenez!</h2>
	<iframe id="hectorVideo" src="https://www.youtube.com/embed/yKdUJDV70p4?modestbranding=1&rel=0&autohide=0&showinfo=0" frameborder="0" allowfullscreen style="display:block;margin:auto;border:1px solid #ccc;border-width:1px 0px;padding:10px 0px;"></iframe>
<!--	
	<h2 style="border:none">Checkout our awesome performance on <b><i>Good Day Sacramento!</i></b></h2>
	<iframe id="brandonVideo" src="https://www.youtube.com/embed/M9Ld2oM1SBw?modestbranding=1&rel=0&autohide=0&showinfo=0" frameborder="0" allowfullscreen style="display:block;margin:auto;border:1px solid #ccc;border-width:1px 0px;padding:10px 0px;"></iframe>
	 
	<iframe scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/270964453&amp;auto_play=false&amp;buying=false&amp;liking=true&amp;download=false&amp;sharing=false&amp;show_artwork=false&amp;show_comments=false&amp;show_playcount=false&amp;show_user=false&amp;hide_related=true&amp;visual=false&amp;" style="height:160px;width:90%;display:block;margin:auto;margin-top:15px"></iframe>
-->
	<h2 style="margin-top:15px">Welcome to Scary Room Studios!</h2>

<style type="text/css">
	#content
	{
		padding-bottom:20px;
	}

	#content br
	{
		font-size: 16px;
	}

	#brandon
	{
		float:left;
		width:100%;
		max-width:250px;
		margin:5px;
		margin-right:15px;
	}

	#content div
	{
		font-size: 16px;
		text-indent: 30px;
		line-height: 30px;
	}
</style>
<div style="padding:15px 35px 15px 10px">
	<img id="brandon" style="margin-bottom:20px" src="images/content/bdawg.png" />
	<div>
		Brandon Dominguez is a very passionate and hardworking Artist and Engineer fresh on the scene. 
		He can record, mix, and master audio for all music genres. Additionally, Brandon is fluent with 
		DAWs such as Logic Pro, Protools, and Cubase. If you have a studio, he can come to you or utilize 
		his knowledge and equipment at Scary Room Studios if need be. For now, SRS is a studio 
		with high quality sound located in Cameron Park, California. Overall, Scary Room Studios is a 
		great place for new artists and seasoned veterans alike to record to their heart's content.
	</div>
</div>

<script type="text/javascript">
	var videoWidth = $("h2").width();
	var videoHeight = videoWidth * .5625;
	$("#hectorVideo").width(videoWidth);
	$("#hectorVideo").height(videoHeight);
	$("#brandonVideo").width(videoWidth);
	$("#brandonVideo").height(videoHeight);
</script>