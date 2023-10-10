import fs from 'fs';

// fs.readFile('./docs/blog1.txt', (error, data)=>
// {
//     if(error)
//         console.log(error);

//     console.log(data.toString());
// });

// fs.writeFile('./docs/blog1.txt', 'new content', ()=>
// {
//     console.log('file was written');
// });


//Create and delete folders
if(!fs.existsSync('./assets'))
{
    fs.mkdir('./assets', (error)=>
    {
        if(error)
            console.log(error);
        else
            console.log('folder created');
    });
}
else
{
    fs.rmdir('./assets', (error)=>
    {
        if(error)
            console.log(error);
        else
            console.log('folder deleted');
    });
}

//Create and delete files
if(fs.existsSync('./docs/deleteme.txt'))
{   
    fs.unlink('./docs/deleteme.txt', (error)=>
    {
        if(error)
            console.log(error);
        else
            console.log('file deleted');
    });   
}
