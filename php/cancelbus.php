<?php
extract($_POST);
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$query="DELETE from busmaster where BusNo=$Bus2";
mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    mysqli_close($link);
    echo "Bus Cancelled";
}
else{
    mysqli_close($link);
    echo "Not Cancelled";
}




?>