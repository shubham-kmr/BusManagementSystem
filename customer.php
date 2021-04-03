<?php //include("header.php") ?>

<?php
extract($_POST);
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-warning">
    <div class="panel-heading">
        <h3>Customer Details</h3>
    </div>
    <div class="panel-body">
        <form id="phpForms" name="phpForms" method="post">
        <input type="hidden" name="ClassId" id="classid" value="<?php echo $Class ?>" />
        <input type="hidden" name="BusNos" id="busnos" value="<?php echo $BusNo ?>" />
        <div class="row">
        
            <div class="col-md-12">
                <label>Name:</label>
                <input type="text" id="fname" name="Fname" class="form-control" />
            </div>
            
            <div class="col-md-12">
                <label>Age:</label>
                <input type="numeric" class="form-control" id="age" name="Age" />
            </div>
            <div class="col-md-12">
                <label>Gender:</label>
                <input type="radio" name="Gender" value="Male" />Male
                <input type="radio" name="Gender" value="Female" />Female
            </div>
            <div class="col-md-12">
                <label>City:</label>
                <input type="text" id="city" name="City" class="form-control" />
            </div>
            <div class="col-md-12">
                <label>Email:</label>
                <input type="email" class="form-control" id="email" name="Email" />
            </div>
            <div class="col-md-12">
                <label>Mobile:</label>
                <input type="int" class="form-control" id="mobile" name="Mobile" maxlength="10" />
            </div>
            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">
                <button type="button" id="btn_signup" class="btn btn-success" >Enter Details</button>
                <button type="submit" class="btn btn-danger">Reset</button>
            </div>
        </div>
        </form>
    </div>
</div>
    
    </div>
    <div class="col-md-6"> </div>
</div>
<?php include("partials/footer.php") ?>
<script>
$('#btn_signup').click(function(){
   if($('#fname').val()==""){
        bootbox.alert("Please enter your first name:");
        $('#fname').focus();
        return false;
   } 
   if($('#age').val()==""){
        bootbox.alert("Please enter your age:");
        $('#age').focus();
        return false;
   } 
   var gender=$('input:radio[name="Gender"]');
   var count=0;
   for(i=0;i<gender.length;i++){
        if(gender[i].checked){
            count=count+1;
        }
   }
   if(count==0){
        bootbox.alert("Select your gender:");
        return false;
   }
   if($('#city').val()==""){
        bootbox.alert("Please enter your city:");
        $('#city').focus();
        return false;
   } 
  
   if($('#email').val()==""){
        bootbox.alert("Please enter your email:");
        $('#email').focus();
        return false;
   } 
   if($('#mobile').val()==""){
        bootbox.alert("Enter your mobile number:");
        return false;
   }
   if($('#mobile').val().length<10){
      bootbox.alert("Mobile number must be 10 digit:");
      return false;
   }
   $.post("php/customerdetails.php",$('#phpForms').serialize(),function(response){
        bootbox.alert(response);
   }); 
});
</script>