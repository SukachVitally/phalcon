<?php

use \App\Models\Product;

class ProductsController extends ControllerBase
{

    public function indexAction()
    {
        $models = \App\Models\Product::find();
        $this->sendJson($models->toArray());
    }

}

