/*
    if(this.borderWidth)
    {
      _view.getContext().strokeStyle = _borderColor;
      _view.getContext().lineWidth = this.borderWidth;
      _view.getContext().stroke();
    }
*/

//TODO setup a way to set a border and width/height validation
const vMeshCircle = function(view)
{
  checkInstance(this, vMeshCircle);
  callParent(this, vMeshInterface);

  if(!(view instanceof CanvasInterface))
    throw new Error('vMeshCircle constructor\'s 1st argument (view) must be an instance of CanvasInterface!');

  let _view = view;

  let _entity = null;
  this.setEntity = function(input)
  {
    if(input instanceof EntityBase)
      _entity = input;
    else
      console.log('The object you passed as vMesh is not an instance of vMeshInterface!');
  };
  constant(this, 'setEntity');
  
  //defaults
  this.radius = 10;
  this.color = 'red';

	this.draw = function()
	{
    if(_entity != null)
    {
      _view.getContext().beginPath();

      //Add radius to the coords to make the vMesh origin the upper left point
      _view.getContext().arc(_view.trueX(_entity.x)+this.radius, _view.trueY(_entity.y)+this.radius, this.radius, 0, Math.PI*2, false);
      _view.getContext().fillStyle = this.color;
      _view.getContext().fill();

      _view.getContext().closePath(); 
    }
    else  
      console.log('Could not draw vMesh... (output error here)');
	};
  constant(this, 'draw');
};
setParent(vMeshCircle, vMeshInterface);
