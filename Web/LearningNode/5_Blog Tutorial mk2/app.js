import dotenv from 'dotenv';
dotenv.config();

import express from 'express';
import expressEjsLayouts from 'express-ejs-layouts';
import cookieParser from 'cookie-parser';
import MongoStore from 'connect-mongo';
import session from 'express-session';

const app = express();
const PORT = 3000 || process.env.PORT;

//Connect to database, only needed once for the start of NodeJs server, not needed in each file, persistent connection?
import {connectDB} from './server/config/db.js';
connectDB();

//be able to pass data middleware
app.use(express.urlencoded({extended:true}));
//pass data through forms
app.use(express.json());

app.use(cookieParser());
app.use(session({
    secret: 'keyboard cat',
    resave: false,
    saveUninitialized: true,
    store: MongoStore.create({
        mongoUrl: process.env.MONGODB_URI
    }),
    cookie: { maxAge: new Date(Date.now() + (3600000)) }
}));

//public files
app.use(express.static('public'));

//Templating engine setup
app.use(expressEjsLayouts);
app.set('layout', './layouts/main');
app.set('view engine', 'ejs');

import {route as main_routes} from './server/routes/main.js';
app.use('/', main_routes);

import {route as admin_routes} from './server/routes/admin.js';
app.use('/', admin_routes);


app.listen(PORT, () =>
{
    console.log(`Server is running on http://localhost:${PORT}`);
});
