<?php
extract($_POST);
$tt=$_POST['Aot'];
$tt=date('H:i:s',strtotime($tt));
$dt=$_POST['Dot'];
$dt=date('H:i:s',strtotime($dt)); 
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$query1="SELECT CompanyName from companymaster where CompanyId=$Comp";
$result1=mysqli_query($link,$query1);
$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
$str=@explode(" ",$row1[CompanyName]);



$query="insert into busmaster
(BusNo,BusName,CompanyId,SourceId,DestinationId,DepartureTime,ArrivalTime)values('$Bus','$str[0]',
$Comp,$City,$City1,'$dt','$tt')";
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