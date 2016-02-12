<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Launch Calendar</title>

<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/full_calendar/fullcalendar.css" />
<link rel="stylesheet" media="print" href="<?php echo base_url();?>bootstrap/full_calendar/fullcalendar.print.css" />
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/full_calendar/cupertino/jquery-ui.min.css" />

<script src="<?php echo base_url();?>bootstrap/full_calendar/moment.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/full_calendar/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/full_calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/full_calendar/jquery-ui.custom.min.js"></script>

<script>

	$(document).ready(function() {
		var defaultDate = new Date();
        
        $('#calendar').fullCalendar({
			header: {
				left: 'prev,next',
				center: 'title',
				right: ''
                //left: 'prev,next today',
				//center: 'title',
				//right: 'month,basicWeek,basicDay'
			},
			defaultDate: defaultDate,
            editable: false,
			eventLimit: true, // allow "more" link when too many events
            events: <?php echo json_encode($events, true);?>
		});
		
	});

</script>

<style>
	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
</style>

</head>
<body>
    <div id="calendar"></div>
</body>
</html>