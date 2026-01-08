import express from "express";

const route = express.Router();

/**
 * GET / 
 * Home page
 */
route.get('/', async (req, res) =>
{
    res.render('home');
});

route.get('/smoothies', (req, res) => 
{
    res.render('smoothies');
});

export {route};