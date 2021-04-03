<?php include("header.php") ?>
<br />
<br />
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-warning">
    <div class="panel-heading">
        <h3>Bus Status</h3>
    </div>
    <div class="panel-body">
        <form id="phpForm" name="phpForm" method="post">
        <div class="row">
            <div class="col-md-12">
                <label>Enter Bus Number:</label>
                <input type="text" id="busno" name="Busno" class="form-control" />
            </div>
            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">
                <button type="button" id="btn_login" class="btn btn-success btn-block">Get Status</button>
                
            </div>
        </div>
        
        </form>
    </div>
</div>
    
    </div>
    
    <div class="col-md-6"> </div>
   
</div>
 <div id="busstatus"></div>
<?php include("partials/footer.php") ?>
<script>
$('#btn_login').click(function(){
    $.post("php/busstatus.php",$('#phpForm').serialize(),function(response){
        //bootbox.alert(response);
        $('#busstatus').html(response);
        });
        
});
</script>

