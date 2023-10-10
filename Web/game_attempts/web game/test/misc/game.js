/*
//https://www.intertech.com/Blog/encapsulation-in-javascript/

//https://medium.com/@andrea.chiarelli/is-javascript-a-true-oop-language-c87c5b48bdf0
//https://gist.github.com/rolandoam/2992190
//https://www.quora.com/Does-JavaScript-meant-to-be-OOP

https://gamedevelopment.tutsplus.com/articles/how-to-learn-the-phaser-html5-game-engine--gamedev-13643
https://gamedevelopment.tutsplus.com/tutorials/webgl-physics-and-collision-detection-using-babylonjs-and-oimojs--cms-24114
https://stackoverflow.com/questions/2440377/javascript-collision-detection
https://www.ibm.com/developerworks/library/wa-html5-game8/index.html
https://gamedevelopment.tutsplus.com/tutorials/webgl-physics-and-collision-detection-using-babylonjs-and-oimojs--cms-24114

http://blog.sklambert.com/html5-canvas-game-html5-audio-and-finishing-touches/
http://www.quakejs.com/
http://icecreamyou.github.io/Nemesis/

C# Unity game player rotate solution:
  https://www.youtube.com/user/Brackeys

    So, you cannot define setters and getters on public properties
    You can define writable and configurable though

    There is no need to do object.freeze(), object.preventExtensions(), object.seal()
    Even with all those you can still add new properties through prototypes.
    Object.prototype.newProp = 5 still works. Sure you can't overwrite them, but you can fix that with getters/setters
    Besides, I plan to never use prototypes

    For a method to be allowed to be overridden, you cannot use the constant() function (this prevents method overriding)

    NOTE: When passing objects to another object, that is a reference.
    Ex: 
    stuff = new A;
    if you pass stuff to B(stuff) and create a new B object, there is only 1 instance of "stuff".
    It does not get duplicated.
    If you were to delete stuff, all instances of B would no longer have access to it.
    
    ALWAYS 'use strict';

    Always make functions constants, so no one can overwrite them.
    function stuff(){}
    stuff = 'nope'; //works

    Make all data in your classes private variables with getter/setter if needed
    Make all methods in your classes NOT writable or configurable

    In functions that require arguments, check for arguments.length and LOG to console if less than
    In setters, LOG that something is wrong, do not crash

    Options:
        //Object.seal(this);
        //Object.preventExtensions(this);
		//Object.freeze(this);

	Normal Checks:
		number of arguments
    type of arguments
    make sure it must be called with new operator
		make sure the function cannot be deleted or overwritten
*/

/*
  Optimize:

  Render stuff off-screen
    myEntity.offscreenCanvas = document.createElement('canvas');
    myEntity.offscreenCanvas.width = myEntity.width;
    myEntity.offscreenCanvas.height = myEntity.height;
    myEntity.offscreenContext = myEntity.offscreenCanvas.getContext('2d');

    myEntity.render(myEntity.offscreenContext);

  Instead of clearing rect every time, only clear stuff that moves
  (clear space follow moving items such as squares)
*/


//most recent entity collions stuffs
/*
https://codeincomplete.com/posts/javascript-gauntlet-collision-detection/
http://buildnewgames.com/broad-phase-collision-detection/
https://gamedevelopment.tutsplus.com/tutorials/quick-tip-use-quadtrees-to-detect-likely-collisions-in-2d-space--gamedev-374
*/

//Start making the game
//TODO make a singleton for the view to make SURE there is not more than 1 instance
//try to count how many instances are active by incrementing a value in the Class from a new object. Class.counter++ inside of new OBject.
//test this by storing a copy of ClassA in ClassZ then making a new ClassZ and see if a new ClassA gets created. 

'use strict';

let view = new ViewScreen('game',300, 300);
let output = document.getElementById('output');

let player = new EntityRect(view);
player.x = 100;
player.y = 100;
player.backGroundColor = 'red';
player.width = 10;
player.height = 30;
let rateX = 480/60;
let rateY = 480/60;
//player.radius = 18;

let paddle = new EntityRect(view);
paddle.width = 40;
paddle.height = 15;
paddle.x = 70;
paddle.y = 20;
paddle.backGroundColor = 'lightblue';
let moveLeft = 0;
let moveRight = 0;
let moveUp = 0;
let moveDown = 0;
let moveX = 0;
let key = '\0';

window.addEventListener('keydown', function(e)
{
    key = e.keyCode;
    if(key==37) moveLeft=1;
    if(key==39) moveRight=1;
    // if(key==38) moveUp=1;
    // if(key==40) moveDown=1;
});
// Keyuo listener
window.addEventListener('keyup', function(e)
{
    key = e.keyCode;
    if(key==37) moveLeft=0;
    if(key==39) moveRight=0;
    // if(key==38) moveUp=0;
    // if(key==40) moveDown=0;
});

//Cycle 60fps
function doTheThing()
{
    view.ctx.clearRect(0, 0, view.width, view.height);
    
    //Wall collisions with Player
    if(player.x+player.width > view.width || player.x < 0)
      rateX = -rateX;
    if(player.y > view.height || player.y < player.height)
      rateY = -rateY;

    //Paddle collision with Player
    if(player.y-player.height <= paddle.y && player.x > paddle.x && player.x+player.width < paddle.x+paddle.width)
      rateY = -rateY;


    //player.x += rateX;
    player.y += rateY;
    player.render();


    //Make sure the paddle does not move off screen.
    moveX = (moveRight-moveLeft);
    if(paddle.x > 0)
      paddle.x += -moveLeft*0.5;
    if(paddle.x+paddle.width < view.width)
      paddle.x += moveRight*0.5;
  
    paddle.render();
    
    requestAnimationFrame(doTheThing);
}
requestAnimationFrame(doTheThing);

