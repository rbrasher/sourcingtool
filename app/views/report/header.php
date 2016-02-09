<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Sourcing Tool</title>

<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap-theme.min.css" />
<!--<link rel="stylesheet" href="<?php //echo base_url();?>bootstrap/css/styles.css" />-->
<!--<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/jquery.dataTables.css" />-->

<script type="text/javascript" language="javascript" src="<?php echo base_url();?>bootstrap/js/jquery-1.11.1.min.js"></script>
<!--<script type="text/javascript" language="javascript" src="<?php //echo base_url();?>bootstrap/js/jquery.dataTables.min.js"></script>-->

<script>
    $(document).ready(function() {
        
        $('#toggle').click(function(e) {
            e.preventDefault();
            
            $(".manu").fadeToggle("fast");
        });
//        $('#MyDT').DataTable({
//            "autoWidth": false,
//            "paging": false,
//            //"ordering": false
//        });
    });


</script>
<style>
/*#MyDT_filter {float: left; margin-left: 20px;}
#MyDT th, #MyDT tr {text-align: center; padding: 0 20px;}*/
.centered {text-align: center;}
th, td {float: left;}
th {text-align: center;}
</style>
</head>
<body>
