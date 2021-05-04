//This function does not care if Viewscreen is passed correctly, it just checks for existing methods
const vMeshInterface = function()
{
  checkInstance(this, vMeshInterface);

  this.setEntity = function(){console.log('vMesh object is missing the setEntity() method!');};
  this.draw = function(){console.log('vMesh object is missing the draw() method!');};
};

const physMeshInterface = function()
{
  checkInstance(this, physMeshInterface);
  //TODO setup methods
};

const CanvasInterface = function()
{
  checkInstance(this, CanvasInterface);

  this.getWidth = function()
  {
    console.log('getWidth() has not been set!');
    return -1;
  };
  this.getHeigt = function()
  {
    console.log('getWidth() has not been set!');
    return -1;
  };
  this.getContext = function()
  {
    console.log('getContext() has not been set!');
    return null;
  };
  this.trueX = function()
  {
    console.log('trueX() has not been set!');
    return 0;
  };
  this.trueY = function()
  {
    console.log('trueY() has not been set!');
    return 0;
  };
};

const EntityInterface = function()
{
  checkInstance(this, EntityInterface);

  //public new Point? 
};
