let game = document.getElementById("game");

let player = document.createElement("div");
player.style.width = "30px";
player.style.height = "30px";
player.style.border = "1px solid blue";
player.style.backgroundColor = "#888";

game.appendChild(player);

//Game Loop
let x = 0;
let y = 0;
setInterval(function()
{
  if(x < 100)
  {
    x++;
    player.style.marginLeft = x+"px";
  }

}, 1);