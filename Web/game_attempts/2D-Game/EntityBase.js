const Point = function()
{
  checkInstance(this, Point);

	let _x = 0;
	Object.defineProperty(this, 'x',
	{
		get:function(){return _x;},
		set:function(value)
    {
      if(Valid.isFloat(value))
        _x = value;
      else
        console.log('Value for x was not an integer!');
    },
		configurable:false
  });
  
	let _y = 0;
	Object.defineProperty(this, 'y',
	{
		get:function(){return _y;},
		set:function(value)
    {
      if(Valid.isFloat(value))
        _y = value;
      else 
        console.log('Value for y was not an integer!');
    },
		configurable:false
	});	
};

//I might turn this into an interface
const EntityBase = function()
{ 
  checkInstance(this, EntityBase);
    
  let _origin = new Point();
  /* TODO
    Make a system of points to replace x and y, without chaing the outside interface.
    Each entity will still have x= y=, but inside there will be the origin (a Point() object with x/y)
      and on the physMesh it will have 2 Point()s max/min upperLeft and lowerRight
  */

  //Getters and Setters for _origin x/y 
	Object.defineProperty(this, 'x',
	{
		get:function(){return _origin.x;},
		set:function(value){_origin.x = value;},
		configurable:false
	});
	Object.defineProperty(this, 'y',
	{
		get:function(){return _origin.y;},
		set:function(value){_origin.y = value;},
		configurable:false
	});	

  this.render = function()
  {
    console.log('This entity does not have any visual rendering yet!');
  };
  this.update = function()
  {
    console.log('This entity does not have an update function!');
  };
};
