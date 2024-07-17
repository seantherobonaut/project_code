/* Basic old way to create a server */

import http from 'http';

//es6 way to create __filename and __dirname
import { fileURLToPath } from 'url';
import { dirname } from 'path';
const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((request, response) => 
{
    response.statusCode = 200;
    response.setHeader('Content-Type', 'text/plain');
    response.end('Hey Sean!\n');
});

server.listen(port, hostname, () => 
{
    console.log(`Server running at http://${hostname}:${port}/`);
});

console.log(__dirname);
console.log(__filename);