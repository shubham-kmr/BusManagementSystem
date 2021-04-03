<?php
if(!session_id())
    session_start();
extract($_POST);
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$query="select AdminID,AdminName,Password from admindetails where AdminId='$Numeric'";
$data=mysqli_query($link,$query);
if(mysqli_num_rows($data)>0){
    $row=mysqli_fetch_assoc($data); 
    if($Password!=$row['Password']){
        echo "Password is invalid";
        die();
    } 
    $_SESSION['adminid']=$row['AdminID'];
    $_SESSION['Uname']=$row['AdminName'];
    echo true;
  
}
else{
    echo "User Id is invalid:";
}
?>