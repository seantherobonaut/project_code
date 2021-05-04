<?php
    /* Convert request into an assoc array */
    $request = array();
    //Set request method
    $request['method'] = $_SERVER['REQUEST_METHOD'];
    //Set request path and remove query string from URI
    $request['path'] = strtolower(str_replace('?'.$_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']));
    //Check if path_data is empty
    if(strlen($request['path'])>1)
    {
        //Erase 1st forward slash from path_data
        if($request['path'][0]=="/")
            $request['path'] = substr($request['path'],1,strlen($request['path'])-1);
        //Convert path_data to an array
        $request['path'] = explode("/", $request['path']);
    }
    else
        $request['path'] = array('home');
    //Set request body ...maybe check if empty?
    $request['body'] = $_POST;
    //Set request query
    $request['query'] = $_GET;


/* TODO
    Use above code in the "/anything/" regex path

    change super globals from "app" and "root" to "path_app" "path_root" also add "db_conn" maybe have an "admin_con" and "path_lib"

    for the regex paths, regex find in array might not find index, it might only search array contents
    have an array that contains the get path, then the get callback with matching #index positions so if find path_array[1] exec callback[1]

    *Timezone is incorrect!

    *path routing(REGEX!!!)

    *organize another folder to hold non php-lib server logic (modules, special classes, etc... "app", db passwords)
        maybe we can follow previous logic just have an "app" folder to be hot swappable...
        REGEX:
            has to match multiple things like
                "/unionmine & robotics & cookie/.." (does nothing) ... or we can just make 3 empty routes
                "/about" and also "/about/somethingelse" one path has more tendency than the other
            routing priority => hardcoded > database (coded paths come before database queries)

    *ajax
    *password auth
    *emailer


        root class recieves route data, then looks into database to search for sub template(template_root, teplate_legacy)
        sub template recieves path data without the first parameter (the constructor might get some though)

        Each component accepts the path (array) and takes off a variabe amount of data to use
        If that component is allowed to call other components, then it can pass on the remaining path to it        

        fetch entry from database (fake one) ... search all nodes with a parent of the previous node that match other things
            node parent type    other table    parent paragraph text
    */

                    /*headers must be sent first before any output*/
    // header('Content-Type: text/html; charset=utf-8');
    // header('Content-Type: application/json');    
    // header('Content-Type: text/plain; charset=utf-8');

    // $data = json_decode(file_get_contents('php://input'), true);
    //don't forget about this!! json_last_error() == JSON_ERROR_NONE
    // $output = '';
    // ob_start();
    //     echo '<p>Hello world!</p>';
    //     $output = ob_get_contents();
    // ob_end_clean();
    // echo $output;

    //Proceed unless the request is for robotics, unionmine, or cookie
    if($request['path'][0]!='unionmine' && $request['path'][0]!='robotics' && $request['path'][0]!='cookie' && $request['path'][0]!='test')
    {
        //Simulate searching a database for objects that match the root path node
        $fakeDB = array('home'=>'BasicPage','about'=>'BasicPage','art'=>'BasicPage');

        //If the path cannot be found, return 404
        if(empty($fakeDB[$request['path'][0]]))
        {
            http_response_code(404);
            require 'public/views/errors/404.php';
        }
        else
        {
            //Create new instance of path's object, echo response
            $root = new $fakeDB[$request['path'][0]];            
            $root->init($request);
            $root->exec();
        }
    }
?>
