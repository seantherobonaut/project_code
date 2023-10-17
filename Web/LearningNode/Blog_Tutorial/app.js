import dotenv from 'dotenv';
dotenv.config();

import express from 'express';
import expressLayout from 'express-ejs-layouts';

import methodOverride from 'method-override';

import cookieParser from 'cookie-parser';
import MongoStore from 'connect-mongo';

import {route as main_routes} from './server/routes/main.js';
import {route as admin_routes} from './server/routes/admin.js';
import {connectDB} from './server/config/db.js';
import session from 'express-session';
import { isActiveRoute } from './server/helpers/routeHelpers.js';


// left off video 7, start


const app = express();
const PORT = 3000 || process.env.PORT;

//Connect to DB
connectDB();

//enables passing data to node?
app.use(express.urlencoded({ extended:true }));
app.use(express.json());
app.use(cookieParser());

//this is an odd workaround for app.put() and app.delete()
app.use(methodOverride('_method'));

//why is this here again?
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

app.locals.isActiveRoute = isActiveRoute;

//Routes
app.use('/', main_routes);
app.use('/', admin_routes);

app.listen(PORT, ()=>
{
    console.log(`App listening on port ${PORT}`);
});
