<?php include("header.php");
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$query="SELECT STATIONID,CITY FROM busstationmaster ORDER BY STATIONNAME";
$data=mysqli_query($link,$query);
$data1=mysqli_query($link,$query);
$query1="SELECT AdminName,AdminID FROM admindetails ORDER BY AdminName";
$data2=mysqli_query($link,$query1);
$query2="SELECT CompanyId,CompanyName FROM companymaster ORDER BY CompanyName";
$data3=mysqli_query($link,$query2);
?>
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="panel panel-warning">
    <div class="panel-heading">
        <h3>ADD NEW HEALTHCARE TRAVELLER</h3>
    </div>
    <div class="panel-body">
        <form id="phpForm1" name="phpForm1" method="post">
        <div class="row">
            <div class="col-md-12">
                <label>Enter Company Name:</label>
                <div id="divcomp">
                <select id="comp" name="Comp" class="form-control selectpicker show-tick" data-live-search="true">
                    <option value="-1"> Company Name</option>
                    <?php
                 while($row2=mysqli_fetch_array($data2,MYSQLI_ASSOC)){
                    ?>
                    <option value="<?php echo $row2['AdminID'] ?>"><?php echo $row2['AdminName']; ?></option>
                    <?php
                 } 
                 ?>
                </select>
                </div>
                </div>
                 <div class="col-md-12">
                <label>Enter Source:</label>
                <div id="divcity">
                <select id="city" name="City" class="form-control selectpicker show-tick" data-live-search="true">
                    <option value="-1"> Source</option>
                    <?php
                 while($row=mysqli_fetch_array($data,MYSQLI_ASSOC)){
                    ?>
                    <option value="<?php echo $row['STATIONID'] ?>"><?php echo $row['CITY']; ?></option>
                    <?php
                 } 
                 ?>
                </select>
                </div>
                </div>
                 <div class="col-md-12">
                <label style="foreground-color:white">Enter Destination:</label>
                <div id="divcity">
                <select id="city1" name="City1" class="form-control selectpicker show-tick" data-live-search="true">
                    <option value="-1"> Destination</option>
                    <?php
                 while($row1=mysqli_fetch_array($data1,MYSQLI_ASSOC)){
                    ?>
                    <option value="<?php echo $row1['STATIONID'] ?>"><?php echo $row1['CITY']; ?></option>
                    <?php
                 } 
                 ?>
                </select>
                </div>
                
                </div>
                <div class="col-md-12">
                        <label>Enter Traveller no:</label>
                        
                        <input type="numeric" id="bus" name="Bus" class="form-control datepicker" />
                    </div>
                    
                    
                      <div class="col-md-12">
                        <label>Departure Time:</label>
                        
                        <input type="time" id="dot" name="Dot" class="form-control datepicker" />
                    </div>
                    <div class="col-md-12">
                        <label>Arrival Time:</label>
                        
                        <input type="time" id="aot" name="Aot" class="form-control datepicker" />
                    </div>
                 <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12">
                <button type="button" id="btn_add" class="btn btn-success btn-block" >Add Bus</button>


</div>
</div>
</div>
</div>
</div>
</form>
    <div class="col-md-6">
        <div class="panel panel-warning">
    <div class="panel-heading">
        <h3>CANCEL HEALTHCARE TRAVELLER</h3>
    </div>
    <div class="panel-body">
        <form id="phpForm2" name="phpForm2" method="post">
        <div class="row">
            <div class="col-md-12">
                <label>Enter Your Company:</label>
                 <div id="divcomp1">
                <select id="comp1" name="Comp1" class="form-control selectpicker show-tick" data-live-search="true">
                    <option value="-1">Company Name</option>
                    <?php
                 while($row3=mysqli_fetch_array($data3,MYSQLI_ASSOC)){
                    ?>
                    <option value="<?php echo $row3['CompanyId'] ?>"><?php echo $row3['CompanyName']; ?></option>
                    <?php
                 } 
                 ?>
                </select>
                </div>
                </div>
                <div class="col-md-12">
                <label>Select Bus</label>
                <div id="divbus">
                <select id="bus1" name="Bus1" class="form-control selectpicker show-tick" data-live-search="true">
                    <option value="-1">Select Bus</option>
                   
                </select>
                </div>
                </div>
                
                 <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12">
                <button type="button" id="btn_cancel" class="btn btn-success btn-block" >Cancel Bus</button>
                
            </div>
                
            
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            
        
            </form>

<?php include("partials/footer.php") ?>
<script>
$('#comp1').change(function(){
    $.post('ajax/getbusno.php',{'CompanyId':$(this).val()},function(resp){
       $('#divbus').html(resp); 
    });
})
$('#btn_cancel').click(function(){
   $.post("php/cancelbus.php",$('#phpForm2').serialize(),function(response){
        bootbox.alert(response);
});
});    
$('#btn_add').click(function(){
   $.post("php/addbus.php",$('#phpForm1').serialize(),function(response){
        bootbox.alert(response);
});
});            
</script>