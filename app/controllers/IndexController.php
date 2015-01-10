<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->assets
            ->addBowerCss('bootstrap')
            ->addCss('css/main.css');

        $this->assets->collection('header')
            ->addBowerJs('jquery');

        $this->assets
            ->addBowerJs('bootstrap')
            ->addBowerJs('spin')
            ->addBowerJs('jquery.spin')
            ->addBowerJs('underscore')
            ->addBowerJs('backbone')
            ->addBowerJs('backbone.picky')
            ->addBowerJs('backbone.localStorage')
            ->addBowerJs('backbone.syphon')
            ->addBowerJs('backbone.marionette')
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

