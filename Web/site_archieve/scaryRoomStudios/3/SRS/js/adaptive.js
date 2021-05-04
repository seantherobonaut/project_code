//This ensures there will always be specified margin surrounding the content no matter what size the screen is.
function adaptiveContainer(innerElement, outerElement, maxWidth, margins)
{
	$(innerElement).css("margin-left", "auto");
	$(innerElement).css("margin-right", "auto");
	if(maxWidth+margins*2 > $(outerElement).width())
		$(innerElement).width( $(outerElement).width()-margins*2);
	else
		$(innerElement).width(maxWidth);
}

//Clears spaces between child element...later project...what if children have different font sizes?
function clearSpacing(inputElement)
{
	var initialFontSize = $(inputElement).children().css("font-size");
	$(inputElement).css("font-size", "0px");
	$(inputElement).children().css("font-size", initialFontSize);
}

//Gets accurate width of things inside elements
function getInnerWidth(inputElement)
{
	//Examines status of white-space and stores it, then changes it
	var storedWhiteSpace = $(inputElement).css("white-space");
	if(storedWhiteSpace != "nowrap")	
		$(inputElement).css("white-space", "nowrap");

	//Examines status of display and stores it, then changes it
	var storedDisplay = $(inputElement).css("display");
	if(storedDisplay != "inline-block")	
		$(inputElement).css("display", "inline-block");

	var measureWdith = $(inputElement).width();

	//Restores initial values
	$(inputElement).css("white-space", storedWhiteSpace);
	$(inputElement).css("display", storedDisplay);

	return measureWdith+1; //+1 pixel is needed to ensure inner elements display properly
}

//Center the block elements and float them to either right or left unless they are closer than a given distance
function leftrightAdapt(leftEle, rightEle, LRdistanceBuffer, postFunc)
{
	$(leftEle).css("margin", "auto");
	$(rightEle).css("margin", "auto");
	if(($(leftEle).width() + $(rightEle).width() + LRdistanceBuffer + 4) < $(leftEle).parent().width())  //The 4 is the width of all borders as 1px each...try outerWidth()?
	{
		$(leftEle).css("float", "left");
		$(rightEle).css("float", "right");
	}
	else
	{
		$(leftEle).css("float", "none");
		$(rightEle).css("float", "none");
	}

	//Check if there is a <br> with clear:both, if there isn't create one
	if($(rightEle).next().attr('class') != "clearbreak")
		$(rightEle).after("<br class='clearbreak' style='clear:both' />");

	//Hide the breakline if elements are not floating.
	if($(rightEle).css("float") == "right")
		$(rightEle).next(".clearbreak").css( "display", "inline");
	else
		$(rightEle).next(".clearbreak").css( "display", "none");
	
	//Optional parameter execution. Will only fire if there is a parameter
	if(!(postFunc === undefined))
		postFunc();
}

//Vertically align elements
function verticalAlign(inputElement, postFunc)
{
	var parentEleHeight = $(inputElement).parent().height();
	var eleHeight = $(inputElement).outerHeight();
	push = parentEleHeight/2 - eleHeight/2;

	if(!(postFunc === undefined))
		postFunc();

	$(inputElement).css("margin-top", push);
}
