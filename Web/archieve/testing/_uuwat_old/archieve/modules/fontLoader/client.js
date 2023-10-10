/*
    Concern: If someone tries to load a font from google 
    fonts that is already on their system and doesn't change
    width causing the font loader to found forever. 
        - make lader fonts all have same font base (arial)...
        get changes in width anyway...no one will be loading arial
*/

/*
    get font start width
    get font face

    set font family
        strip the random chars
        set fonts


    loop through fonts one at a time, if they change width, shrink the counter, once counter reaches zero, clear interval and execute scripts

    DESIGN OUTPUT FOR EVERYTHING!!!
*/

var fontStartW = [];
var fontFace = [];
$("#fontLdr > span").each(function()
{
    fontStartW.push($(this).width());
    fontFace.push($(this).text());
});

for(var i=0;i<fontFace.length;i++)
{
    var fontString = fontFace[i].split(':')[0];
    if(fontString.indexOf("+") > 0)
        fontString = ("\'" + fontString + "\'").replace(/\+/gi, " ");

    $("#font"+i).attr("style", "font-family:"+fontString);
}

setTimeout(function()
{
    WebFont.load({google: {families:['Roboto:300,300i,900']}});
}, 3000);
setTimeout(function()
{
    WebFont.load({google: {families:['Open+Sans']}});
}, 5000);

    /*if startwidth = currentWidth keep going...else output results, runjavascript, clearinterval*/
    /*...when maing this loops might go to fast...use setinterval first...then try loops*/

var numFonts = fontFace.length;
var counter = 0, cycles = 0;
var fontCheck = setInterval(function()
{
    if(counter > numFonts)
    {
        //output results
        //runJS
        $("#font0").css("background-color", "green");
        clearInterval(fontCheck);
    }
    else
    {
        if( fontStartW[counter] == $("#font"+counter).width() )
            cycles++;
        else
            counter++;
    }
    $("#myres").html(counter + "<br>" + fontStartW[counter] + "<br>" + $("#font"+counter).width());
}, 3000);


/*var fontArray = ["Roboto:300,300i,900", "Open+Sans"];
function initJs()
{
    var counter = 0;
    var startWidth = $("#fontA").width();

    WebFont.load({google: {families:startWidthrray}});
    var fontCheck = setInterval(function()
    {
        var fontB = $("#fontB").width();
        if(startWidth == fontB)
            counter++;
        else
        {
            $("#rezzy").html(startWidth + "<br>" + fontB + "<br>" + (counter));
            runJs();
            clearInterval(fontCheck);
        }
    }, 1);   
}
*/






/*solution...

make box offscreen 
                node.style.fontSize      = '300px';
            // Reset any font properties
            node.style.fontFamily    = 'sans-serif';
            node.style.fontVariant   = 'normal';
            node.style.fontStyle     = 'normal';
            node.style.fontWeight    = 'normal';
            node.style.letterSpacing = '0';

            

            var node = document.createElement("p");
            node.id = "customFontHandler";

function waitForWebfonts(fonts, callback) {
    var loadedFonts = 0;
    for(var i = 0, l = fonts.length; i < l; ++i) {
        (function(font) {
            var node = document.createElement('span');
            // Characters that vary significantly among different fonts
            node.innerHTML = 'giItT1WQy@!-/#';
            // Visible - so we can measure it - but not on the screen
            node.style.visibility      = 'hidden';
            node.style.position      = 'absolute';
            node.style.left          = '-10000px';
            node.style.top           = '-10000px';
            // Large font size makes even subtle changes obvious
            node.style.fontSize      = '300px';
            // Reset any font properties
            node.style.fontFamily    = 'sans-serif';
            node.style.fontVariant   = 'normal';
            node.style.fontStyle     = 'normal';
            node.style.fontWeight    = 'normal';
            node.style.letterSpacing = '0';
            document.body.appendChild(node);

            // Remember width with no applied web font
            var width = node.offsetWidth;

            node.style.fontFamily = font;

            var interval;
            function checkFont() {
                // Compare current width with original width
                if(node && node.offsetWidth != width) {
                    ++loadedFonts;
                    node.parentNode.removeChild(node);
                    node = null;
                }

                // If all fonts have been loaded
                if(loadedFonts >= fonts.length) {
                    if(interval) {
                        clearInterval(interval);
                    }
                    if(loadedFonts == fonts.length) {
                        callback();
                        return true;
                    }
                }
            };

            if(!checkFont()) {
                interval = setInterval(checkFont, 50);
            }
        })(fonts[i]);
    }
};
Use it like:

waitForWebfonts(['MyFont1', 'MyFont2'], function() {
    // Will be called as soon as ALL specified fonts are available
});

if the width changes at all during the loop...then call function...means font loaded(also count how many ms...or cycles)



*/
