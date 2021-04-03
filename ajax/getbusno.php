<?php
extract($_POST);
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$query="SELECT BusNo FROM busmaster where CompanyId=$CompanyId";
$data=mysqli_query($link,$query);
?>
<select id="bus2" name="Bus2" class="form-control selectpicker show-tick" data-live-search="true">
<option value="-1">Select Bus</option>
<?php
while($row=mysqli_fetch_assoc($data)){
?>
<option value="<?php echo $row['BusNo'] ?>"><?php echo $row['BusNo']; ?></option>
<?php    
}
?>
</select>
<script>
$('#bus2').selectpicker();
</script>