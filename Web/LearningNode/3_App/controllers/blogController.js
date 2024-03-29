import {Blog} from '../models/blog.js';

const blog_index = (request, response)=>
{
    Blog.find().sort({ createdAt:-1 }).then((result)=>
    {
        response.render('index', { title: 'All Blogs', blogs: result});
    }).catch((error)=>
    {
        console.log(error);
    });
};

const blog_details = (request, response)=>
{
    const id = request.params.id;
    Blog.findById(id).then((result)=>
    {
        response.render('details', { blog:result, title: 'Blog Details' });
    }).catch((error)=>
    {
        console.log(error);
        response.render('404', { title: 'Blog Details' });
    });
    console.log(id);
};

const blog_create_get = (request, response)=>
{
    response.render('create', {title:'Create Blog'});
};

const blog_create_post = (request, response)=>
{
    const blog = new Blog(request.body);
    blog.save().then((result)=>
    {
        response.redirect('/blogs');
    }).catch((error)=>
    {
        console.log(error);
    });
    console.log(request.body);
};

const blog_delete = (request, response)=>
{
    const id = request.params.id;
    Blog.findByIdAndDelete(id).then((result)=>
    {
        response.json({ redirect:'/blogs' });
    }).catch((error)=>
    {
        console.log(error);
    });
};

export {blog_index, blog_details, blog_create_get, blog_create_post, blog_delete};
