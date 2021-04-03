<?php
extract($_POST);
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$select="SELECT ClassId,PNRNO,CUSTOMERNAME,AGE,GENDER,CITY,EMAILID,BusNo,ContactNo FROM customerdetails WHERE PNRNO='$Pnr'";
$result=mysqli_query($link,$select);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$select1="SELECT ClassName FROM classmaster WHERE ClassID=$row[ClassId]";
$result1=mysqli_query($link,$select1);
$row1=@mysqli_fetch_array($result1,MYSQLI_ASSOC);
if(mysqli_affected_rows($link)>0){
$str=<<<PNR
<div class='row'>
<div class='col-md-6'>
<div class='panel panel-primary'>
<div class='panel-heading'>
<b style="color:#fff;"><h3 class='text-center'>Your Status</h3></b>
</div>
<table  cellspacing="2" class='table table-responsive'>

<thead><tr style='background-color:#f1f1f1;'><td>BusNo :</td><td>$row[BusNo]</td></tr></thead>
<thead><tr style='background-color:#fff;'><td>Class :</td><td>$row1[ClassName]</td></tr></thead>

<thead><tr style='background-color:#f1f1f1;'><td>Name :</td><td>$row[CUSTOMERNAME]</td></tr></thead>
<thead><tr style='background-color:#fff;'><td>Age :</td><td>$row[AGE]</td></tr></thead>
<thead><tr style='background-color:#f1f1f1;'><td>Gender :</td><td>$row[GENDER]</td></tr></thead>
<thead><tr style='background-color:#fff'><td>City :</td><td>$row[CITY]</td></tr></thead>
<thead><tr style='background-color:#f1f1f1;'><td>EmailId :</td><td>$row[EMAILID]</td></tr></thead>
<thead><tr style='background-color:#fff;'><td>Mobile Number:</td><td>$row[ContactNo]</td></tr></thead>

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
    echo "<b><h2>Wrong PNR Number Entered</h2></b>";
    } 
?>
