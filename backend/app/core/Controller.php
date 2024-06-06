<?php
    class Controller {
        protected function model($model, $name) {
            require_once '../app/models/' . $model . '.php';
            return new $model($name);
        }

        protected function view($view, $data = []) {
            require_once '../app/views/' . $view . '.php';
        }
    }