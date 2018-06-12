	<script>

  $(document).ready(function() {
	  var data = <?php echo json_encode($tasks);?>;
	  console.log(data);
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'listDay,listWeek,month'
      },

      views: {
        listDay: { buttonText: 'list day' },
        listWeek: { buttonText: 'list week' }
      },

      defaultView: 'month',
      defaultDate: '2018-06',
      navLinks: true,
      editable: true,
      eventLimit: true,
      events: data,
    
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
	<div id='calendar'></div>
</body>
</html>
