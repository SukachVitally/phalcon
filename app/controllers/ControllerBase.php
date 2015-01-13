<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected function sendJson(array $data)
    {
        $this->view->disable();
        $this->response->setJsonContent($data);
        $this->response->send();
    }
}
