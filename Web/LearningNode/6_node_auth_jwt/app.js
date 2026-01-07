import express from 'express';

const app = express();
const PORT = 3000;

//be able to pass data middleware
app.use(express.urlencoded({extended:true}));
//pass data through forms
app.use(express.json());
//area for public files
app.use(express.static('public'));

app.get('/', (request, response)=>{
    response.send("Hello world!");
});

app.listen(PORT, () =>
{
    console.log(`Server is running on http://localhost:${PORT}`);
});