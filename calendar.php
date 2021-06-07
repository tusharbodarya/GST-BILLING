<?php include 'header.php'; ?>
<link href='assets/vendor/fullcalendar-3.7.0/fullcalendar.css'  rel='stylesheet' />
<div class="container">

  <div class="page-header text-center">
    <h1>Example of Calendar</h1>
  </div>

  <hr>

  <form>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="fromDate">Event Name:</label>
          <input type="text" class="form-control" placeholder="Enter event" id="eventName">
        </div>
      </div>
    </div>

    <div class="row"> 
      <div class="col-md-6">
        <div class="form-group">
          <label for="fromDate">From:</label>
          <input type="date" class="form-control" placeholder="Enter from date" id="fromDate">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="toDate">To:</label>
          <input type="date" class="form-control" id="toDate">
        </div>
      </div>

    </div>

    <button type="button" class="btn btn-primary" id="addEvent">Add Event</button>
    
  </form>

  <hr>

  <div class="row">
    <div class="col-md-12">
      <div id="calendar"></div>
    </div>
  </div>

</div>
<script src='assets/vendor/fullcalendar-3.7.0/lib/moment.min.js'></script>
<script src='assets/vendor/fullcalendar-3.7.0/fullcalendar.js'></script>
<!--init calendar-->
<script src='assets/vendor/js-init/init-calendar-external-events.js'></script>
<script type="text/javascript">
  $(document).ready(function() {
    ShowCalendar();
  });

  var events = [];
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {

    initialView: 'dayGridMonth',

    events: function(info, successCallback, failureCallback ) {
      successCallback(events);
    },

  });

  function ShowCalendar() {
    calendar.render();
  }

  $("#addEvent").on("click", function() {
    events.push({
      title: $("#eventName").val(),
      start: $("#fromDate").val(),
      end: $("#toDate").val()
    });

    calendar.refetchEvents();
  });
</script>
<?php include 'footer.php'; ?>