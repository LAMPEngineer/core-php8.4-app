<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function(){
    $config_ini = parse_ini_file(base_path('/config.ini'), true);

    $config = require base_path('/config.php');    

    return new Database(
            config: $config['dadabase'],
            username: $config_ini['database']['username'], 
            password: $config_ini['database']['password']
        );
});


App::setContainer($container);
