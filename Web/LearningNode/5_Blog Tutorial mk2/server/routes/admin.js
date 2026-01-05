import express from "express";
import {PostModel} from "../models/Post.js";
import {UserModel} from "../models/User.js";
import bcrypt from "bcryptjs";
import jwt from "jsonwebtoken";

import dotenv from "dotenv";
dotenv.config();

const adminLayout = '../views/layouts/admin';
const jwtSecret = process.env.JWT_SECRET;

//LEFT OFF
// https://youtu.be/uCQirwe5UVg?si=rmbk2l0hNB9GU1lU&t=895

const route = express.Router();

//Admin login page
route.get('/admin', async (req, res) =>
{
    
    try {
        const locals = {
            title: "Admin",
            description: "Simple Blog created with NodeJs, Express & MongoDb."
        };

        res.render('admin/index', { locals, layout: adminLayout });
    } catch (error) {
        console.log(error);
    }
});

//Admin check login
route.post('/admin', async (req, res) =>
{
    try {
        const {username, password} = req.body;
        
        const user = await UserModel.findOne( {username} );

        if(!user) {
            return res.status(401).json({message: 'Invalid credentials'});
        }

        const isPasswordValid = await bcrypt.compare(password, user.password);

        if(!isPasswordValid) {
            return res.status(401).json({message: 'Invalid credentials'});
        }

        const token = jwt.sign({ userId: user._id }, jwtSecret );
        res.cookie('token', token, {httpOnly: true});
        res.redirect('/dashboard');
        
        // res.render('admin/index', { locals, layout: adminLayout });
    } catch (error) {
        console.log(error);
    }
});

//Admin login page
route.get('/dashboard', async (req, res) =>
{
    res.render('admin/dashboard');
});

//Admin user register
route.post('/register', async (req, res) =>
{
    try {
        const {username, password} = req.body;
        
        const hashedPassword = await bcrypt.hash(password, 10);

        try {
            const user = await UserModel.create({username, password:hashedPassword});
            res.status(201).json({message: 'User Created', user});
        } catch (error) {
            if(error.code === 11000) {
                res.status(409).json({message: 'User already in use'});
            }
            res.status(500).json({message: 'Internal server error'});
        }

        
        // res.render('admin/index', { locals, layout: adminLayout });
    } catch (error) {
        console.log(error);
    }
});


export {route};