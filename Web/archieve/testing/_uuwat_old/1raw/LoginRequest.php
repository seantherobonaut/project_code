<?php
    //Config
    require 'uuwat/ConfigClass.php';
    Config::$path['root'] = __DIR__.'/';
    Config::$path['uuwat'] = Config::$path['root'].'uuwat/';

    //Debugger
    require Config::$path['uuwat'].'Debugger/debugHandler.php';
    require Config::$path['uuwat'].'Debugger/OutputHandlerClass.php';
    require Config::$path['uuwat'].'Debugger/LoggerHandlerClass.php';
    Debugger::addHandler(new OutputHandler(false, array(E_WARNING, E_USER_WARNING, E_NOTICE, E_USER_NOTICE)));
    Debugger::addHandler(new LoggerHandler(Config::$path['root'].'logs/debug.log'));

    //Dependency Manager
    require Config::$path['uuwat'].'DependencyManager/DependencyManagerClass.php';
    $autoLoader = new DependencyManager(Config::$path['root'].'dependencyList.php', array(Config::$path['uuwat']));
    $autoLoader->registerLoader();

    //Create database connection
    Config::$dbConn['user'] = new DBconn;
    Config::$dbConn['user']->setConnection('localhost', 'id394780_srs', 'id394780_rooty', 'helloworld');    

    //Scan for registerTable files and create tables
    //Config::$dbConn['user']->registerTables(array(Config::$path['uuwat']));


    echo 'Hello world!<br>';
    $vars = explode("/", $_SERVER['REQUEST_URI']);    
?>