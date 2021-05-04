function navMenu(currentObj)
{
	var extra = currentObj.parent().css("margin-right");
	extra = extra.replace("px", "");
	extra = parseInt(extra);
	var widthBuffer = 20;
	var logo = currentObj.parent().parent().children("div:nth-child(1)").outerWidth();
	var nav = currentObj.parent().outerWidth();
	var breakPoint = logo + nav + extra + widthBuffer;
	
    execResize(function()
    {
	   navSwitch(currentObj, breakPoint);
    });

	function navSwitch(inheritObj, bufferLimit)
	{
		var condition = inheritObj.parent().parent().width() - bufferLimit;
		if(condition < 0)
		{
			inheritObj.parent().css("display", "none");
			$("#mobileButton").css("display", "block");
		}
		else
		{
			inheritObj.parent().css("display", "block");
			$("#mobileButton").css("display", "none");
		}
		vertAlign(inheritObj.parent());
	}
}
