import express from "express";
import {PostModel} from "../models/Post.js";
import {UserModel} from "../models/User.js";
import bcrypt from "bcryptjs";
import jwt from "jsonwebtoken";

import dotenv from "dotenv";
dotenv.config();

const adminLayout = '../views/layouts/admin';
const jwtSecret = process.env.JWT_SECRET;

const authMiddleware = (req, res, next) => {
    const token = req.cookies.token;

    if(!token) {
        return res.status(401).json({message: 'Unauthorized'});
    }

    try {
        const decoded = jwt.verify(token, jwtSecret);
        req.userId = decoded.userId;
        next();
    } catch (error) {
        res.status(401).json({message: error});
    }
};


const route = express.Router();

/**
 * GET /
 * Admin - Login page
 */
route.get('/admin', async (req, res) =>
{
    
    try {
        const locals = {
            title: "Admin",
            description: "Simple Blog created with NodeJs, Express & MongoDb."
        };

        res.render('admin/index', { locals, layout: adminLayout, currentRoute : '/admin' });
    } catch (error) {
        console.log(error);
    }
});


/**
 * POST /
 * Admin - Check login
 */
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

/**
 * GET /
 * Admin - Dashboard
*/
route.get('/dashboard', authMiddleware, async (req, res) =>
{
    // !!!!!!!!(by adding the middleware argument...it makes all our pages password protected?)
    try {
        const locals = {
            title: "Dashboard",
            description: "Simple Blog created with NodeJs, Express & MongoDb."
        };
        
        const data = await PostModel.find();
        res.render('admin/dashboard', {
            locals,
            data,
            layout: adminLayout,
            currentRoute : '/dashboard'
        });

    } catch (error) {
        console.log(error);
    }
});

/**
 * GET /
 * Admin - Create New Post
 */
route.get('/add-post', authMiddleware, async (req, res) =>
{
    try {
        const locals = {
            title: "Add Post",
            description: "Simple Blog created with NodeJs, Express & MongoDb."
        };
        
        const data = await PostModel.find();
        res.render('admin/add-post', {
            locals,
            layout: adminLayout,
            currentRoute : '/add-post'
        });

    } catch (error) {
        console.log(error);
    }
});

/**
 * POST / 
 * Admin - User Register
 */
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

/**
 * POST /
 * Admin - Create New Post
 */
route.post('/add-post', authMiddleware, async (req, res) =>
{
    try 
    {    
        try 
        {
            const newPost = new PostModel({
                title: req.body.title,
                body: req.body.body
            });

            await PostModel.create(newPost);
            res.redirect('/dashboard');
        } 
        catch (error) 
        {
            console.log(error);
        }
    }
    catch (error)
    {
        console.log(error);
    }
});

/**
 * GET /
 * Admin - Edit Post
 */
route.get('/edit-post/:id', authMiddleware, async (req, res) =>
{
    try {

        const data = await PostModel.findOne({ _id: req.params.id });

        const locals = {
            title: "Add Post",
            description: "Simple Blog created with NodeJs, Express & MongoDb."
        };

        res.render('admin/edit-post', {
            locals, 
            data,
            layout: adminLayout,
            currentRoute : '/edit-post'
        });

    } catch (error) {
        console.log(error);
    }
});

/**
 * PUT /
 * Admin - Edit Post
 */
route.put('/edit-post/:id', authMiddleware, async (req, res) =>
{
    try {

        await PostModel.findByIdAndUpdate(req.params.id, {
            title: req.body.title,
            body: req.body.body,
            updatedAt: Date.now()
        });

        res.redirect(`/edit-post/${req.params.id}`);

    } catch (error) {
        console.log(error);
    }
});

/**
 * DELETE
 * Admin - Delete Post
 */
route.delete('/delete-post/:id', authMiddleware, async (req, res) =>
{
    try {
        await PostModel.deleteOne({_id: req.params.id});
        res.redirect('/dashboard');
    } catch (error) {
        console.log(error);
    }
});

/**
 * GET
 * Admin - Logout
 */
route.get('/logout', (req, res)=>
{
    res.clearCookie('token');
    // res.json({message: 'Logout Successful'});
    res.redirect('/');
});

export {route};