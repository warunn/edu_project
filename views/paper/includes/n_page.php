<?php
class n_page{
    public $per_page;
    public $page;
    public $total_count;
    
    public function __construct($page,$per_page,$total_count){
        $this->page=$page;
        $this->per_page=$per_page;
        $this->total_count=$total_count;
    }
    public function offset(){
        return ($this->page-1);
    }
    
    public function next_page(){
        $this->page=$this->page+1;
    }
    public function previous_page(){
        $this->page=$this->page-1;
    }
    public function has_next_page(){
        return $this->page+1 <= $this->total_count ? true : false ;
    }
    public function has_previous_page(){
        return $this->page-1 > 0 ? true : false ;
    }
    public function total_pages(){
        return $this->total_count/$this->per_page;
    }
}
?>