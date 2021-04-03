</div>
</body>
</html>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootbox.js"></script>
<script>
$('#dob').datepicker();
function test(){
    bootbox.confirm("Enter your user id:",function(result){
        if(result){
            
        }
    });
}
</script>