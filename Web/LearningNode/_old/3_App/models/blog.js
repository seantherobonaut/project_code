import mongoose from 'mongoose';   
const Schema = mongoose.Schema;

//defines structure of our documents 
const blogSchema = new Schema({
    title: { type:String, required:true },
    snippet: { type:String, required:true },
    body: { type:String, required:true }
}, { timestamps:true });

//model surrounds our schema and provides an interface to communicate with a database collection of that type
const Blog = mongoose.model('Blog', blogSchema);

export {Blog};