<?php

use Phalcon\CLI\Task;

class AssetsTask extends Task
{
    public function cleanAction() {
//        $this->assets->removeVendorFolder();
        echo "\nClean vendor folder\n";
    }
}