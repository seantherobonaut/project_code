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




// /* Promises */ //(primary source for tests below)
// const getTodos = (resource) => 
// {
//     return new Promise((resolve, reject)=>
//     {
//         const request = new XMLHttpRequest();

//         request.addEventListener('readystatechange', ()=>
//         {
//             if(request.readyState === 4 && request.status === 200)
//             {
//                 const data = JSON.parse(request.responseText);
//                 resolve(data);
//             }
//             else
//             {
//                 if(request.readyState === 4)
//                 {
//                     reject('error getting resource');
//                 }
//             }
//         });
    
//         request.open('GET', resource);
//         request.send(null);
//     });
// };

// //Basic promises
//we don't need to pass in callbacks, instead we tack on a .then() 
// getTodos('/todos/file1.json').then((data)=>
// {
//     console.log('promise resolved:', data);
// }).catch((error)=>
// {
//     console.log('promise rejected: ', error);
// });


// //Chaining promises
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


//Fetch API
//promises are only rejected if we are offline or get a network error, not just 404
// fetch('/todos/file1.json').then((response)=>
// {
//     console.log('resolved', response);
//     return response.json();
// }).then((data)=>
// {
//     console.log(data);
// })
// .catch((error)=>
// {
//     console.log('rejected', error);
// });

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


/* Async & Await */
const getTodos = async ()=>
{
    //the await keyword stops javascript from assigning a value to response until the promise has resolved
    //this is not blocking code, we are adding this inside an async function
    const response = await fetch('/todos/file1.json');

    //missing file doesn't reject so we have to check manually
    if(response.status !== 200)
    {
        throw new Error('cannot fetch data');
    }

    //the json object also returns a promise, so we can chain await
    const data = await response.json();

    //this is much cleaner than chaining promises, each line with an await keyword waits for it to finish before proceeding sequentially
    return data;
};

/* Even though we wanted to stop using .then() and just use await... we still have to use .then() outside of async functions */

//proof of nonblocking code
console.log(1);
console.log(2);

getTodos().then((data)=>
{
    console.log('resolved: ', data);
}).catch((error)=>
{
    console.log('rejected: ', error.message);
});

console.log(3);
console.log(4);
