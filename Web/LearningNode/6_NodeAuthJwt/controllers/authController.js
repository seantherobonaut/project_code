import { User } from "../models/User.js";

const signup_get = (req, res) => {
    res.render('signup');
};

const login_get = (req, res) => {
    res.render('login');
};

const signup_post = async (req, res) => {
    const {email, password} = req.body;
    
    try {
        const user = await User.create({email, password});
        res.status(201).json(user);
    } catch (error) {
        console.log(error);
        res.status(400).send('error, user not created');
    }
};

//left off here
// https://www.youtube.com/watch?v=nukNITdis9g&list=PL4cUxeGkcC9iqqESP8335DA5cRFp8loyp&index=5

const login_post = async (req, res) => {
    res.send('user login');
};

export {signup_get, login_get, signup_post, login_post};
