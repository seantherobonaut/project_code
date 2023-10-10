// import * as http from 'http';
// import * as fs from 'fs';
// import * as lodash from 'lodash';
const http = require('http');
const fs = require('fs');
const _ = require('lodash');

const server = http.createServer((request, response)=>
{
    //lodash
    const num = _.random(3,20);
    console.log(num);


    const greet = _.once(()=>
    {
        console.log("hello there weary traveller!");
    });

    greet();
    greet();


    console.log(request.url);
    console.log(request.method);

    response.setHeader('Content-Type', 'text/html');
    
    // response.write('<head><link rel="stylesheet" href="#"></head>');
    // response.write('<p>Hello world!</p>');
    // response.write('<p>What\'s up?</p>');
    // response.end();

    let path = './views/';
    switch(request.url)
    {
        case '/':
            path += 'index.html';
            response.statusCode = 200;
            break;
        case '/about':
            path += 'about.html';
            response.statusCode = 200;
            break;
        /*
            Redirects are useful especially for popular websites
            Example: you change a link, but other people/websites that have been that link will now get a 404
            instead, you can redirect that traffic to the updated route
        */
        case '/about-me':
            response.statusCode = 301;
            response.setHeader('Location', '/about');
            response.end();
            break;
        default:
            path += '404.html';
            response.statusCode = 404;
            break;
    }

    fs.readFile(path, (error, data)=>
    {
        if(error)
        {
            console.log(error);
            response.end();
        }
        else
        {
            // response.write(data);    
            response.end(data);
        }
    });
});

server.listen(3000, 'localhost', ()=>
{
    console.log("Listening for requests on port 3000");
});
