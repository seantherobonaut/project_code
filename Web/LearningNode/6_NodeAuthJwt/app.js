import dotenv from 'dotenv';
dotenv.config();

import express from 'express';
import expressEjsLayouts from 'express-ejs-layouts';
import mongoose from 'mongoose';

const app = express();
const PORT = 3000 || process.env.PORT;

const connectDB = async () => {
    try {
        mongoose.set('strictQuery', false);
        const conn = await mongoose.connect(process.env.MONGODB_URI);
        console.log(`Database Connected: ${conn.connection.host}`);
    } catch (error) {
        console.log(error);
    }
}
connectDB();

//be able to pass data middleware
app.use(express.urlencoded({extended:true}));
//pass data through forms
app.use(express.json());
//area for public files
app.use(express.static('public'));

app.use(expressEjsLayouts);
app.set('layout', './layouts/main');
app.set('view engine', 'ejs');

import {route as main_routes} from './routes/main.js';
app.use('/', main_routes);

import {route as auth_routes} from './routes/auth.js';
app.use('/', auth_routes);

app.listen(PORT, () =>
{
    console.log(`Server is running on http://localhost:${PORT}`);
});