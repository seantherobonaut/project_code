const myfunc = (param1, param2, param3, param4)=>
{
    console.log(param1);
    console.log(param2);
    console.log(param3);
    console.log(param4);
};

let mynums = [1,2,3,4];

myfunc(...mynums);

console.log("Did it work?");
