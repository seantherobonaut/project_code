<div id="readout" style="border:1px solid gray;background: rgba(0, 0, 0, .2);padding:5px;line-height: 20px;width:180px;font-size: 12px;color:black"></div> 
<script type="text/javascript">
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
			"<br />navlinks height: " + $("#navlinks").height()
		);
	}, 300);
</script>
