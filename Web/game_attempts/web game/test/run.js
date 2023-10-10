'use strict';

//https://gamedevelopment.tutsplus.com/tutorials/how-to-create-a-custom-2d-physics-engine-the-basics-and-impulse-resolution--gamedev-6331

//TODO make physMeshCircle and physMeshRect, they will get max/min from the visual meshs or be different
//Then test collision by making the objects move and intersect

//IDEA instead of clear rect, just set the background of the mesh to nothing

let view = new Canvas('game', 300, 300);

let bot = new EntityBase();
bot.x = 10;
bot.y = 10;

bot.vMesh = new vMeshCircle(view);
bot.vMesh.radius = 10;

//Cycle 60fps
function doTheThing()
{
  view.getContext().clearRect(0, 0, view.getWidth(), view.getHeight());
  bot.x++;
  bot.y++;
  
  bot.render();
  requestAnimationFrame(doTheThing);
}
requestAnimationFrame(doTheThing);


//check if you can override object.define property methods get,set

































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
