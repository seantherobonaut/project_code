import dotenv from 'dotenv';
import express from 'express';
import expressLayout from 'express-ejs-layouts';

import {route as main_routes} from './server/routes/main.js';
import {route as admin_routes} from './server/routes/admin.js';
import {connectDB} from './server/config/db.js';

dotenv.config();


// left off video 7, start


const app = express();
const PORT = 3000 || process.env.PORT;

//Connect to DB
connectDB();

//enables passing data to node?
app.use(express.urlencoded({ extended:true }));
app.use(express.json());

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
