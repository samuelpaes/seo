@extends('layouts.app')
	<script>
	
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid', 'list', 'googleCalendar' ],
      header: {
        left: 'prev,next today',
		locale: 'pt-br',
        center: '',
        right: 'title'
      },
	
      displayEventTime: false, // don't show the time column in list view

      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      googleCalendarApiKey: 'AIzaSyDlUChbRjCYiFjsvgjlgZeZisf9Aubz0WU',

      // US Holidays
	  events: 'sr2ebiuj5351462b201il5317o@group.calendar.google.com',
	  
		
      eventClick: function(arg) {

        // opens events in a popup window
        window.open(arg.event.url, '_blank', 'width=500,height=300');

        // prevents current tab from navigating
        arg.jsEvent.preventDefault();
      }

    });
	calendar.setOption('locale', 'pt-br');



    calendar.render();
  });
  
  

</script>
<style>
#calendar .fc-center{
	font-size:24px;
}

#calendar .fc-day-top{
	font-size:26px;
}

#calendar .fc-today {
    background-color:#3788d8;
	color:#fff;
	font-size:32px;
	
}

#calendar .fc-button {
    background-color:#1dc7ea;
	border-color:#1dc7ea;
}

#calendar .fc-button:hover {
    background-color:#42d0ed;
	border-color:#1dc7ea;
}
#calendar .fc-button:active {
    background-color:#1dc7ea;
	border:1px;
}
</style>
	@section('content')	

		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<div class="row">
									<div class="col-md-12">
										<h4 class="title">Agenda Orçamentária</h4>	
										<br>
									</div>
								</div>
							</div>
						</div>
						<!--<div class="card">
							<span><iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FSao_Paulo&amp;src=c2FtdWVsbGVhb3BhZXNAZ21haWwuY29t&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=cHQtYnIuYnJhemlsaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%237986CB&amp;color=%2333B679&amp;color=%230B8043&amp;showTitle=0&amp;showNav=0&amp;showDate=1&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0" style="border-width:0" width="100%" height="600" frameborder="0" scrolling="no"></iframe></span>
						</div>-->
						<div class="card">
							<div class="content">
								<div id="calendar" style="max-width: 600px; margin: 0 auto;font-size:16px;" ></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	@endsection
	
