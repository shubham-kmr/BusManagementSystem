<?php include ("header.php")?>
<html>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-warning">
    <div class="panel-heading">
        <h3>Login</h3>
    </div>
    <div class="panel-body">
        <form id="phpForm" name="phpForm" method="post">
        <div class="row">
            <div class="col-md-12">
                <label>User Id:</label>
                <input type="text" id="numeric" name="Numeric" class="form-control" />
            </div>
            <div class="col-md-12">
                <label>Password:</label>
                <input type="password" id="password" name="Password" class="form-control" />
            </div>
            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">
                <button type="button" id="btn_login" class="btn btn-success btn-block">Login</button>
                
            </div>
        </div>
        </form>
    </div>
</div>
    
    </div>
    <div class="col-md-6"> </div>
</div>
<h4>Want To Be A Member?<a href="signupadmin.php">SignUp</a></h4>
</html>
<?php include("partials/footer.php") ?>
<script>
$('#btn_login').click(function(){
   $.post("php/admin.php",$('#phpForm').serialize(),function(response){
        if(response==true){
            window.location="admin1.php";
        }
        else{
            bootbox.alert(response);
        
        }
});
});    
</script>    