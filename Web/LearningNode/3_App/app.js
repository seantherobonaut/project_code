//database credentials
import { dbURI } from './db_creds.js';
import express from 'express';
import morgan from 'morgan';
import mongoose from 'mongoose';   

import { render } from 'ejs';
import {route as blogRoutes} from './routes/blogRoutes.js';


const app = express();  
//register view engine
app.set('view engine', 'ejs');

//connect to mongodob
mongoose.connect(dbURI, {useNewUrlParser:true, useUnifiedTopology: true}).then((result)=>
{
    console.log('connected to db');
    app.listen(3000);
}).catch((error)=>
{
    console.log(error);     
}); 

// app.use((request, response, next)=>
// {
//     console.log('new request made:');
//     console.log('host: ', request.hostname);
//     console.log('path: ', request.path);
//     console.log('method: ', request.method);
//     next();
// });


//Middleware for static files
app.use(express.static('public'));

//Middleware for processing incoming data (allows us to access request.body)
app.use(express.urlencoded({ extended:true }));

//Middleware for good logging
app.use(morgan('dev'));


// //mongoose and mongodb sandbox routes
// app.get('/add-blog', (request, response)=>
// {
//     const blog = new Blog({
//         title: 'new blog',
//         snippet: 'about my new blog',
//         body: 'more about my new blog'
//     });

//     blog.save().then((result)=>
//     {
//         response.send(result);
//     }).catch((error)=>
//     {
//         console.log(error);
//     });
// });

// app.get('/all-blogs', (request, response)=>
// {
//     //using instance of the blog method
//     Blog.find().then((result)=>
//     {
//         response.send(result);
//     }).catch((error)=>
//     {
//         console.log(error);
//     });
// });

// app.get('/single-blog',(request, response)=>
// {
//     Blog.findById('652106cbf2d83e7982f9d8a2').then((result)=>
//     {
//         response.send(result);
//     }).catch((error)=>
//     {
//         console.log(error);
//     });
// });


app.get('/', (request, response)=>
{
    response.redirect('/blogs');

    // response.send("<p>home!</p>");
    // response.sendFile('./views/index.html', {root:__dirname});

    // const blogs = [
    //     {title: 'post1', snippet: 'Lorem ipsum dolor sit amet consectetur'},
    //     {title: 'post2', snippet: 'Lorem ipsum dolor sit amet consectetur'},
    //     {title: 'post3', snippet: 'Lorem ipsum dolor sit amet consectetur'},    
    // ];

    // response.render('index', {title:'Home', blogs}); //you can also do blogs: blogs 
});

app.get('/about', (request, response)=>
{
    response.render('about', {title:'About'});
});

//redirects
app.get('/about-us', (request, response)=>
{
    response.redirect('/about');
});

//blog routes (only use these routes if they start with /blogs/)
app.use('/blogs',blogRoutes);

//404 
//this is middleware, it runs only if one of the previous functions doesn't fire (top to bottom)
app.use((request, response)=>
{
    response.status(404).render('404', {title:'Not Found'});
});


