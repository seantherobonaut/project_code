import mongoose, { mongo } from "mongoose";

//this seems like how in mysql you have a script that creates a table and its schema?
const Schema = mongoose.Schema;
const UserSchema = new Schema({
    username: {
        type: String,
        required: true,
        unique: true
    },
    password: {
        type: String,
        required: true
    }
});

//es6 way of exporting the model
const UserModel = mongoose.model('User', UserSchema);

export {UserModel};