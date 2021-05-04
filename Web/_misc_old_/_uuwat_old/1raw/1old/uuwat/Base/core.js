function execResize(callback)
{
    if( !(callback === undefined) )
    {
        callback();
        $(window).resize(function()
        {
            callback(); 
        });
    }
}

function wrapperSetHeight(currentObj)
{
    execResize(function()
    {
        currentObj.css("min-height", $(window).height() - 1); //Removes unneeded scrollbar on some browsers 
    });
}

function setParentWidth(currentObj)
{
	currentObj.parent().width(currentObj.outerWidth()+1); //+1 some browsers wrap it too small
}

function vertAlign(currentObj)
{
	currentObj.css("margin-top", (currentObj.parent().height()/2 - currentObj.outerHeight()/2));
}

function dynVertAlign(currentObj)
{
    execResize(function()
    {
        currentObj.css("margin-top", (currentObj.parent().height()/2 - currentObj.outerHeight()/2));
    });
}

function fullCenterPosition(currentObj)
{
    execResize(function()
    {
        var parentWidth = currentObj.parent().width();
        var width = currentObj.outerWidth();
        var widthBuffer = parentWidth/2 - width/2;
        currentObj.css("margin-left", widthBuffer);

        var parentHeight = currentObj.parent().height();
        var height = currentObj.outerHeight();
        var heightBuffer = parentHeight/2 - height/2;
        currentObj.css("margin-top", heightBuffer);
    });
}