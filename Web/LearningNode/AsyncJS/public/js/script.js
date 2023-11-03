// const getTodos = (resource, callback) => 
// {
//     const request = new XMLHttpRequest();

//     request.addEventListener('readystatechange', ()=>
//     {
//         if(request.readyState === 4 && request.status === 200)
//         {
//             const data = JSON.parse(request.responseText);
//             callback(undefined, data);
//         }
//         else
//         {
//             if(request.readyState === 4)
//             {
//                 callback('could not fetch data', undefined);
//             }
//         }
//     });

//     request.open('GET', resource);
//     request.send(null);
// };

// //Callback Hell, do NOT do this!
// getTodos('/todos/file1.json', (error, data)=>{
//     console.log(data);
//     getTodos('/todos/file2.json', (error, data)=>{
//         console.log(data);
//         getTodos('/todos/file3.json', (error, data)=>{
//             console.log(data);
//         });
//     });
// });



//the data we pass to the resolve function is then returned and passed to the callback function in the .then() function






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