<?php


class grade extends controller
{
    public function __construct()
    {
        //echo "my god";
        parent::__construct();
    }

    public function index()
    {
        $result = $this->model->getMostNewStudentGrades();
        if (!empty($result)) {
            $this->view->array = $result;
            $this->view->render("grade/index");
        } else {
            $this->view->error = "Server Error";
        }
    }

    public function viewmore()
    {
        if (isset($_GET['lable'])) {
            switch ($_GET['lable']) {
                case 'Grade 6':
                    $temp = (date('Y') - 0);
                    break;
                case 'Grade 7':
                    $temp = (date('Y') - 1);
                    break;
                case 'Grade 8':
                    $temp = (date('Y') - 2);
                    break;
                case 'Grade 9':
                    $temp = (date('Y') - 3);
                    break;
                case 'Grade 10':
                    $temp = (date('Y') - 4);
                    break;
                case  'Grade 11':
                    $temp = (date('Y') - 5);
                    break;
                case 'Grade 12':
                    $temp = (date('Y') - 6);
                    break;
                case 'Grade 13':
                    $temp = (date('Y') - 7);
                    break;
                default:
                    $temp = 0;

            }

            $result = $this->model->getDataAccordingToBatch($temp);
            if (!empty($result)) {
                $this->view->array = $result;
                $this->view->render("grade/viewmore");
            } else {
                $this->view->error = "Server Error";
            }
        }


    }


}