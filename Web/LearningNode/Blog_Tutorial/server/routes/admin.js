import dotenv from 'dotenv';
dotenv.config();

import express, { response } from "express";
import {Post} from "../models/Post.js";
import {User} from "../models/User.js";
import {default as bcryptjs} from "bcryptjs";
import {default as jwt} from "jsonwebtoken";

const jwtSecret = process.env.JWT_SECRET;

const route = express.Router();

const adminLayout = '../views/layouts/admin.ejs';

/**
 * Put this in the routes to prevent unauthorized access to pages like dashboard
 * Check Login
 */
const authMiddleware = (request, response, next)=>
{;
    const token = request.cookies.token;

    if(!token)
    {
        return response.status(401).json({message: 'Unauthorized'});
    }
    else
    {
        try
        {
            const decoded = jwt.verify(token, jwtSecret);
            request.userId = decoded.userId;
            next();
        }
        catch(error)
        {
            return response.status(401).json({message: 'Unauthorized'});
        }
    }
};

/**
 * GET /
 * Admin - Login Page
 */
route.get("/admin", async (request, response)=>
{
    try
    { 
        const locals = {
            title: "Admin",
            description: "Simeple Blog created with NodeJs, Express, & MongoDb."
        };

        response.render("admin/index", {
            locals,
            layout: adminLayout
        });
    }
    catch(error)
    {
        console.log(error);
    }
});

/**
 * POST /
 * Admin - Check Login
 */
route.post("/admin", async (request, response)=>
{
    try
    { 
        const {username, password} = request.body;

        const user = await User.findOne({username});

        if(!user)
            return response.status(401).json({message: 'Invalid credentials'});

        const isPasswordValid = await bcryptjs.compare(password, user.password);

        if(!isPasswordValid)
            return response.status(401).json({message: 'Invalid credentials'});

        const token = jwt.sign({userId: user._id}, jwtSecret);
        response.cookie('token', token, {httpOnly:true});
        response.redirect('/dashboard');
    }
    catch(error)
    {
        console.log(error);
    }
});


/**
 * GET /
 * Admin Dashboard
 */
route.get("/dashboard", authMiddleware, async (request, response)=>
{
    try
    {
        const data = await Post.find();

        const locals = {
            title: "Dashboard",
            description: "Simeple Blog created with NodeJs, Express, & MongoDb."
        };

        response.render("admin/dashboard", {
            locals,
            data,
            layout: adminLayout
        });
    }
    catch(error)
    {
        console.log(error);
    }
});


/**
 * GET /
 * Admin - Create New Post
 */
route.get("/add-post", authMiddleware, async (request, response)=>
{
    try
    {
        const data = await Post.find();

        const locals = {
            title: "Add Post",
            description: "Simeple Blog created with NodeJs, Express, & MongoDb."
        };

        response.render("admin/add-post", {
            locals,
            layout: adminLayout
        });
    }
    catch(error)
    {
        console.log(error);
    }
});

/**
 * POST /
 * Admin - Create New Post
 */
route.post("/add-post", authMiddleware, async (request, response)=>
{
    try
    {
        try
        {
            const newPost = new Post({
                title: request.body.title,
                body: request.body.body,                                
            });

            await Post.create(newPost);
            response.redirect('/dashboard');
        }
        catch(error)
        {
            console.log(error);
        }

    }
    catch(error)
    {
        console.log(error);
    }
});

/**
 * GET /
 * Admin - Edit Post
 */
route.get("/edit-post/:id", authMiddleware, async (request, response)=>
{
    try
    {
        const data = await Post.findOne({ _id: request.params.id });

        const locals = {
            title: "Edit Post",
            description: "Simeple Blog created with NodeJs, Express, & MongoDb."
        };

         response.render('admin/edit-post', {
            locals,
            data,
            layout: adminLayout
         });
    }
    catch(error)
    {
        console.log(error);
    }
});

/**
 * PUT /
 * Admin - Edit Post
 */
route.put("/edit-post/:id", authMiddleware, async (request, response)=>
{
    try
    {
        await Post.findByIdAndUpdate(request.params.id,{
            title: request.body.title,
            body: request.body.body,
            updatedAt: Date.now()
        });

        response.redirect(`/edit-post/${request.params.id}`);
    }
    catch(error)
    {
        console.log(error);
    }
});


/**
 * DELETE /
 * Admin - Delete Post
 */
route.delete("/delete-post/:id", authMiddleware, async (request, response)=>
{
    try
    {
        await Post.deleteOne({ _id: request.params.id });

        response.redirect('/dashboard');
    }
    catch(error)
    {
        console.log(error);
    }
});

/**
 * GET /
 * Admin - Logout
 */
route.get("/logout", (request, response)=>
{
    response.clearCookie('token');
    // response.json({message: 'Logout Successful'});
    response.redirect('/');
});

// backup of admin login post
// /**
//  * POST /
//  * Admin - Check Login
//  */
// route.post("/admin", async (request, response)=>
// {
//     try
//     { 
//         const {username, password} = request.body;

//         if(request.body.username === 'admin' && request.body.password === 'password')
//             response.send('you are logged in');
//         else
//             response.send('nope!');
//     }
//     catch(error)
//     {
//         console.log(error);
//     }
// });


/**
 * POST /
 * Admin - Register
 */
route.post("/register", async (request, response)=>
{
    try
    { 
        const {username, password} = request.body;
        const hashedPassword = await bcryptjs.hash(password, 10);

        try
        {
            const user = await User.create({ username, password: hashedPassword });
            response.status(201).json({ message: 'User created', user});
        }
        catch(error)
        {
            if(error.code === 11000)
            {
                response.status(409).json({message: 'User already in use'});
            }
            response.status(500).json({message: 'internal server error' });
        }

    }
    catch(error)
    {
        console.log(error);
    }
});


export {route};
