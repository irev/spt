<!-- page specific fullcalendar plugin scripts -->
		<!--script src="<?= base_url() ?>asset/theme/assets/js/jquery-ui.custom.min.js"></script-->
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/moment.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/fullcalendar.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/bootbox.js"></script>
				<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {

/* initialize the external events
	-----------------------------------------------------------------*/
    
	$('#external-events div.external-event').each(function() {
    
		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});
		$('#external-events').draggable({ cancel: " div.external-event.primery" });
		$( "#external-events div.external-event, #external-events div.primery" ).disableSelection();

    $( "#draggable" ).draggable({ handle: "p" });
    $( "#draggable2" ).draggable({ cancel: "p.ui-widget-header" });
    $( "div, p" ).disableSelection();





	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();


	var calendar = $('#calendar').fullCalendar({
		//isRTL: true,
		//firstDay: 1,// >> change first day of week 
		
		buttonHtml: {
			prev: '<i class="ace-icon fa fa-chevron-left"></i>',
			next: '<i class="ace-icon fa fa-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		<?php
		//https://fullcalendar.io/docs/v3/events-json-feed
			$data_event = array();
			$sumday=0;
			$perjalanan ="";
			foreach ($this->m_dalam->spt_dalam() as $key => $value) {
				$sumday = JUMLAHHARI($value["tgl_berangkat"], $value["tgl_kembali"]);
				$perjalanan = $value["perjalanan"];
				if($perjalanan == "dalam"){
					$color = 'green';
					$textColor = 'white';
					$classlabel='label-success';
				}else{
					$color = 'red';
					$textColor = 'white';
					$classlabel='label-danger';
				}	
				$data_event[] = [
						'title'=>$value["nama"].' => '.$value['maksud'].' - '.$sumday.' Hari ('.LONGE_DATE_INDONESIA($value["tgl_berangkat"]).' - '.LONGE_DATE_INDONESIA($value["tgl_kembali"]).') Dinas '. $value["perjalanan"], 
						'start'=>$value['tgl_berangkat'], 
						'end'=>$value['tgl_kembali'],
						'day'=>$sumday,
						'className'=> $classlabel,
					];
			}
			echo 'events:'.json_encode(['events'=>$data_event]).',';
			//echo 'events:'.json_encode(['events'=>$data_event,'color'=>$color, 'textColor'=> $textColor]).',';
			//echo 'events:'.json_encode(['events'=>$data_event,'color'=>'red', 'textColor'=> 'white']).',';
		 ?>

		 /**
		events: [
		  {
			title: 'All Day Event',
			start: new Date(y, m, 1),
			className: 'label-important'
		  },
		  {
			title: 'Long Event',
			start: moment().subtract(5, 'days').format('YYYY-MM-DD'),
			end: moment().subtract(1, 'days').format('YYYY-MM-DD'),
			className: 'label-success'
		  },
		  {
			title: 'Some Event',
			start: new Date(y, m, d-3, 16, 0),
			allDay: false,
			className: 'label-info'
		  }
		]
		,
		*/
		/**eventResize: function(event, delta, revertFunc) {

			alert(event.title + " end is now " + event.end.format());

			if (!confirm("is this okay?")) {
				revertFunc();
			}

		},*/
		
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date) { // this function is called when something is dropped
		
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			var $extraEventClass = $(this).attr('data-class');
			
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = false;
			if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
			
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
			
		}
		,
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			
			bootbox.prompt("Acara Baru", function(title) {
				if (title !== null) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay,
							className: 'label-info'
						},
						true // make the event "stick"
					);
				}
			});
			

			calendar.fullCalendar('unselect');
		}
		,
		eventClick: function(calEvent, jsEvent, view) {

			//display a modal
			var modal = 
			'<div class="modal fade">\
			  <div class="modal-dialog">\
			   <div class="modal-content">\
				 <div class="modal-body">\
				   <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
				   <form class="no-margin">\
					  <label>Nama Acara  &nbsp;</label>\
					  <textarea class="middle" autocomplete="off" width="100%" type="text" value="' + calEvent.title + '" >' + calEvent.title + '</textarea>\
					 <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
				   </form>\
				 </div>\
				 <div class="modal-footer">\
					<button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
					<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				 </div>\
			  </div>\
			 </div>\
			</div>';
		
		
			var modal = $(modal).appendTo('body');
			modal.find('form').on('submit', function(ev){
				ev.preventDefault();

				calEvent.title = $(this).find("input[type=text]").val();
				calendar.fullCalendar('updateEvent', calEvent);
				modal.modal("hide");
			});
			modal.find('button[data-action=delete]').on('click', function() {
				calendar.fullCalendar('removeEvents' , function(ev){
					return (ev._id == calEvent._id);
				})
				modal.modal("hide");
			});
			
			modal.modal('show').on('hidden', function(){
				modal.remove();
			});


			//console.log(calEvent.id);
			//console.log(jsEvent);
			//console.log(view);

			// change the border color just for fun
			//$(this).css('border-color', 'red');

		}
		
	});


})
		</script>