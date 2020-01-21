<?php
class spage extends controller{
    
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        
    }
    public function principal(){
        $this->view->render("spage/principal"); 
    }
    public function wallpapers(){
        $this->view->render("spage/wallpapers");
    }
    public function oldphotos(){
        $this->view->render("spage/oldphotos");
    }
    public function contact(){
        $this->view->render("spage/contact");
    }
    public function sports(){
        $this->view->render("spage/sports");
    }
    public function pccs(){
        $this->view->render("spage/pccs");
    }
}
