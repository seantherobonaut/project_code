//This should be a part of the package loader. It will also load postDom elements in the header but only execute them after dom is loaded.
function runJs()
{
	$("#wrapper").each(function(){wrapperSetHeight($(this));});
	$(".setParentWidth").each(function(){setParentWidth($(this));});
	$(".vertAlign").each(function(){vertAlign($(this));});
	$(".dynVertAlign").each(function(){dynVertAlign($(this));});
	$(".centerPos").each(function(){fullCenterPosition($(this));});
	//$("#navMenu").each(function(){navMenu($(this));});		
}
