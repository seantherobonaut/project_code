import dotenv from 'dotenv';
import express from 'express';
import expressLayout from 'express-ejs-layouts';

import {route as main_routes} from './server/routes/main.js';

dotenv.config();

const app = express();
const PORT = 3000 || process.env.PORT;

//Static files
app.use(express.static('public'));

//Templating Engine
app.use(expressLayout);
app.set('layout', './layouts/main');
app.set('view engine', 'ejs');

//Routes
app.use('/', main_routes);

app.listen(PORT, ()=>
{
    console.log(`App listening on port ${PORT}`);
});
