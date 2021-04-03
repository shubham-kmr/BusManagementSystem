<?php
extract($_POST);
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$query="DELETE FROM customerdetails WHERE PNRNO IN ($Pnr)";
mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    mysqli_close($link);
    echo "Your Ticket Is Cancelled Successfully:";
}
else{
    mysqli_close($link);
    echo "No such PNR found:";
}


?>