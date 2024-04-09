import express from 'express';
import * as blogController from '../controllers/blogController.js';

const route = express.Router();

route.get('/', blogController.blog_index);
route.get('/create', blogController.blog_create_get);
route.post('/', blogController.blog_create_post);
route.get('/:id', blogController.blog_details);
route.delete('/:id', blogController.blog_delete);

export {route};
