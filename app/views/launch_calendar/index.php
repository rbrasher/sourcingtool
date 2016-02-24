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
<script src="<?php echo base_url();?>bootstrap/full_calendar/fullcalendar.js"></script>
<script src="<?php echo base_url();?>bootstrap/full_calendar/jquery-ui.custom.min.js"></script>

<script>
$(document).ready(function() {
    var defaultDate = new Date();

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        //use this to set default date to nearest launch date <?php //echo json_encode($next_launch_product->start);?>,
        defaultDate: defaultDate,  
        theme: true,
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        events: <?php echo json_encode($events, true);?>,
        eventColor: 'green'
    });

    addClassesToTable();

    $('.fc-prev-button').click(function() {
        addClassesToTable();
    });

    $('.fc-next-button').click(function() {
        addClassesToTable();
    });

    function addClassesToTable() {
        $('.fc-event-container a').each(function(index, value) {
            var color = $(this).css('background-color');
            switch(color) {
                case 'rgb(195, 106, 10)':   //expected ship date
                    $(this).addClass('brown');
                    break;

                case 'rgb(141, 10, 195)':   //estimated arrival date
                    $(this).addClass('purple');
                    break;

                case 'rgb(0, 0, 255)':      //estimated date at fba
                    $(this).addClass('blue');
                    break;

                case 'rgb(0, 128, 0)':      //estimated launch date
                    $(this).addClass('green');
                    break;

                case 'rgb(0, 0, 0)':        //sourcing due date
                    $(this).addClass('black');
                    break;
            }
        });
    }



});

function toggleBlack() {
    $('.black').toggle('fast');
}

function toggleBrown() {
    $('.brown').toggle('fast');
}

function toggleBlue() {
    $('.blue').toggle('fast');
}

function toggleGreen() {
    $('.green').toggle('fast');
}

function togglePurple() {
    $('.purple').toggle('fast');
}
</script>

<style>
	body {
		margin: 10px 10px;
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
    <div style="float: left; width: 100%;">
        <a style="text-decoration: none;" href="<?php echo base_url();?>">&laquo; Dashboard</a>
    </div>
    <div style="float: left; width: 100%; text-align: center;" class="fc-button-group">
        <button style="padding: 5px; margin: 0;" type="button" class="ui-button ui-corner-left ui-state-default" onclick="toggleBlack();">Toggle Sourcing Due Date</button>
        <button style="padding: 5px; margin: 0 -5px;" type="button" class="ui-button ui-state-default" onclick="toggleBrown();">Toggle Expected Ship Date</button>
        <button style="padding: 5px; margin: 0;" type="button" class="ui-button ui-state-default" onclick="togglePurple();">Toggle Estimated Arrival Date</button>
        <button style="padding: 5px; margin: 0 -5px;" type="button" class="ui-button ui-state-default" onclick="toggleBlue();">Toggle Estimated Date at FBA</button>
        <button style="padding: 5px; margin: 0;" type="button" class="ui-button ui-corner-right ui-state-default" onclick="toggleGreen();">Toggle Estimated Launch Date</button>
    </div>
    
    <div style="float: left;width: 100%; height: 40px;">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Legend</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sourcing Due Date</td>
                    <td style="background: #000; width: 50px;"></td>
                </tr>
                
                <tr>
                    <td>Expected Ship Date</td>
                    <td style="background: #c36a0a; width: 50px;"></td>
                </tr>
                
                <tr>
                    <td>Estimated Arrival Date</td>
                    <td style="background: #8d0ac3; width: 50px;"></td>
                </tr>
                
                <tr>
                    <td>Estimated Date at FBA</td>
                    <td style="background: blue; width: 50px;"></td>
                </tr>
                
                <tr>
                    <td>Estimated Launch Date</td>
                    <td style="background: green; width: 50px;"></td>
                </tr>
            </tbody>
        </table>
        <br /><br />
        <strong>Next Launch Date:</strong> <?php echo $next_launch_product->start;?><br /><strong>Product:</strong> <?php echo $next_launch_product->title;?>
    </div>
    
    <div id="calendar"></div>
</body>
</html>