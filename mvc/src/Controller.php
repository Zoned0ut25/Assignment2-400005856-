<?php

namespace App;

abstract class Controller
{
    protected $model = null;

    abstract protected function makeModel() : Model;

    protected function render($view, $data = [])
    {
        extract($data);

        include "Views/$view.php";
    }
}