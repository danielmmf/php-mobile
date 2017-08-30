<?php

require './vendor/autoload.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);


use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

echo 'aqui';


class User
{
    
    function getUsers()
    {
       die("chamou");
    }
}

]


$collector = new RouteCollector();
$collector->get('/', function(){
    return 'Home Page';
});
$collector->post('products', function(){
    return 'Create Product';
});
$collector->get('tio', function(){
    return 'Amend Item ';
});
$dispatcher =  new Dispatcher($collector->getData());
echo $dispatcher->dispatch('GET', '/'), "\n";   // Home Page
echo $dispatcher->dispatch('GET', '/tio'), "\n";   // Home Page
echo $dispatcher->dispatch('POST', '/products'), "\n"; // Create Product