
/* Promises */
const getTodos = (resource) => 
{
    return new Promise((resolve, reject)=>
    {
        const request = new XMLHttpRequest();

        request.addEventListener('readystatechange', ()=>
        {
            if(request.readyState === 4 && request.status === 200)
            {
                const data = JSON.parse(request.responseText);
                resolve(data);
            }
            else
            {
                if(request.readyState === 4)
                {
                    reject('error getting resource');
                }
            }
        });
    
        request.open('GET', resource);
        request.send(null);
    });
};

// //basic promises
//we don't need to pass in callbacks, instead we tack on a .then() 
// getTodos('/todos/file1.json').then((data)=>
// {
//     console.log('promise resolved:', data);
// }).catch((error)=>
// {
//     console.log('promise rejected: ', error);
// });


// //chaining promises
// getTodos('/todos/file1.json').then((data)=>
// {
//     console.log('promise1 resolved:', data);
//     return getTodos('/todos/file2.json');
// }).then((data)=>
// {
//     console.log('promise2 resolved: ', data);
//     return getTodos('/todos/file3.json');
// }).then((data)=>
// {
//     console.log('promise3 resolved: ', data);
// }).catch((error)=>
// {
//     console.log('promise rejected: ', error);
// });





/* Basic example callbacks */
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

/* Callback Hell, do NOT do this! */
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





//??
// const getSomething = ()=>
// {
//     //either returns success or reject .then() or .catch()
//     return new Promise((resolve, reject)=>
//     {
//         //fetch something
//         // resolve('some data');
//         reject('some error');
//     });
// };

// getSomething().then((data)=>
// {
//     console.log(data);
// }).catch((error)=>
// {
//     console.log(error);
// });



//promises are only rejected if we are offline or get a network error, not just 404
fetch('/todos/file1.json').then((response)=>
{
    console.log('resolved', response);
    return response.json();
}).then((data)=>
{
    console.log(data);
})
.catch((error)=>
{
    console.log('rejected', error);
});

// //early example
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