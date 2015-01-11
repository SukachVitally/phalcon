<?php

use \Phalcon\CLI\Task;
use \App\Models\Product;
use \App\Models\ProductGroup;
use \App\Models\ProductInfo;
use \Phalcon\Config\Adapter\Php as Config;

class PopulateTask extends Task
{
    private $operations = ['products'];

    public function mainAction()
    {
        foreach ($this->operations as $operation) {
            echo  'console.start_operation'.":   '". $operation ."' \n";
            $action = $operation."Action";
            $this->$action();
        }
        echo  "console.done \n";
    }

    public function clearAction()
    {
        foreach ($this->operations as $operation) {
            echo  "console.clear_operation:   '". $operation ."' \n";
            $action = $operation.'ClearAction';
            $this->$action();
        }
        echo  "console.done \n";
    }

    public function productsAction() {
        $groupStructure = new Config(APP_PATH . 'app/config/populate.php');

        foreach($groupStructure as $item) {
            $group = new ProductGroup();
            $group->save(['name' => $item->name]);
            foreach($item->products as $subitem) {
                $product = new Product();
                $product->save([
                    'name' => $subitem->name,
                    'group_id' => $group->id
                ]);
                $info = $subitem->product_info;
                $product_info = new ProductInfo();
                $product_info->save([
                    'description' => $info->description,
                    'data' => json_encode($info->data),
                    'product_id' => $product->id,
                ]);
            }
        }
    }

    public function productsClearAction() {
        ProductInfo::find()->delete();
        Product::find()->delete();
        ProductGroup::find()->delete();
    }

}