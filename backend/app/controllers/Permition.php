<?php
    class Permition extends Controller{

        public function registration($name = '') {
            $user = $this->model('User', $name);
            $user->registration_new_persone();
        }

        public function login($name = '') {
            $user = $this->model('User', $name);
            $user->authentication();
        }

        public function info($name = '') {
            $user = $this->model('User', $name);
            $user->get_info();
        }

        public function history($name = '') {
            $user = $this->model('User', $name);
            $user->get_history();
        }
    }