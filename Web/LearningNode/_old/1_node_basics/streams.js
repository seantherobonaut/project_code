import fs from 'fs';

const readStream = fs.createReadStream('./docs/blog2.txt', {encoding:'utf8'});

const writeStream = fs.createWriteStream('./docs/blog3.txt');

// readStream.on('data', (chunk)=>
// {
//     console.log("-----NEW CHUNK-----");

//     //if you don't have {encoding:'utf8'}
//     // console.log(chunk.toString());

//     //if you use {encoding:'utf8'}
//     // console.log(chunk);

//     //copy one file and write it to the next in chunks
//     writeStream.write('\nNEW CHUNK\n');
//     writeStream.write(chunk);
// });

//pipes can work only on readable streams to writeable streams
readStream.pipe(writeStream);
