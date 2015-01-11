<?php

namespace App\Models;

class Product extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $group_id;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'name' => 'name', 
            'group_id' => 'group_id'
        );
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return "products";
    }
}
