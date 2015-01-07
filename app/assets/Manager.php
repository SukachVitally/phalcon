<?php

namespace App\Assets;

use Phalcon\Assets\Manager as AssetManager;
use Phalcon\Config\Adapter\Php as Adapter;

class Manager extends AssetManager {

    private $_bowerFolder = 'vendor/bower/';
    private $_vendorScriptFolder = 'public/vendor/';

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

    public function addBowerJs($name) {
        $package = $this->getBowerPackage($name)->js;

        if (!$package) {
            return;
        }

        foreach ($package->toArray() as $file) {
            $this->addJs('vendor/' . $name . $file . '.js');
        }
    }

    public function addBowerCss($name) {
        $package = $this->getBowerPackage($name)->css;

        if (!$package) {
            return;
        }

        foreach ($package->toArray() as $file) {
            $this->addJs('vendor/' . $name . $file . '.css');
        }
    }

    public function removeVendorFolder() {
        exec('rm -R ' . APP_PATH . 'public/vendor');
    }

    public function createBowerPackages() {
        $packages = $this->getBowerPackages()->toArray();
        foreach($packages as $package) {
            foreach($package as $type => $names) {
                foreach($names as $key => $path) {
                    var_dump(
                        APP_PATH.$this->_bowerFolder.$path.$type,
                        APP_PATH.$this->_vendorScriptFolder.$type.$key
                    );
                }

            }

        }
    }
}