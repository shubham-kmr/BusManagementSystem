<?php include("header.php") ?>
<html>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-warning">
    <div class="panel-heading">
        <h3>PNR STATUS</h3>
    </div>
    <div class="panel-body">
        <form id="phpForm" name="phpForm" method="post">
        <div class="row">
            <div class="col-md-12">
                <label>Enter Your PNR:</label>
                <input type="numeric" id="pnr" name="Pnr" class="form-control" />
                </div>
                 <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12">
                <button type="button" id="btn_status" class="btn btn-success btn-block">Get Status</button>
                
            </div>
                
            
            </div>
            </div>
            </div>
            </div>
            </div>
            <div id="pnrstatus"></div>
            </form>

</html>
<?php include("partials/footer.php") ?>
<script>
$('#btn_status').click(function(){
    $.post("php/pnrstatus.php",$('#phpForm').serialize(),function(response){
        //bootbox.alert(response);
        $('#pnrstatus').html(response);
        });
        
});
</script>