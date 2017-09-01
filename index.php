<?php

require './vendor/autoload.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);


use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\RouteParser;
use Phroute\Phroute\Dispatcher;

echo 'aqui';

function processInput($uri){        
        $uri = implode('/', 
            array_slice(
                explode('/', $_SERVER['REQUEST_URI']), 3));         
print_r($uri);
            return $uri;    
    }

    function processOutput($response){
        echo json_encode($response);    
    }
    
    
$collector = new RouteCollector(new RouteParser);
$collector->get('/', function(){
//$u = new User;
//$u->getUsers();
    return 'Home Page.';
});
$collector->post('products', function(){
    return 'Create Product';
});
$collector->get('/tio', function(){
    return 'Amend Item ';
});
$dispatcher =  new Dispatcher($collector->getData());
//echo $dispatcher->dispatch('GET', '/'), "\n";   // Home Page
//echo $dispatcher->dispatch('GET', '/tio'), "\n";   // Home Page
//echo $dispatcher->dispatch('POST', '/products'), "\n"; // Create Product
print_r($_SERVER);
try {

        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], processInput($_SERVER['REQUEST_URI']));

    } catch (Phroute\Exception\HttpRouteNotFoundException $e) {

        var_dump($e);      
        die();

    } catch (Phroute\Exception\HttpMethodNotAllowedException $e) {

        var_dump($e);       
        die();

    }

    processOutput($response);



