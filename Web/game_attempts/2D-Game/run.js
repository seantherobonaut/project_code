'use strict';

//https://gamedevelopment.tutsplus.com/tutorials/how-to-create-a-custom-2d-physics-engine-the-basics-and-impulse-resolution--gamedev-6331

//TODO make physMeshCircle and physMeshRect, they will get max/min from the visual meshs or be different
//Then test collision by making the objects move and intersect

//IDEA instead of clear rect, just set the background of the mesh to nothing

let view = new Canvas('game', 300, 300);
let entities = new Array();

/* IDEA

  Really think about what methods you want the base entity to have or entities of different types

  Remember, one entity does not directly damage another through bullets.
  Entity1 launches bullet, bullent harms Entity2, but Entity1 does not directly harm Entity2, Bullet can carray info that Entity1 did it

  Adding new objects to an object should modify specific parts.
  You should not need to pass the whole memory address of the partent object to the inner objects
  They should have methods the parent object expects to call.

  Parent has render()
  render() expects obj(visual mesh) to already have access to a canvas, and all it needs are coordinates, not the whole memory addrss
    This passes origin coords to the mesh object, and it renders that shape at the coords

  

  How will objects literally interact on the map? What methods does an object need to call? 

  move() left/right/up/down? what about force
  think() have it decide to move itself
  getWeight()
  getSpeed()
  ... or maybe getProps is an array on the object that other objects inside modify "weight:10, color:red, etc..."

  Think of plugging in desk laps into your objet's wall sockets, everything is plug and play... "poly morphism"





 Everything is plug and play like a wall socket

give every entity base update() method
render() will still exist but be called by update()... actually no ... it will have an empty update method... child classes will have update

ex: when bullet is created, it is created with a veolcity...(EVERY ENTITY will have a speed for think() and a direction)
	it will travel in that direction unless changed it also carrys info on who created it
	when bullet intersects with an object, the bullet calls object.health - (value) or a method
	then, bullet calls a method on the object that created it saying, that it hit the target

movement contorller plug and play, for class plaer that extends base entity, controller will do event listeners for keys
movement for ai will change coords based on obstacles andhow many times that method is called


extending to make new entities and configure them 

*/


let bot = new EntityBase();
bot.x = 10;
bot.y = 290;
bot.vMesh = new vMeshCircle(view);
bot.vMesh.radius = 20;
bot.vMesh.color = 'blue';
entities.push(bot);

let bot2 = new EntityBase();
bot2.x = 190;
bot2.y = 50;
bot2.vMesh = new vMeshRect(view);
bot2.vMesh.width = 40;
bot2.vMesh.height = 25;
bot2.vMesh.color = 'green';
entities.push(bot2);



//Cycle 60fps
function doTheThing()
{
  view.getContext().clearRect(0, 0, view.getWidth(), view.getHeight());

  entities.forEach((element) =>
  {
    element.render();
  });

  requestAnimationFrame(doTheThing);
}
requestAnimationFrame(doTheThing);


//check if you can override object.define property methods get,set
/*

http://cs.slides.com/colt_steele/problem-solving-patterns#/1
https://practical-goodall-6a70b7.netlify.com/

What is bigO



can i restate the problem in my own words
what are teh inputs inot the problem
what are teh outputs that come from the solution
can teh outputs be determined from your inputs?
how should i label the important pieces

ex, a function that takes two numbers and returns the sum


///remember reach pieces does one specific things
	lets say you want to modify that function to make sure those 2 numbers are only the first and last num of an array

rather than modify that function, make a nother one that takes in an array and returns 2 numbers




break problem down, can you solve it on paper without a computer?


/////
if you can't solve a problem down, solve a simpler one
define what you want the result to be first


cs.slides.com/



/////

study ahead of time more of what the program requires
plan out every last thing



Rex:
encapsulation does not increase security, it helps you write better code
safeguards for checking data should mainly only be used for user input, not in your own code
  do not write hand rails on flat ground


Try not to design stuff again and again
  "Hashing and rehashing is . . . like jerking off.
It feels good but does nothing 😛"

*/
































//In Bable repl

// class Animal
// {
//     constructor(name, weight)
//     {
//       this.name = name;
//       this.weight = weight;
//     }
// }

// class Gorilla extends Animal
// {
//     constructor(_name, _weight)
//     {
//       super(_name, _weight);
      
//     }

//     eat()
//     {
//       console.log('stuff is eating!');
//     }
// }

// const testSubject = new Gorilla('Fred');

// testSubject.eat();
