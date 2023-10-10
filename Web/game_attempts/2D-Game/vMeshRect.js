const vMeshRect = function(view)
{
  checkInstance(this, vMeshRect);
  callParent(this, vMeshInterface);

  if(!(view instanceof CanvasInterface))
    throw new Error('vMeshRect constructor\'s 1st argument (view) must be an instance of CanvasInterface!');

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
  this.width = 20;
  this.height = 10;
  this.color = 'green';

	this.draw = function()
	{
    if(_entity != null)
    {
      _view.getContext().beginPath();
      
      _view.getContext().rect(_view.trueX(_entity.x), _view.trueY(_entity.y), this.width, this.height); 
      _view.getContext().fillStyle = this.color;
      _view.getContext().fill();

      _view.getContext().closePath(); 
    }
    else  
      console.log('Could not draw vMesh... (output error here)');
	};
  constant(this, 'draw');
};
setParent(vMeshRect, vMeshInterface);
