<?php include("header.php");
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$query="SELECT STATIONID,CITY FROM busstationmaster ORDER BY STATIONNAME";
$data=mysqli_query($link,$query);
 ?>
<html>
<marquee style="font-family: serif;color: orange;font-size: x-large;;" scrollamount="10">Welcome  </marquee>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
    <div class="panel-heading">
        <h3>Book  Ticket:</h3>
    </div>
    <div class="panel-body">
        <form id="phpForm" name="phpForm" method="post">
        <div class="row">
            <div class="col-md-12">
                <label>From :</label>
                <div id="divcity">
                <select id="city" name="City" class="form-control selectpicker show-tick" data-live-search="true">
                    <option value="-1">Select Source</option>
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
                <?php
                $link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bus");
$query1="SELECT STATIONID,CITY FROM busstationmaster ORDER BY STATIONNAME";
$data1=mysqli_query($link,$query1);
 ?>
                
            <div class="col-md-12">
                <label>To :</label>
                <div id="divcity">
                <select id="city1" name="City1" class="form-control selectpicker show-tick" data-live-search="true">
                    <option value="-1">Select Destination</option>
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
                        <label>Date Of Journey:</label>
                        
                        <input type="text" id="doj" name="Doj" class="form-control datepicker" />
                    </div>
                    
            
            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">
                <button type="button" id="btn_search" class="btn btn-success btn-block" onclick="function()" >Search</button>
                
            </div>
            
        </div>
        </form>
    
</div>

    
    </div>
    
</div>
<div class="col-md-6">
    <div id="bookticket"></div>
</div>



</div>



</form>
<br />
<div class="container">
<div class="row">
  <div class="col-md-4">
  <b>Popular Routes:</b>
  <ul>
  <li style="color: crimson;">Greater Noida-Kanpur</li>
  <li style="color: crimson;">Lucknow-Allahabad</li>
  <li style="color: crimson;">Meerut-Gorakhpur</li>
  <li style="color: crimson;">Agra-Varanasi</li>
  <li style="color: crimson;">Allahabad-Noida</li>
  </ul>
  </div>
  <div class="col-md-4">
  
  <b>Our Travelling Partners:</b>
  <ul>
  <li style="color: blueviolet;">Shatabdi Travels</li>
  <li style="color: blueviolet;">Arora Travels</li>
  <li style="color: blueviolet;">Shivoy Travels</li>
  <li style="color: blueviolet;">Ashok Travels</li>
  <li style="color: blueviolet;">Sangam Travels</li>
  
  
  
  
  </ul>
  </div>

</div>




</html>



<?php include("partials/footer.php") ?>
<script>
$('#doj').datepicker();
    
$('#btn_search').click(function(){
   $.post("php/busbook.php",$('#phpForm').serialize(),function(response){
        //bootbox.alert(response);
        $('#bookticket').html(response);
   }); 
});
</script>

