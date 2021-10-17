<?php include "database.php"; 

//this if for email

if(isset($_POST['check_submit_btn']))
{
    $email=$_POST['email_id'];
    $email_query="SELECT * FROM crud where email='$email'";
    $email_query_run=mysqli_query($conn,$email_query);
    if(mysqli_fetch_assoc($email_query_run) >0)
    {
        echo json_encode(array("status"=>1));
    }
    else
    {
        echo json_encode(array("status"=>0));
    }
}
//this if for username
if(isset($_POST['submit_btn']))
{
    $username=$_POST['username'];
    $string=strlen($username);
    $username_query="SELECT * FROM crud where name ='$username'";
    $username_query_run=mysqli_query($conn,$username_query);
    if(mysqli_fetch_assoc($username_query_run) >0)
    {
        echo json_encode(array("status"=>1 ));
    }
    else
    {
        echo json_encode(array("status"=>0,"strlen"=>$string));
    }
}
//this if for mobile

if(isset($_POST['submit']))
{
    $mobile=$_POST['mobile'];
    $mobile_query="SELECT * FROM crud where phone ='$mobile'";
    $mobile_query_run=mysqli_query($conn,$mobile_query);
    if(mysqli_fetch_assoc($mobile_query_run) >0)
    {
        echo json_encode(array("status"=>1));
    }
    else
    {
        echo json_encode(array("status"=>0));
    }
}
if(isset($_POST['password']))
{
    $password=$_POST['password'];
    $string=strlen($password);
    echo json_encode(array("strlen"=>$string));
    
}
$conn->close();
?>
