<?php

/**
 * Description of IndexController
 *
 * @author Vito
 */
class IndexController extends ControladorBase{
    //put your code here
    
    public function index(){
        
        $this->viewIndex("enlaces");
    }
    
    public function redUser(){ 
        $this->redirect("Usuarios", "index");
    }
    public function redRol(){ 
        $this->redirect("Roles", "index");
    }
}
