<?php
    class aboutme extends Controller {
        public function index(){
            $this->view('home/aboutme', $this);

        }

        public function picture(){
            $github = "https://avatars2.githubusercontent.com/u/7249224?v=2&s=400";
            return $github;
        }
    }

?>
