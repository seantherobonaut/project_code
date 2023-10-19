// fetch('https://jsonplaceholder.typicode.com/todos').then(response => response.json()).then((json) =>
// {
//     const element = document.getElementById("target");
//     let jsonstring;
//     let counter = 0;
//     while(counter < 200)
//     {
//         jsonstring = '[<br>';
//         for(let i=0; i<66 && counter<200; i++)
//         {
//             jsonstring+=JSON.stringify(json[counter])+',<br>';
//             counter++;
//         }
//         console.log(counter);
//         element.innerHTML += jsonstring+'<br>]';
//     }
// });

const getSomething = ()=>
{
    //either returns success or reject .then() or .catch()
    return new Promise((resolve, reject)=>
    {
        //fetch something
        // resolve('some data');
        reject('some error');
    });
};

getSomething().then((data)=>
{
    console.log(data);
}).catch((error)=>
{
    console.log(error);
});