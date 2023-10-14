import express from "express";
import {Post} from "../models/Post.js";

const route = express.Router();

const adminLayout = '../views/layouts/admin';

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

        response.render("admin/index", {locals, layout: adminLayout});
    }
    catch(error)
    {
        console.log(error);
    }
});



export {route};
