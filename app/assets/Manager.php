<?php

namespace App\Assets;

use Phalcon\Assets\Manager as AssetManager;

class Manager extends AssetManager {
    use BowerTrait;

    private $_bowerFolder = 'vendor/bower/';
    private $_vendorScriptFolder = 'public/vendor/';

    public function collection($name) {
        if( ! isset($this->_collections[$name])) {
            $collection  = new Collection($name);
            $this->_collections[$name] = $collection;
        }
        return $this->_collections[$name];
    }

    public function removeVendorFolder() {
        exec('rm -R ' . APP_PATH . 'public/vendor');
    }

    public function createBowerPackages() {
        $packages = $this->getBowerPackages()->toArray();
        mkdir(APP_PATH.$this->_vendorScriptFolder);
        foreach($packages as $package) {
            foreach($package as $type => $names) {
                foreach($names as $key => $path) {
                    var_dump([
                        'from' => APP_PATH.$this->_bowerFolder.$path.'.'.$type,
                        'to' => APP_PATH.$this->_vendorScriptFolder.$type.'/'.$key.'.'.$type
                    ]);
                    mkdir(APP_PATH.$this->_vendorScriptFolder.$type);
                    copy(
                        APP_PATH.$this->_bowerFolder.$path.'.'.$type,
                        APP_PATH.$this->_vendorScriptFolder.$type.'/'.$key.'.'.$type
                    );
                }

            }

        }
    }
}