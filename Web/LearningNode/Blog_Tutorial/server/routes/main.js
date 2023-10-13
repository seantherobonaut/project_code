import express from "express";
import {Post} from "../models/Post.js";

const route = express.Router();


/* Get Home */

// // insert some data into the database
// const insertPostData = ()=>
// {
//     Post.insertMany([{
//         title: "Building a blog",
//         body: "This is the body text"
//     }]);
// };

route.get("/", async (request, response)=>
{
    try
    {
        const locals = {
            title: "NodeJs Blog",
            description: "Simeple Blog created with NodeJs, Express, & MongoDb."
        };

        let perPage = 10;
        let page = request.query.page || 1;
        const data = await Post.aggregate([{ $sort:{ createdAt: -1 } }])
        .skip(perPage * page - perPage)
        .limit(perPage)
        .exec();

        const count = await Post.count();
        const nextPage = parseInt(page) + 1;
        const hasNextPage = nextPage <= Math.ceil(count / perPage);

        response.render("index", {
            locals,
            data,
            current: page,
            nextPage: hasNextPage ? nextPage : null
        });
    }
    catch(error)
    {
        console.log(error);
    }
});

// route.get("/", async (request, response)=>
// {
//     const locals = {
//         title: "NodeJs Blog",
//         description: "Simeple Blog created with NodeJs, Express, & MongoDb."
//     };

//     try
//     {
//         const data = await Post.find(); 
//         response.render("index", {locals, data});
//     }
//     catch(error)
//     {
//         console.log(error);
//     }
// });

route.get("/about", (request, response)=>
{
    response.render("about");
});

export {route};
