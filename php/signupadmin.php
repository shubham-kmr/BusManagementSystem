<?php include ("header.php")?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-warning">
    <div class="panel-heading">
        <h3>Signup</h3>
    </div>
    <div class="panel-body">
        <form id="phpForm" name="phpForm" method="post">
        <div class="row">
            <div class="col-md-12">
                <label>Enter Company Name:</label>
                <input type="text" id="fname" name="Fname" class="form-control" />
            </div>
            <div class="col-md-12">
                <label>Enter Admin Name:</label>
                <input type="text" id="lname" name="Lname" class="form-control" />
            </div>
            <div class="col-md-12">
                <label>Select Gender:</label>
                <input type="radio" name="Gender" value="Male" />Male
                <input type="radio" name="Gender" value="Female" />Female
            </div>
            <div class="col-md-12">
                <label>Enter Mobile:</label>
                <input type="numeric" class="form-control" id="mobile" name="Mobile" maxlength="10" />
            </div>
            
            <div class="col-md-12">
                <label>Enter Company Email:</label>
                <input type="email" class="form-control" id="email" name="Email" />
            </div>
            <div class="col-md-12">
                <label>Set Password:</label>
                <input type="password" class="form-control" id="password" name="Password" maxlength="20" />
            </div>
            <div class="col-md-12">
                <label>Confirm Password:</label>
                <input type="password" class="form-control" id="cpassword" name="Cpassword" />
            </div>
            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">
                <button type="button" id="btn_signup" class="btn btn-success" onclick="function()">Signup</button>
                <button type="submit" class="btn btn-danger">Reset</button>
            </div>
           
        </div>
        </form>
       
</div>
    
    </div>
    <div class="col-md-6"> </div>
     
</div>
<div class="col-md-6">
                <b><h2>Sorry this service is currently not available</h2></b> 
    </div>
</div>


<?php include("partials/footer.php") ?>