<?php
class studentclass extends controller{
    
    public function __construct(){
        //echo "hello";
        parent::__construct();
    }

    public function index($send=null){
        $this->loggedin("admin");

        $this->view->teacherList = $this->model->teacherList();

        $this->view->render("studentclass/index"); 
    }       

     public function create(){

       $this->loggedin("admin");
        $name=$_POST["name"];
        $year=$_POST["year"];
        $no_of_student=$_POST["no_of_student"];
        $medium=$_POST["medium"];
        $class_teacher_id=$_POST["class_teacher_id"];

        $this->classid=$this->model->insert_new_class($name,$year,$no_of_student,$medium,$class_teacher_id);

        $class_id = $this->classid;
        $this->view->class_detail = $this->model->get_class_details($class_id);
        $this->view->exsiting_classes = $this->model->get_all_classess($class_id,$year);
        $this->view->all_students = $this->model->get_all_students($year);
        $this->view->noofassignstudent = $this->model->getnoofassignstudent($class_id, $year);
        $this->view->render("studentclass/assignstudent"); 

    }

    public function studentclassview(){
        $this->loggedin("admin");
        $class_id = 14;
        $year = 2018;
        $class_detail = $this->model->get_class_details($class_id);
        $this->view->class_detail = $this->model->get_class_details($class_id);

        $this->view->exsiting_classes = $this->model->get_all_classess($class_id,$year);
        $this->view->all_students = $this->model->get_all_students($year);
        $this->view->noofassignstudent = $this->model->getnoofassignstudent($class_id, $year);

        $this->view->render("studentclass/assignstudent"); 
    }

    public function assignstudenttoclass(){
        $this->loggedin("admin");
        $stuid=$_POST["stuid"];
        $class_id = $_POST["class_id"];
        $year = $_POST["year"];

        $this->checkstudentvalid = $this->model->getstudentvalid($stuid);

        if (sizeof($this->checkstudentvalid) == 1) {

            $allreadyAssign = $this->model->getassignstudent($stuid,$year);

            $isexsit= sizeof($allreadyAssign);

            if ($isexsit == 0) {
                $this->assignclassid=$this->model->assign_student_to_new_class($stuid,$class_id,$year);

                if ($this->assignclassid){
                    $res = 200;
                }

            }else{
                $res = 300;
            }


            
        }else{
            $res = 400;
        }

        

        print_r($res);die();


        // print_r($_POST);die();
    }


    public function getexistingclassstudent(){
        $this->loggedin("admin");
        $class_id=$_POST["class_id"];
        $existing_class_id=$_POST["existing_class_id"];
        $year  =$_POST["year"];

        // print_r($_POST);die();

        $this->classstudents = $this->model->getstudentsofclass($existing_class_id);

        $classstudents = $this->classstudents;

        // print_r($classstudents);die();
       
        foreach ($classstudents as $key => $value) {
            $allreadyAssign = $this->model->getassignstudent($value['stuid'],$year);

            $isexsit= sizeof($allreadyAssign);

            if ($isexsit == 0) {
                $this->assignclassid=$this->model->assign_student_to_new_class($value['stuid'],$class_id,$year);

                if ($this->assignclassid){
                    $res = 200;
                }

            }else{
                $res = 300;
            }    
        }

        // print_r($this->classstudents);die();

    }

        
    }



?>