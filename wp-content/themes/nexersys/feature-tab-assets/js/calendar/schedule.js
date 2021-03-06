$(document).ready(function() {

	var $calendar = $('#calendar').weekCalendar({
		timeslotsPerHour: 4,
		allowCalEventOverlap : false,
        firstDayOfWeek : 1,
        businessHours :{start: 5, end: 23, limitDisplay: true },
		timeSeparator : ' - ',
		height : function($calendar) {
			return $(window).height() - $("h1").outerHeight();
		},
		eventRender : function(calEvent, $event) {
			if (calEvent.end.getTime() < new Date().getTime()) {
				$event.css("backgroundColor", "#aaa");
				$event.find(".time").css({
							"backgroundColor" : "#999",
							"border" : "1px solid #888"
						});
			}
		},
		eventNew : function(calEvent, $event) {
            var $dialogContent = $("#event_edit_container");
            var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
            var endField =  $dialogContent.find("select[name='end']").val(calEvent.end);
            
            $dialogContent.dialog({
                modal: true,
                title: "New Calendar Event",
                close: function() {
					$dialogContent.dialog("destroy");
					$dialogContent.hide();
					$('#calendar').weekCalendar("removeUnsavedEvents");
					$calendar.weekCalendar("refresh");
					resetForm($dialogContent);
                },
                buttons: {
                    save : function(){
                        save();
						$dialogContent.dialog("close");
                    },
                    cancel : function(){
                        $dialogContent.dialog("close");
                    }
                }
            }).show();
             
            $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
            setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
            $(window).resize().resize(); //fixes a bug in modal overlay size ??
		},
		eventClick : function(calEvent, $event) {
            
            if(calEvent.readOnly) {
                return;
            }
            
            var $dialogContent = $("#event_edit_container");
            resetForm($dialogContent);
			var scheduleField = $dialogContent.find("input[name='schedule_id']").val(calEvent.schedule_id);
			var	clubField = $dialogContent.find("input[name='club_id']").val(calEvent.club_id);
			var historyField = $dialogContent.find("input[name='history']").val(calEvent.start); // PREVIOUS START TIME, USED FOR UPDATING
			var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
            var endField =  $dialogContent.find("select[name='end']").val(calEvent.end);
			var titleField = $dialogContent.find("input[name='title']").val(calEvent.title);
            var instructorField = $dialogContent.find("input[name='instructor']").val(calEvent.instructor);
			var stepsField = $dialogContent.find("select[name='steps']").val(calEvent.steps);
			var classField = $dialogContent.find("select[name='class_id']").val(calEvent.class_id);
			
            $dialogContent.dialog({
                modal: true,
                title: "Edit - " + calEvent.title,
                close: function() {
					$dialogContent.dialog("destroy");
					$dialogContent.hide();
					$('#calendar').weekCalendar("removeUnsavedEvents");
					$calendar.weekCalendar("refresh");
					resetForm($dialogContent);
                },
                buttons: {
                    save : function(){
						save();
						$dialogContent.dialog("close");
                    },
                    'delete' : function(){
						confirm("Are you sure you wish to delete this record?", function () {
							remove();
							$dialogContent.dialog("close");
						});
                    },
                    cancel : function(){
                        $dialogContent.dialog("close");
                    }
                }
            }).show();
            
            var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
            var endField =  $dialogContent.find("select[name='end']").val(calEvent.end);
            $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
            setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
		    $(window).resize().resize(); //fixes a bug in modal overlay size ??
        
        },
		draggable : function(calEvent, $event) {
           return calEvent.readOnly != true;
        },
        resizable : function(calEvent, $event) {
            return calEvent.readOnly != true;
        },
		eventDrop : function(calEvent, $event) {
			quicksave(calEvent);
		},
		eventResize : function(calEvent, $event) {
			quicksave(calEvent);
		},
		eventMouseover : function(calEvent, $event) {
		},
		eventMouseout : function(calEvent, $event) {
		},
		noEvents : function() {
		},
		data: function(start, end, callback) {
			var dataSource = $("#data_source").val();
			$.getJSON("/admin/schedule/json/"+club+"/" + dataSource + "/?_=" + Math.random(), function(result) { callback(result) });
        }
	});
	
	function resetForm($dialogContent) {
		// $dialogContent.find("input").val("");
		// $dialogContent.find("textarea").val("");
		
		$dialogContent.find("select[name='class_id']").val("");
		$dialogContent.find("select[name='steps']").val("");
		$dialogContent.find("input[name='instructor']").val("");
    }

	/*
     * Sets up the start and end time fields in the calendar event 
     * form for editing based on the calendar event being edited
     */
    function setupStartAndEndTimeFields($startTimeField, $endTimeField, calEvent, timeslotTimes) {
		$startTimeField.empty();
		$endTimeField.empty();
		
		for(var i=0; i<timeslotTimes.length; i++) 
		{
			var startTime = timeslotTimes[i].start; 
			var endTime = timeslotTimes[i].end;
			var startSelected = "";
			if(startTime.getTime() === calEvent.start.getTime()) 
			{
				startSelected = "selected=\"selected\"";
			}
			var endSelected = "";
			if(endTime.getTime() === calEvent.end.getTime()) {
				endSelected = "selected=\"selected\"";
			}
			$startTimeField.append("<option value=\"" + startTime + "\" " + startSelected + ">" + timeslotTimes[i].startFormatted + "</option>");
			$endTimeField.append("<option value=\"" + endTime + "\" " + endSelected + ">" + timeslotTimes[i].endFormatted + "</option>");
		}
		$endTimeOptions = $endTimeField.find("option"); 
		$startTimeField.trigger("change");
    }

   var $endTimeField = $("select[name='end']"); 
   var $endTimeOptions = $endTimeField.find("option"); 
    
   //reduces the end time options to be only after the start time options.
   $("select[name='start']").change(function(){
        var startTime = $(this).find(":selected").val();
        var currentEndTime = $endTimeField.find("option:selected").val();
        $endTimeField.html(
            $endTimeOptions.filter(function(){
                return startTime < $(this).val();
            })
        );
        
        var endTimeSelected = false;
        $endTimeField.find("option").each(function() {
            if($(this).val() === currentEndTime) {
                $(this).attr("selected", "selected");
                endTimeSelected = true;
                return false;
            }
        });
        
        if(!endTimeSelected) {
           //automatically select an end date 2 slots away. 
           $endTimeField.find("option:eq(1)").attr("selected", "selected");
        }
        
    });

	$("#data_source").change(function() {
		$calendar.weekCalendar("refresh");
	});
	
	function getcalendarid() {
		return $("#calendarsel").val();
	}
	
	function quicksave(event) {
		$.post("/admin/schedule/update/",	
		{
			"schedule_id" : event.schedule_id,
			"start": event.start,
			"end": event.end,
			"instructor": event.instructor,
			"steps": event.steps,
			"class_id": event.class_id,
			"studio_id": event.studio_id,
			"club_id": event.club_id
		},
		function(json){}, 'json');
	}
	
	var run = false;
	function save() {
		$.post("/admin/schedule/insert/",
		{
			"schedule_id": $("#schedule_id").val(),
			"history": $("#history").val(), // PREVIOUS START TIME, USED FOR UPDATING
			"start": $("#start").val(),
			"end": $("#end").val(),
			"instructor": $("#instructor").val(),
			"steps": $("#steps").val(),
			"class_id": $("#class_id").val(),
			"studio_id": $("#data_source").val(),
			"club_id": $("#club_id").val()
		});
	}
	
	function remove() {
		$.post("/admin/schedule/delete/",
		{
			"club_id": $("#club_id").val(),
			"class_id": $("#class_id").val(),
			"studio_id": $("#data_source").val(),
			"schedule_id": $("#schedule_id").val(),
			"history": $("#history").val(), // PREVIOUS START TIME, USED FOR UPDATING
			"start": $("#start").val()
		});
	}
});