<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->assets
            ->addCss('vendor/css/bootstrap.css')
            ->addCss('css/main.css');

        $this->assets->collection('header')
            ->addJs('vendor/js/jquery.min.js');

        $this->assets->collection('footer')
            ->addJs('vendor/js/bootstrap.js')
            ->addJs('vendor/js/spin.js')
            ->addJs('vendor/js/jquery.spin.js')
            ->addJs('vendor/js/underscore.js')
            ->addJs('vendor/js/backbone.js')
            ->addJs('vendor/js/backbone.picky.min.js')
            ->addJs('vendor/js/backbone.localStorage-min.js')
            ->addJs('vendor/js/backbone.syphon.js')
            ->addJs('vendor/js/backbone.marionette.js')
            ->addJs('js/apps/config/marionette/templateCache.js')
            ->addJs('js/app.js')
            ->addJs('js/templates/templates.js')
            ->addJs('js/entities/header.js')
            ->addJs('js/entities/product.js')
            ->addJs('js/common/views.js')
            ->addJs('js/apps/products/products_app.js')
            ->addJs('js/apps/products/list/list_view.js')
            ->addJs('js/apps/products/list/list_controller.js')
            ->addJs('js/apps/header/header_app.js')
            ->addJs('js/apps/header/list/list_view.js')
            ->addJs('js/apps/header/list/list_controller.js');
    }

}

