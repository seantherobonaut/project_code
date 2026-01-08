import {Router} from 'express';
const route = Router();

/**
 * GET / 
 * Home page
 */
route.get('/', async (req, res) =>
{
    res.render('home');
});

/**
 * GET /
 * Smoothies page
 */
route.get('/smoothies', (req, res) => 
{
    res.render('smoothies');
});

export {route};