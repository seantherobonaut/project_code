import express from "express";

const route = express.Router();

route.get("/", (request, response)=>
{
    const locals = {
        title: "NodeJs Blog",
        description: "Simeple Blog created with NodeJs, Express, & MongoDb."
    };

    response.render("index", {locals});
});

route.get("/about", (request, response)=>
{
    response.render("about");
});


export {route};
