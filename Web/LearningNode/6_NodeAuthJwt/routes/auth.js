import {Router} from 'express';
const route = Router();

import * as authController from '../controllers/authController.js';

route.get('/signup', authController.signup_get);
route.post('/signup', authController.signup_post);
route.get('/login', authController.login_get);
route.post('/login', authController.login_post);

export {route};