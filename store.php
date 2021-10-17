<?php  session_start();?>
<?php include "database.php"; 
@$name=$_POST['username'];
@$password=$_POST['password'];
@$email=$_POST['email'];
@$dob=$_POST['dob'];
@$mobile=$_POST['mobile'];

if(isset($_POST['signup']))
{
$sql="INSERT INTO crud(name,email,password,phone,dob) VALUES('$name','$email','$password','$mobile','$dob')";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
}
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$query="SELECT * FROM crud where name='$username' and password='$password' ";
$result=mysqli_query($conn, $query);
if(mysqli_fetch_assoc($result) > 0)
{
    echo json_encode(array("statusCode"=>200));
    $_SESSION['username']=$username;


}
else
{
    echo json_encode(array("statusCode"=>201));

}
}

$conn->close();
?>
