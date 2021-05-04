
/*now...have javascript create a new element...jquery can keep overwriting it*/
var debugOutput = [];

function debugInit()
{
	$("body").append("<div id='debug'></div>");
}

function printout()
{
	//$("#debug").

	//This will call a funciton that returns a string with a ton of breaklines and it will .html overwrite the contents each time
}

function debug(input)
{
	debugOutput.push(input);
	printout();
}
