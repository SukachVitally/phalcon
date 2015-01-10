<?php

namespace App\Assets;

use Phalcon\Assets\Collection as AssetCollection;
use Phalcon\Config\Adapter\Php as Adapter;

class Collection extends AssetCollection {

    private $_bowerConfig;

    public function getBowerPackages() {
        if($this->_bowerConfig === NULL) {
            $this->_bowerConfig = new Adapter(APP_PATH . 'app/config/bower.php');
        }
        return $this->_bowerConfig;
    }

    public function getBowerPackage($name) {
        return $this->getBowerPackages()->get($name);
    }

    public function addBowerJs($name)
    {
        $package = $this->getBowerPackage($name)->js;

        if ($package) {
            foreach ($package->toArray() as $key => $file) {
                $this->addJs('vendor/js/' . $key . '.js');
            }
        }

        return $this;
    }

    public function addBowerCss($name)
    {
        $package = $this->getBowerPackage($name)->css;

        if ($package) {
            foreach ($package->toArray() as $key => $file) {
                $this->addCss('vendor/css/' . $key . '.css');
            }
        }

        return $this;
    }
}