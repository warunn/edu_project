<?php
class Studentmarks extends controller{
    
    public function __construct(){
        //echo "hello";
        parent::__construct();
    }

    public function index($send=null){

        $this->loggedin("teacher");

        $this->view->classList = $this->model->classList(Session::get('uid'));

        // print_r($this->view->classList);die();

        $this->view->render("studentmarks/index"); 
    }


    public function getstudents(){
        $this->loggedin("teacher");

        $class_id =$_POST['class_id'];
        // $this->view->classList = $this->model->studentList($class_id);
        $this->student_list = $this->model->studentList($class_id);

        // $this->view->render("studentmarks/marks");
        $student_list = $this->student_list;

        $out = '';

        $out .= '<tr><th>Addmission No</th><th>Name</th><th>Marks</th> <th>Report</th></tr>';

        foreach ($student_list as $key => $value) {

            $student_detail = $this->model->studentbyid($value['stuid']);
            $avg = '';
            // $student_detail = $this->$student_detail;

            $out .= '<tr><td>'.$value['stuid'].'</td><td>'.$student_detail[0]['nameint'].'</td><td><a href=" '.URL.'studentmarks/marks?stuid='.$value['stuid'].'&&claas_id='.$class_id.'"><button>Add Mark</button></a><a href=" '.URL.'studentmarks/marksview?stuid='.$value['stuid'].'&&claas_id='.$class_id.'"><button>View Reports</button></a></td>';
            $out .= '</tr>';
        }

        echo json_encode(array('table'=>$out));
    }

    public function marks(){

        $this->loggedin("teacher");

        $stu_id = $_GET['stuid'];
        $class_id = $_GET['claas_id'];

        $this->view->student_details = $this->model->studentbyid($stu_id);
        $this->view->subject = $this->model->getsubjectMain();
        $this->view->subjectc1 = $this->model->getsubjectC1();
        $this->view->subjectc2 = $this->model->getsubjectC2();
        $this->view->subjectc3 = $this->model->getsubjectC3();
        $this->view->subjectl1 = $this->model->getsubjectL1();
        $this->view->subjectr1 = $this->model->getsubjectR1();
        $this->view->render("studentmarks/marks");
    }


    public function marksview(){

        $this->loggedin("teacher");

        $stu_id = $_GET['stuid'];
        $class_id = $_GET['claas_id'];

        $this->view->student_details = $this->model->studentbyid($stu_id);

        $this->view->total1 = $this->model->getTotalmarksTerm1($stu_id,$class_id);
        $this->view->total2 = $this->model->getTotalmarksTerm2($stu_id,$class_id);
        $this->view->total3 = $this->model->getTotalmarksTerm3($stu_id,$class_id);

        $this->view->avg1 = $this->model->getAvgmarksTerm1($stu_id,$class_id);
        $this->view->avg2 = $this->model->getAvgmarksTerm2($stu_id,$class_id);
        $this->view->avg3 = $this->model->getAvgmarksTerm3($stu_id,$class_id);

        $this->view->render("studentmarks/report");
    }


    public function addmarktostudent(){
        $this->loggedin("teacher");
        $stuid =$_POST['stuid'];
        $class_id =$_POST['class_id'];
        $subid =$_POST['subid'];
        $term =$_POST['term'];
        $mark =$_POST['mark'];

        $allreadyAdd = $this->model->getstudentmark($stuid,$class_id,$subid,$term);
        $isexsit= sizeof($allreadyAdd);

        if ($isexsit == 0) {
                $this->addmark=$this->model->addmarktosub($stuid,$class_id,$subid,$term,$mark);

                if ($this->addmark){
                    $res = 200;
                }

        }

        print_r($res);die();

    }    

    

        
}



?>