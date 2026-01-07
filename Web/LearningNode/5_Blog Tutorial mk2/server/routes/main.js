// Main routes

import express from "express";
import {PostModel} from "../models/Post.js";

const route = express.Router();

/**
 * GET / 
 * Home page
 */
route.get('/', async (req, res) =>
{

    try {

        const locals = {
            title: "NodeJs Blog",
            description: "Simple Blog created with NodeJs, Express & MongoDb."
        };
        
        let perPage = 10;
        let page = req.query.page || 1;
        
        //Query that async collects results and sorts them reversed by date, showing only 10 results at a time, skip page#
        const data = await PostModel.aggregate([{ $sort: { createdAt: -1 } }])
        .skip(perPage * page - perPage)
        .limit(perPage)
        .exec();

        const count = await PostModel.countDocuments();
        const nextPage = parseInt(page) + 1;
        const hasNextPage = nextPage <= Math.ceil(count/perPage);
        
        res.render('index', {
            locals,
            data,
            current: page,
            nextPage: hasNextPage ? nextPage : null,
            currentRoute: '/'
        });

    } catch (error) {
        console.log(error);
    }
});

/**
 * GET / 
 * Post :id
 */
route.get('/post/:id', async (req, res) =>
{
    try {
        let slug = req.params.id
        
        const data = await PostModel.findById({_id: slug});

        const locals = {
            title: data.title,
            description: "Simple Blog created with NodeJs, Express & MongoDb."
        };

        res.render('post', {
            locals, 
            data, 
            currentRoute: `/post/${slug}`
        });
    } catch (error) {
        console.log(error);
    }
});

/**
 * POST /
 * Post search terms
 */
route.post('/search', async (req, res) =>
{    
    //why is this a post method and not a get method?
    try {
        
        const locals = {
            title: "Search",
            description: "Simple Blog created with NodeJs, Express & MongoDb."
        };

        let searchTerm = req.body.searchTerm;
        const searchNoSpecialChar = searchTerm.replace(/[^a-zA-Z0-9]/g, "");

        const data = await PostModel.find({
            $or: [
                {title: {$regex: new RegExp(searchNoSpecialChar, 'i')}},
                {body: {$regex: new RegExp(searchNoSpecialChar, 'i')}}
            ]
        });

        res.render('search', {
            data,
            locals
        });

    } catch (error) {
        console.log(error);
    }
});

/**
 * GET /
 * About page
 */
route.get('/about', (req, res) =>
{
    const locals = {
        title: "About Me",
        description: "A page about me"
    };

    res.render('about', { locals, currentRoute: '/about' });
});

/**
 * GET / 
 * Contact page
 */
route.get('/contact', (req, res) =>
{
    const locals = {
        title: "Contact Me",
        description: "Contact Page"
    };

    res.render('contact', { locals, currentRoute: '/contact' });
});

export {route};

// How to insert data
// function insertPostData () {
//     PostModel.insertMany([{
//         title: "Building a blog TWO",
//         body: "This is the body text TWO"
//     }]);
// }