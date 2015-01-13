<?php

$router->addGet("/products", array(
    'controller' => 'products',
    'action' => 'index',
));