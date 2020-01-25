<?php


class allstudentclass extends Controller
{

    /**
     * topstudents constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        //$this->loggedin();

        $this->view->render("allstudentclass/index");

    }

    public function setClasses(){
        if(isset($_POST['submit']))
        {
            $i=0;
            $result = $this->model->getStudentIDAccordingtoBatch($_POST['batch']);
            foreach ($result as $key => $value)
            {
                $mod_val = $i%$_POST['count'];
                $created_year=date('Y');
                $this->model->setClasses($_POST['batch'],$mod_val,$created_year,$value[0]);
                $i++;
            }
            if ($i>0)
            {
                $this->view->msg = true;
                $this->view->render("allstudentclass/index");
            }

        }

    }
    public function getClassStudent()
    {

        if(isset($_POST['submit-search']))
        {
            $result = $this->model->getClassStudent($_POST['batch'],$_POST['class']);
            if (true)
            {
                $this->view->array = $result;
                $this->view->render("allstudentclass/viewmore");
            }
        }



    }

}