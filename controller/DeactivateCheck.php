<?php
    session_start();
    include_once('../model/userService.php');

    if($_SESSION['log'])
    {
        $data = $_REQUEST['mydata'];
        $json = json_decode($data);
        if($json->password!='' && $_SESSION['password']==$json->password)
        {
            $status=deleteUser($_SESSION['id']);
            if($status)
            {
                $msg=json_encode(['msg'=>'pass']);
                echo $msg;
            }
            else
            {
                $msg=json_encode(['msg'=>'fail']);
                echo $msg;
            }
        }
    }
    else
    {
        header('location: ../index.php');
    }
?>