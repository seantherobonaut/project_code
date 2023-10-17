import dotenv from 'dotenv';
dotenv.config();

import express from 'express';
import expressLayout from 'express-ejs-layouts';
import cookieParser from 'cookie-parser';
import MongoStore from 'connect-mongo';

import {route as main_routes} from './server/routes/main.js';
import {route as admin_routes} from './server/routes/admin.js';
import {connectDB} from './server/config/db.js';
import session from 'express-session';




// left off video 7, start


const app = express();
const PORT = 3000 || process.env.PORT;

//Connect to DB
connectDB();

//enables passing data to node?
app.use(express.urlencoded({ extended:true }));
app.use(express.json());
app.use(cookieParser());
app.use(session({
    secret: 'keyboard cat',
    resave: false,
    saveUninitialized: true,
    store: MongoStore.create({
        mongoUrl: process.env.MONGODB_URI
    })//,
    // cookie: { maxAge: new Date(Date.now() + (3600000)) }
}));

//Static files
app.use(express.static('public'));

//Templating Engine
app.use(expressLayout);
app.set('layout', './layouts/main');
app.set('view engine', 'ejs');

//Routes
app.use('/', main_routes);
app.use('/', admin_routes);

app.listen(PORT, ()=>
{
    console.log(`App listening on port ${PORT}`);
});
