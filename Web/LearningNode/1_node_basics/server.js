// import http from 'http';
import { fileURLToPath } from 'url';
import { dirname } from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

// const hostname = '127.0.0.1';
// const port = 3000;

// const server = http.createServer((request, response) => 
// {
//     response.statusCode = 200;
//     response.setHeader('Content-Type', 'text/plain');
//     response.end('Hey Sean!\n');
// });

// server.listen(port, hostname, () => 
// {
//     console.log(`Server running at http://${hostname}:${port}/`);
// });

// const inty = setInterval(()=>
// {
//     console.log('in the interval')
// }, 1000);

// setTimeout(()=>
// {
//     console.log('in the timeout');
//     clearInterval(inty);
// }, 3000);

console.log(__dirname);
console.log(__filename);