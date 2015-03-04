<script>
/*
 *  Document   : compCalendar.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Calendar page
 */
 	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	
	//alert(new Date(2014, 10));
	
var CompCalendar = function() {
    var calendarEvents  = $('.calendar-events');

    /* Function for initializing drag and drop event functionality */
    var initEvents = function() {
        calendarEvents.find('li').each(function() {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            var eventObject = { title: $.trim($(this).text()), color: $(this).css('background-color') };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({ zIndex: 999, revert: true, revertDuration: 0 });
        });
    };

    return {
        init: function() {
            /* Initialize drag and drop event functionality */
            initEvents();

            /* Add new event in the events list */
            var eventInput      = $('#add-event');
            var eventInputVal   = '';
			<?php /*
            // When the add button is clicked
            $('#add-event-btn').on('click', function(){
                // Get input value
                eventInputVal = eventInput.prop('value');

                // Check if the user entered something
                if ( eventInputVal ) {
                    // Add it to the events list
                    calendarEvents.append('<li class="animation-slideDown">' + $('<div />').text(eventInputVal).html() + '</li>');

                    // Clear input field
                    eventInput.prop('value', '');

                    // Init Events
                    initEvents();
                }

                // Don't let the form submit
                return false;
            });*/?>

            /* Initialize FullCalendar */
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({//events: source,
            	//height: 500,
            	//allDaySlot:false,
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'agendaDay,agendaWeek,month'
                    //right: 'agendaDay,agendaWeek,month'
                },
                defaultView: 'month',
                firstDay: 1,
                <?php /*
                editable: true,
                droppable: true,
                drop: function(date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // remove the element from the "Draggable Events" list
                    $(this).remove();
                },*/?>
                events: [
                <?php
                	if(!empty($Tasks)){
                	foreach($Tasks as $Task){?>
	                    {
	                    	
	                    	<?php 
	                    	$data = explode("\r",$Task->description);?>
	                    	
	                        title: "<?php echo substr($data[0],0,10);?>",
	                        start: new Date(<?php echo $Task->display_full_calendar;?>),
	                        //end: new Date(2014, 10, 9),
	                        allDay: false,
	                        dateEVENT: '<?php echo date('d/m/Y',strtotime($Task->date)).' '.date('g:i a',strtotime($Task->time));?>',
	                        color: '<?php echo Tools::rand_color();?>',
	                        tooltip: '<?php echo date('d/m/Y',strtotime($Task->date)).' '.date('g:i a',strtotime($Task->time)).', '.$Task->display_agent;?>',
	                        dataContent:"<?php echo $data[0];?>",
	                        dataToggle:'popover',
	                        dataPlacement:'top',
	                        agentName : '<?php echo $Task->display_agent;?>',
	                        categoryEvent : '<?php echo $Task->display_event->event_name;?>',
	                        google_calendar_id:'<?php echo $Task->google_calendar_id;?>',
	                        data_id:'<?php echo $Task->id;?>'
	                    },
                <?php }} ?>
                 
                    <?php /*
                    {
                        title: 'Black Dog (Bruce)',
                        start: new Date(y, m, d, 16, 00),
                        allDay: false,
                        color: '#f39c12'
                    },
                    
                    {
                        title: 'Ros (Joel Martin)',
                        start: new Date(y, m, 4),
                        end: new Date(y, m, 8),
                        color: '#1abc9c'
                    },
                    
                    {
                        id: 999,
                        title: 'Biri (Gusman)',
                        start: new Date(y, m, d - 3, 15, 0),
                        allDay: false
                    },
                    
                    {
                        id: 999,
                        title: 'Biri (Gusman)',
                        start: new Date(y, m, d + 3, 15, 0),
                        allDay: false
                    },
                    
                    {
                        title: 'Bleki(Billy Mart),Bleki Brother (Billy Mart)',
                        start: new Date(y, m,27),
                        end: new Date(y, m,31),
                        allDay: true,
                        color: '#d35400'
                    },
                    
                    {
                        title: 'Goro (Osman)',
                        start: new Date(y, m, 15),
                        end: new Date(y, m, 20),
                        allDay: true,
                        color: '#3498db'
                    },
                    
                    {
                        title: 'Jiro (Kouta)',
                        start: new Date(y, m ,21),
                        end: new Date(y, m, 25),
                        allDay: true
                    },
                    */
                    ?>
                    /*
                    {
                        title: 'Follow me on Twitter',
                        start: new Date(y, m, 20),
                        end: new Date(y, m, 24),
                        url: 'http://twitter.com/pixelcave',
                        color: '#e74c3c'
                    }*/
                ],
                 
                eventRender: function(event, element) {
			        element.attr({
			        	'href':'javascript:void(0)',
			        	'title':event.tooltip,
			        	'data-content':event.dataContent,
			        	//'data-toggle':event.dataToggle,
			        	//'data-placement':event.dataPlacement,
			        });
			         
			        element.click(function(){
			        	$(".view-x").html("<span class='label label-success info-success'></span><span class='label label-warning info-error'></span><div class='clearfix'></div><b>For : </b>"+event.agentName+'<br><b>Category : </b>'+event.categoryEvent+'<br><br><i>*Message</i><br>'+event.dataContent+'<div class="pull-right button-edit-event"><a href="#" dataID="'+event.data_id+'" googleID="'+event.google_calendar_id+'" class=\'btn btn-success btn-xs edit-event\'><i class="fa fa-edit"></i> &nbsp;Edit</a>&nbsp;&nbsp;&nbsp;<a href="#" dataID="'+event.data_id+'" googleID="'+event.google_calendar_id+'" class=\'btn btn-danger btn-xs delete-event\'><i class="fa fa-remove"></i> &nbsp;<span class=label-delete>Delete</span></a></div><div class="clearfix"></div>');		        		
		        		$(".modal-title").html("<strong>Date Event :"+event.dateEVENT+"</strong>");
		        		if($(".modal-dialog").css({"width":"50%"})){
		        			$('#myModal').modal('show');
		        		}
		        		deleteEvent();
		        		updateEvent();
			        	//$('.popover').not(this).popover('hide');
			        });
			    }
            });
        }
    };
}();
$(function() {
	CompCalendar.init();
	$("#myModal").on('hidden.bs.modal', function(){
    	$(".modal-title").empty();
    	$(".info-success").empty();
    	$('.info-error').empty();
    });
});
function deleteEvent(){
	$(".delete-event").click(function(){
		$(".delete-event").attr({'disabled':true});
		$(".label-delete").html("Deleting...");
    	var google_calendar_id = $(this).attr('googleid');
    	var data_id = $(this).attr('dataid');
    	$.post('<?php echo $this->baseUrlAgent(TRUE);?>/calendar/deleteevent/google_calendar_id/'+google_calendar_id+'/data_id/'+data_id,function(response){
    		if(response.success==true){
    			var message = '1. Event in database has been removed successfully.<br>2. Event in google calendar has been removed successfully';
    			$(".info-success").html(message);
    			setTimeout(function(){
    				window.location.reload(true);
    			},3000);
    		}else{
    			var message = 'Delete even on google calendar is failed!';
    			$('.info-error').html(message);
    			//alert('delete even on google calendar is failed!');
    		}
    		$(".delete-event").attr({'disabled':false});
			$(".label-delete").html("Delete");
    	},'json');
    });
}
function updateEvent(){
	$(".edit-event").click(function(){
		var google_calendar_id = $(this).attr('googleid');
    	var data_id = $(this).attr('dataid');
    	$.post('<?php echo $this->baseUrlAgent(TRUE);?>/calendar/updateevent/google_calendar_id/'+google_calendar_id+'/data_id/'+data_id,function(data){
    		if($(".view-x").html(data)){
    			$("#myModal").modal('show');
    		}
    	});
	});
}
</script>
<style>
	.fc-event-inner{
		cursor: pointer;
	}
</style>