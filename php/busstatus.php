<?php
extract($_POST);
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$select="SELECT BusNo,CompanyId,SourceId,DestinationId,ArrivalTime,DepartureTime FROM busmaster WHERE BusNo='$Busno'";
$result=mysqli_query($link,$select);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$select1="SELECT CompanyName FROM companymaster WHERE CompanyID=$row[CompanyId]";
$result1=mysqli_query($link,$select1);
$row1=@mysqli_fetch_array($result1,MYSQLI_ASSOC);
$select2="SELECT StationName FROM busstationmaster WHERE StationID=$row[SourceId]";
$result2=mysqli_query($link,$select2);
$row2=@mysqli_fetch_array($result2,MYSQLI_ASSOC);
$select3="SELECT StationName FROM busstationmaster WHERE StationID=$row[DestinationId]";
$result3=mysqli_query($link,$select3);
$row3=@mysqli_fetch_array($result3,MYSQLI_ASSOC);
if(mysqli_affected_rows($link)>0){

//print_r($row);
$str=<<<PNR
<div class='row'>
<div class='col-md-6'>
<div class='panel panel-primary'>
<div class='panel-heading'>
<b style="color:#fff;"><h3 class='text-center'>Your Status</h3></b>
</div>
<table  cellspacing="2" class='table table-responsive'>

<thead><tr style='background-color:#f1f1f1;'><td>BusNo :</td><td>$row[BusNo]</td></tr></thead>


<thead><tr style='background-color:#fff;'><td>Company Name :</td><td>$row1[CompanyName]</td></tr></thead>
<thead><tr style='background-color:#f1f1f1;'><td>Source :</td><td>$row2[StationName]</td></tr></thead>
<thead><tr style='background-color:#fff;'><td>Destination :</td><td>$row3[StationName]</td></tr></thead>
<thead><tr style='background-color:#f1f1f1;'><td>Arrival Time :</td><td>$row[ArrivalTime]</td></tr></thead>
<thead><tr style='background-color:#fff;'><td>Departure Time :</td><td>$row[DepartureTime]</td></tr></thead>


<tbody><tr></tr></tbody>
</table>

</div>
</div>
</div>
PNR;
echo $str;
}
 else{
    mysqli_close($link);
    echo "<b><h2>No Such Bus Found</h2></b>";
    } 
?>
