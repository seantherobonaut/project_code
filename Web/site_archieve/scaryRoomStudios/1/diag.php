<style type="text/css">
	#readout
	{
		border:1px solid gray;
		background: rgba(0, 0, 0, .2);
		padding:5px;
		line-height: 20px;
		width:180px;
		font-size: 12px;
		color:white;
	}
</style>
<div id="readout"></div> 
<script type="text/javascript">
	function readout()
	{	
		setTimeout(function()
		{
			$("#readout").html(
				"html width: " + $("html").innerWidth() +
				"<br />window Width: " + $(window).width() + 
				"<br />document Width: " + $(document).width() + 
				"<br />=================" +
				"<br />navbar width: " + $("#navbar").width() +
				"<br />navlogo width: " + $("#navlogo").width() +
				"<br />navlinks width: " + $("#navlinks").width() +
				"<br />navbar height: " + $("#navbar").height() +
				"<br />navlinks height: " + $("#navlinks").height() +
				"<br />push: " + push +
				"<br />navlinks display: " + $("#navlinks div").css("display")
			);
		}, 300);
	}
	readout();
</script>