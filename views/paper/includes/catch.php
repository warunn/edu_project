<?php
//need to be upload
require_once("initial.php");
//print_r($_POST);
                if(isset($_POST['recaptcha']) && !empty($_POST['recaptcha'])):
               // echo $_POST['recaptcha'];
                //echo "<br/><p>abc</p>";
                    //your site secret key
                    $secret = '6Lc1bjMUAAAAAKWxjxBBOMx3KFLBR0SEJYXYUuWl';
                    //get verify response data
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['recaptcha']);
                    $responseData = json_decode($verifyResponse);
                    //echo $verifyResponse;
                    //print_r($responseData);
                    if($responseData->success):
                    
                        $cbox=$_POST["cbox"];
                        $id=$_POST["id"];
                        $pic_id=$_POST["pic_id"];
                        $dbCon = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                        $date=date("Y-m-d");
                        $writer=$_SESSION['FBID'];
                        $sql="insert into pic_comment(id,pic_id,comment,visible,date,writer) values({$id},{$pic_id},'{$cbox}',0,'{$date}',$writer) ";
                        $sth=$dbCon->prepare($sql);
                        $sth->execute();
                        $obj_array=$sth->fetch();
                        //print_r($obj_array);
                        
                        
                        echo 'Your comment submitted successfully <br> it will be displayed soon.';
                    else:
                        echo 'verification failed, please try again.';
                    endif;
                else:
                    echo 'Please click on the CAPTCHA box.';
                endif;
           





?>