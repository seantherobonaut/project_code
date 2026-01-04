import mongoose, { mongo } from "mongoose";

//this seems like how in mysql you have a script that creates a table and its schema?
const Schema = mongoose.Schema;
const PostSchema = new Schema({
    title: {
        type: String,
        required: true
    },
    body: {
        type: String,
        required: true
    },
    createdAt: {
        type: Date,
        default: Date.now
    },
    updatedAt: {
        type: Date,
        default: Date.now
    }
});

//es6 way of exporting the model
const PostModel = mongoose.model('Post', PostSchema);

export {PostModel};