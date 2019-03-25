<?php
/*
 * Projects
 */

 class Project extends Controller {

    public function index(){
        $this->view('project/project_index', $this);
    }

    public function show($project=""){

         $this->view("project/".$project, $this);
    }

 }
