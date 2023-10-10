/*
	Description of how this works...
*/

//!!!Maybe these pushes won't work with more string items such as tiled
function dynBgGetData(currentObj)
{
	var dataArray = currentObj.text(); //Path, Width, Height, whRatio, hwRatio, Type
	dataArray = dataArray.split(",");
	dataArray.push((dataArray[1]/dataArray[2])); //whRatio
	dataArray.push((dataArray[2]/dataArray[1])); //hwRatio
	dataArray.push(currentObj.attr("class")); //Type
	return dataArray;
}

//(+70) The height of navbars and other gui can compromise fixed positioning
function dynBgOffset(currentObj)
{
	currentObj.height($(window).height() + 70); 
}

function imgFullLoop(currentObj, dataArray)
{
	var ratioA = dataArray[3], ratioB = dataArray[4];

	//Set image dimensions relative to dynbg
	var imgObj = currentObj.children("img");
	imgObj.height(currentObj.height());
	imgObj.width((ratioA * currentObj.height()));

	var objWidth = currentObj.width();
	var imgWidth = imgObj.width();
	var adaptiveMargin = (currentObj.width() - imgObj.width())/2;	

	//If image is smaller than screen width, do stuff
	if(objWidth > imgWidth) 
	{
		imgObj.css("margin-left", 0);
		imgObj.height((ratioB * currentObj.width()));
		imgObj.width(objWidth);
	}
	else
		imgObj.css("margin-left", adaptiveMargin);
}

function dynBgInit()
{
	$("#dynBg").each(function()
	{
		var dynBgObj = $(this);
		execResize(function(){dynBgOffset(dynBgObj);});
	});

	$("#dynBg > .imgFull").each(function()
	{
		var dynBgObj = $(this).parent()
		var dynBgData = dynBgGetData($(this));

		dynBgObj.append('<img src="'+dynBgData[0]+'" />');

		execResize(function(){imgFullLoop(dynBgObj, dynBgData);});
	});	
}
