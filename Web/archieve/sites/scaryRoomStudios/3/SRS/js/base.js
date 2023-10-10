function navlinksHover()
{
	//TODO make this to use .activePage for link highlighting ...you accidentally erased some work but figure it out again
	$("#navlinks a").each(function()
	{
		var targetObj = $(this);
		//This will fancy up the link that has the name of the page
		if(targetObj.attr("class") == "activePage")
		{
			targetObj.css("text-shadow", "0px 0px 15px #CCFF00, 0px 0px 15px #CCFF00, 0px 0px 15px #CCFF00");
			targetObj.css("border-top-color", "#CCFF00");
			targetObj.css("border-top-width", "4px");
			targetObj.css("padding-top", "8px");			
		}
		else
		{
			//This will fancy up all other links upon hovering
			targetObj.hover(
				function() //change it.
				{
					targetObj.css("text-shadow", "0px 0px 15px #CCFF00,0px 0px 15px #CCFF00, 0px 0px 15px #CCFF00");
					targetObj.css("border-top-color", "#CCFF00");
					targetObj.css("border-top-width", "4px");
					targetObj.css("padding-top", "8px");
				},
				function() //change it back.
				{
					targetObj.css("text-shadow", "none");
					targetObj.css("border-top-color", "white");
					targetObj.css("border-top-width", "1px");
					targetObj.css("padding-top", "11px");
				}
			);
		}
	});
}

function adaptInit()
{
	//Navbar adapt
	clearSpacing("#navlogo");
	$("#mobileMenu").css("font-size", "18px");
	$("#navlogo").width(getInnerWidth("#navlogo"));

	clearSpacing("#navlinks");
	navlinksWidthCopy = getInnerWidth("#navlinks"); 
	$("#navlinks").width(navlinksWidthCopy);
	leftrightAdapt("#navlogo", "#navlinks", 30, function()
	{
		//The +10 is in case a scroll bar appears
		if( (($("#navlinks").css("float") == "none") && (navlinksWidthCopy+10 > $("#navbar").width())) )
		{			
			$("#mobileMenu").css("display", "inline-block");
			$("#navlogo").width(getInnerWidth("#navlogo") + $("#mobileMenu").outerWidth() + 10);
			$("#navlinks").css("display", "none");

			$("#navlinks a").css("display", "block");
			$("#navlinks a").css("text-align", "center");
			$("#navlinks").width( "65%" );
		}
		else
		{
			$("#mobileMenu").css("display", "none");
			$("#navlogo").width(getInnerWidth("#navlogo"));
			$("#navlinks").css("display", "block");

			$("#navlinks a").css("display", "inline-block");
			$("#navlinks a").css("text-align", "left");
			$("#navlinks").width(navlinksWidthCopy);
		}
	});

	verticalAlign("#navlinks", function()
	{
		//This allows it to look more vertically centered
		if( $("#navlinks").css("float") != "none" )
			push = push + 10;
		else
			push = 20;
	});

	//Code that executes when user hovers over links.
	navlinksHover();

	//Footer adapt
	copyrightWidthCopy = getInnerWidth("#copyright");
	$("#copyright").width(copyrightWidthCopy);
	clearSpacing("#socmedia");
	$("#socmedia").width(getInnerWidth("#socmedia"));
	leftrightAdapt("#copyright", "#socmedia", 60, function()
	{
		if((($("#copyright").css("float") == "none") && (copyrightWidthCopy > $("#footer").width())))
		{			
			$("#copyright").css("font-size", "10px");
			$("#copyright").width( $("#footer").width()-60);
		}
		else
		{
			$("#copyright").css("font-size", "12px");
			$("#copyright").width(copyrightWidthCopy);
		}
	});
}
