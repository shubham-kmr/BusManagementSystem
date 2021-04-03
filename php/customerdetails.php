<?php
extract($_POST);
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$pnrno=rand(1000000000,9999999999);
$Fname=ucwords($Fname);
$query="insert into customerdetails
(PNRNO,CustomerName,Age,Gender,City,EmailId,ContactNo,classid,busno)values('$pnrno',
'$Fname','$Age','$Gender','$City','$Email',
'$Mobile',$ClassId,$BusNos)";
mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    mysqli_close($link);
    echo "Details successfully entered:";
}
else{
    mysqli_close($link);
    echo "Details not uploaded:";
}
?>