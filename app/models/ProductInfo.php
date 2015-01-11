<?php

namespace App\Models;

class ProductInfo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $product_id;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $data;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'product_id' => 'product_id', 
            'description' => 'description', 
            'data' => 'data'
        );
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return "products_info";
    }
}
