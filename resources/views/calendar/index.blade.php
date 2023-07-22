
<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8">
    <title>fullcalendar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" /> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
   </head>
 <body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>


<!-- Formulaire de réservation (Booking Form) -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nouvelle réservation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingForm">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title">
                        <span id="titleError" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Date de début</label>
                        <input type="datetime-local" class="form-control" id="start_time" name="start_time">
                        <span id="startTimeError" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Date de fin</label>
                        <input type="datetime-local" class="form-control" id="end_time" name="end_time">
                        <span id="endTimeError" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                        <span id="dateError" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="effectif" class="form-label">Effectif</label>
                        <input type="number" class="form-control" id="effectif" name="effectif">
                        <span id="effectifError" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="salle_id" class="form-label">Salle</label>
                        <select class="form-select" id="salle_id" name="salle_id">
                            <option value="1">Digital Factory</option>
                            <option value="2">Salle de réunion de la TC</option>
                        </select>
                        <span id="salleIdError" class="text-danger"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" id="saveBtn" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
  <div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mt-5">calendrier</h3>
            <div class="loc-md-11 offset-1 mt-5 mb-5">
                <div id="calendar">

                </div>

            </div>
        </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  {{-- <script>
    $(document).ready(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var events = @json($events);
        console.log(events);
        $('#calendar').fullCalendar({
            header:{
                left:'prev,next today ',
                center:'title',
                right:'month,agendaWeek,agendaDay'
                   
            },
            events : events,
            selectable : true,
            selectHelper: true,
            select: function(start,end,allDays){
              $('#start_time').val(moment(start).format('YYYY-MM-DDTHH:mm:ss'));
            $('#end_time').val(moment(end).format('YYYY-MM-DDTHH:mm:ss'));
            $('#date').val(moment(start).format('YYYY-MM-DD'));
                $('#bookingModal').modal('toggle');
                $('#saveBtn').click(function() {
                        var title = $('#title').val();
                        console.log(title);
                        

                        var title = $('#title').val();
            var start_time = $('#start_time').val();
            var end_time = $('#end_time').val();
            var date = $('#date').val();
            var effectif = $('#effectif').val();
            var salle_id = $('#salle_id').val();
                        
                        $.ajax({
                            
                            url:"{{ route('calendar.store') }}",
                            type:"POST",
                            dataType:'json',
                            data:{ 
                              title: title,
                    start_time: start_time,
                    end_time: end_time,
                    date: date,
                    effectif: effectif,
                    salle_id: salle_id
                              },
                            success:function(response){
                               console.log(response)
                            },
                            error:function(error){
                             if(error.responseJSON.errors){
                                $('#titleError').html(error.responseJSON.errors.title);
                             }
                                
                            },
                });
            });
            }

            
        })
    });
    </script> --}}
 </body>
 
</html>