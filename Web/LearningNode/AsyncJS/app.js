import express from 'express';
const app = express();
const PORT = 3000;

import { fileURLToPath } from 'url';
import { dirname } from 'path';
const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);


//enables passing data to node?
app.use(express.urlencoded({ extended:true }));
app.use(express.json());

//Static files
app.use(express.static('public'));

app.get('/', (request, response)=>
{
    // response.send("<p>home!</p>");
    response.sendFile('./public/view.html', {root:__dirname});
    // response.sendFile(path.join(__dirname ,'views','shop.html'))
    // response.sendFile(path.join(__dirname, '/index.html'));
    // response.sendFile('chat.html', { root: path.join(__dirname, 'public/') });
});

app.listen(PORT, ()=>
{
    console.log(`App listening on port ${PORT}`);
});
