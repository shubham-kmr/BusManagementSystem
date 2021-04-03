<?php 
extract($_POST);
$Dates=$Doj;
$Day=date("l",strtotime($Doj));
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$select="SELECT DAYID FROM daymaster WHERE DAYNAME='$Day'";
$result=mysqli_query($link,$select);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$DayId=$row['DAYID'];
$select1="SELECT BM.BusNo,BM.BusName,BM.DepartureTime,BM.ArrivalTime,BM.SourceId,BM.DestinationId FROM busmaster BM INNER JOIN busdaymap BD ON BD.BUSNO=BM.BusNo WHERE SourceId=$City AND DestinationId=$City1 AND BD.DayId=$DayId ";
$result1=mysqli_query($link,$select1);
if(mysqli_affected_rows($link)>0){
    





    
$str=<<<BUS
<div class='row>
<div class='col-md-6'>
<div class='panel panel-primary'>
<div class='panel-heading'>
<h3 class='text-center'>Available Travellers</h3>
</div>
</div>
</div>
</div>





BUS;
echo $str;
$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
$str1=<<<DISP
<table class='table table-responsive'>
<tbody><tr style='background-color:#fff;'><td>Bus Number</td><td>$row1[BusNo]</td></tr>
<tr style='background-color:#fff;'><td>Bus Name</td><td>$row1[BusName]</td></tr>

<tr style='background-color:#fff;'><td>Departure Time</td><td>$row1[DepartureTime]</td></tr>
<tr style='background-color:#fff;'><td>Arrival Time</td><td>$row1[ArrivalTime]</td></tr>
<tr><td>Seater Fare </td>
DISP;
echo $str1;
    
$select2="SELECT Fare,NoOfSeats FROM busfaremap WHERE BusNo=$row1[BusNo] AND CLASSID=1 ";
$result2=mysqli_query($link,$select2);
$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
echo "<td>".$row2['Fare']."</td></tr>";

echo "<tr><td>Sleeper Fare </td>";
$select2="SELECT Fare,NoOfSeats FROM busfaremap WHERE BusNo=$row1[BusNo] AND CLASSID=2 ";
$result2=mysqli_query($link,$select2);
$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
echo "<td>".$row2['Fare']."</td></tr>";
echo "</tbody>";
echo "</table>";
$str2=<<<TEST
<button type="button" id="btn_submit" class="btn btn-success btn-block" onclick="BookSeater($row1[BusNo],1)" >Book Seater Ticket</button>
<!-- <button type="button" id="btn_submit" class="btn btn-success btn-block" onclick="BookSleeper($row1[BusNo],2)" >Book Sleeper Ticket</button> -->

TEST;
echo $str2; 
}


    else{
    mysqli_close($link);
    echo "<b><h2>Not Available</h2></b>";
    } 



//echo "<div class='text text-center'>2213</center>";
?>
<script>
function BookSeater(id,classid){
    $.post("customer.php",{BusNo:id,Class:classid},function(response){
        $('#bookticket').html(response);
    });
}
function BookSleeper(id,classid){
    $.post("customer.php",{BusNo:id,Class:classid},function(response){
        $('#bookticket').html(response);
    });
}
</script>