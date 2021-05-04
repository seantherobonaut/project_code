const EntityBase = function()
{ 
  checkInstance(this, EntityBase);
    
  /* TODO
    Make a system of points to replace x and y, without chaing the outside interface.
    Each entity will still have x= y=, but inside there will be the origin (a Point() object with x/y)
      and on the physMesh it will have 2 Point()s max/min upperLeft and lowerRight
  */

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

  //TODO maybe _vMesh and _physMesh do not need to be public... but that might create problems for something inheriting EntityBase...
  let _vMesh = null;
	Object.defineProperty(this, 'vMesh',
	{
		get:function(){return _vMesh;},
		set:function(value)
    {
      if(value instanceof vMeshInterface)
      {
        value.setEntity(this);
        _vMesh = value;
      }
      else
        console.log('The object you passed as vMesh is not an instance of vMeshInterface!');
    },
		configurable:false
	});	

  let _physMesh = null;
	Object.defineProperty(this, 'physMesh',
	{
		get:function(){return _physMesh;},
		set:function(value)
    {
      if(!(value instanceof physMeshInterface))
        console.log('The object you passed as physMesh is not an instance of physMeshInterface!');
      else
        _physMesh = value;
    },
		configurable:false
	});	

  this.render = function()
  {
    if(_vMesh != null)
      _vMesh.draw();
    else
      console.log('A visual mesh has not been setup for this object yet!');
  };
  constant(this, 'render');
};
