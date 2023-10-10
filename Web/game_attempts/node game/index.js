const express = require('express');
const app = express();

//This allows json parsing in the body of the request...this is middleware
//All requests funnel through this middleware and are parsed as Json object. 
app.use(express.json());

//This makes requests as url encoded payloads key=value&key=value
//extended:true allows for passing arrays and complex objects.
app.use(express.urlencoded({extended:true}));

//Middleware for serving static files css
//The option 'public' is the name of the folder for static assests like css and images
app.use(express.static('public'));

app.use((request, response, next)=>
{
    console.log('Logging...');
    next(); //This pass controls to the next middle ware funciton, without it the process hangs.
});

//Base page
app.get('/', (request, response)=>
{
    response.sendFile('public/game.html' , {root:__dirname});
});

app.listen(80, ()=>
{
    console.log('Listening on port 80...');
});
