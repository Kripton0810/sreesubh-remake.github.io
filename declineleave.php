<?php
include 'dbcon.php';
    // $email = $_POST['email'];
    // $rd = $_POST['raised'];
    $email = "subhankar0810@gmail.com";
    $rd = "2021-11-13";
    $q = "UPDATE leave_management SET admin_check = 1 , status = 0 WHERE raised_by = '{$email}' and raised_date = '{$rd}'";
    $run = mysqli_query($con,$q);
    if($run)
    {
        $send = mail($email,"Leave Decline!!","Sorry your leave for dated: ".$rd." has been declined <br>-Thank you");
        if($send)
        {
            echo "mail send";
            header("HTTP/1.0 200 update success");
            $mes['message'] = "Leave Decline!! ".$run;
        }
        else
        {
            echo "error in sending";
            header("HTTP/1.0 404 mail send error");
            $mes['message'] = "data updated!! but mail not send!!";

        }
    }
    else
    {
        echo "error in server"; 
        header("HTTP/1.0 404 server error");
        $mes['message'] = "Error while update!!";
    }
?>