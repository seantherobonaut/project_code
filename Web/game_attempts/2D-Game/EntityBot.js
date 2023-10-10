const EntityBot = function()
{
    checkInstance(this, EntityBot);
    callParent(this, EntityBase);


    //Problem: We can no longer access _origin... freaking no protected members

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

//   if(_vMesh != null)
//   _vMesh.draw();
// else
//   console.log('A visual mesh has not been setup for this object yet!');





};
setParent(EntityBot, EntityBase);