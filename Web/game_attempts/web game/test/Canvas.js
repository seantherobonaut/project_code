0/* TODO
  TODO secure this and use absolute positioning.
  Check to see if the parent has relative positioning.
  Make a getter/setter for canvas border
*/
const Canvas = function(target = null, width = null, height = null)
{
  checkInstance(this, Canvas);
  callParent(this, CanvasInterface);
  
  //Static member to keep track of instances of Canvas
  Canvas.instances++;

  //Check constructor arguments
  if(typeof target != 'string')
    throw new Error('Canvas constructor\'s 1st argument (target element) must be a string!');
  if(!Valid.isInteger(width, true))
    throw new Error('Canvas constructor\'s 2nd argument (width) must be a positive integer!');
  if(!Valid.isInteger(height, true))
    throw new Error('Canvas constructor\'s 3rd argument (height) must be a positive integer!'); 

  //Private members 
  let _target = target;
  let _width = width;
  let _height = height;
  let _ctx = null;

  //Getters & Setters
  this.getWidth = function(){return _width;};
  constant(this, 'getWidth');
  this.getHeight = function(){return _height;};
  constant(this, 'getHeight');
  this.getContext = function(){return _ctx;};
  constant(this, 'getContext');

  //Return the canvas converted values for x and y
  this.trueX = function(value)
  {
    let result = 0;

    if(Valid.isFloat(value))
      result = value;
    else 
      console.log('value passed to Canvas.trueX() was not of type float!');

    return result;
  };
  constant(this, 'trueX');
  this.trueY = function(value)
  {
    let result = 0;

    if(Valid.isFloat(value))
      result = _height-value;
    else 
      console.log('value passed to Canvas.trueY() was not of type float!');

    return result;
  };
  constant(this, 'trueY');

	let element = document.getElementById(_target);
	if(element)
	{
	  let _canvas = document.createElement('canvas');
	  _canvas.id = _target+'Canvas'+Canvas.instances; //TODO make this unique because there will be multiple instances
    _canvas.className = 'gameCanvas';
	  _canvas.width = _width;
	  _canvas.height = _height;

	  element.appendChild(_canvas);
	  _ctx = _canvas.getContext('2d'); 
	}
  else
    console.log('Could not create canvas. Element with id of "'+_target+'" could not be found!');
};
Canvas.instances = 0;
setParent(Canvas, CanvasInterface);
