<?php include("header.php") ?>
<html>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-warning">
    <div class="panel-heading">
        <h3>CANCEL TICKET</h3>
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
                <button type="button" id="btn_cancel" class="btn btn-success btn-block">Cancel Ticket</button>
                
            </div>
                
            
            </div>
            </div>
            </div>
            </div>
            </div>
            </form>

</html>
<?php include("partials/footer.php") ?>
<script>
$('#btn_cancel').click(function(){
    $.post("php/cancelticket.php",$('#phpForm').serialize(),function(response){
        bootbox.alert(response);
        
        });
        
});
</script>