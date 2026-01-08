import mongoose, { mongo } from "mongoose";

const userSchema = new mongoose.Schema({
    email: {
        type: String,
        require: true,
        unique: true,
        lowercase: true
    },
    password: {
        type: String,
        require: true,
        minLength: 6
    }
});

const User = mongoose.model('user', userSchema);

export {User};
