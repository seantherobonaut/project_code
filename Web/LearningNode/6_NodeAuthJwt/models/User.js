import mongoose, { mongo } from "mongoose";
import validator from 'validator';

const userSchema = new mongoose.Schema({
    email: {
        type: String,
        require: [true, 'Please enter an email'],
        unique: true,
        lowercase: true, 
        validate: [validator.isEmail, 'Please enter a VALID email']
    },
    password: {
        type: String,
        require: [true, 'Please enter a password'],
        minlength: [6, 'Password must be longer than 6 characters']
    }
});

const User = mongoose.model('user', userSchema);

export {User};
