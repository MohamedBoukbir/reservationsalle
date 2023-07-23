
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  {{-- ?///////////  --}}
  <script>
    function validateForm() {
        // Récupérez les valeurs des champs
        var title = $('#title').val();
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();
        var date = $('#date').val();
        var effectif = $('#effectif').val();

        // Vérifiez si les champs requis sont vides
        if (title.trim() === '' || start_time.trim() === '' || end_time.trim() === '' || date.trim() === '' || effectif.trim() === '') {
            // $('#errorMessages').html('<div class="alert alert-danger">Veuillez remplir tous les champs obligatoires.</div>');
            // return;
            $('#exampleModal').modal('toggle');
        }else{
            $('#addform').submit();
        }

        // Si tous les champs requis sont remplis, soumettez le formulaire
      
    }
</script>
   {{-- model add  --}}
   </head>
 <body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary mb-1" data-bs-toggle="modal"
    data-bs-target="#exampleModal">
    <i class="fa-solid fa-plus"></i> Add rservation
    </button>
{{--! /////// show modale //// --}}
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">detailles réservation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingForm">
                    <div class="mb-3">
                        <label for="showtitle" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="showtitle" name="showtitle">
                    </div>
                    <div class="mb-3">
                        <label for="showstartTime" class="form-label">Date de début</label>
                        <input type="text" class="form-control" id="showstartTime" name="showstartTime">
                    </div>
                    <div class="mb-3">
                        <label for="showendTime" class="form-label">Date de fin</label>
                        <input type="text" class="form-control" id="showendTime" name="showendTime">
        
                    </div>
                    <div class="mb-3">
                        <label for="showdate" class="form-label">Date</label>
                        <input type="text" class="form-control" id="showdate" name="showdate">
                    
                    </div>
                    <div class="mb-3">
                        <label for="showeffectif" class="form-label">Effectif</label>
                        <input type="text" class="form-control" id="showeffectif" name="showeffectif">
                    </div>
                    <div class="mb-3">
                        <label for="showsalle_id" class="form-label">Salle</label>
                        <input type="text" class="form-control" id="showsalle_id" name="showsalle_id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
{{--! /////////// end  show modale ///// --}}
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

   {{-- !---------------------------- MODALS add reservation ----------------------------! --}}
    {{-- !MODAL ADD reservation --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nouvelle réservation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id ='addform' action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="form-label">Date de début</label>
                            <input type="datetime-local" class="form-control" id="start_time" name="start_time">
                            @error('start_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="end_time" class="form-label">Date de fin</label>
                            <input type="datetime-local" class="form-control" id="end_time" name="end_time">
                            @error('end_time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                            @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="effectif" class="form-label">Effectif</label>
                            <input type="number" class="form-control" id="effectif" name="effectif">
                            @error('effectif')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="salle_id" class="form-label">Salle</label>
                            <select class="form-select" id="salle_id" name="salle_id">
                                <option value="1">Digital Factory</option>
                                <option value="2">Salle de réunion de la TC</option>
                            </select>
                        </div>

                          <div class="row mt-2">
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit" onclick="validateForm()" >submit</button>
                            </div>
                         </div>
                    </form>
                </div>
    
            </div>
        </div>
    </div>
    {{-- !---------------------------- END MODALS add reservation ----------------------------! --}}


   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        
     $(document).ready(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var  reservations = @json($events);
        $('#calendar').fullCalendar({
            header:{
                // left:'prev,next today ',
                // center:'title',
                // right:'month,agendaWeek,agendaDay'
                   
            },
            events : reservations,
            selectable : false,
            selectHelper: true,
            select: function(start,end,allDays){
              $('#start_time').val(moment(start).format('YYYY-MM-DDTHH:mm:ss'));
            $('#end_time').val(moment(end).format('YYYY-MM-DDTHH:mm:ss'));
            $('#date').val(moment(start).format('YYYY-MM-DD'));
                $('#bookingModal').modal('toggle');
                $('#saveBtn').click(function() {
                        var title = $('#title').val();
                        var start_time = $('#start_time').val();
                        var end_time = $('#end_time').val();
                        var date = $('#date').val();
                        var effectif = $('#effectif').val();
                        var salle_id = $('#salle_id').val();
                        
                        $.ajax({
                            
                            url:"{{ route('reservation.store') }}",
                            type:"POST",
                            dataType:'json',
                            data:{ title,start_time,end_time,date,effectif,salle_id},
                            success:function(response){
                                $('#bookingModal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent',{
                                    'title':response.title,
                                    'start':response.start_time,
                                    'end'  :response.end_time
                                })
                            },
                            error:function(error){
                             if(error.responseJSON.errors){
                                $('#titleError').html(error.responseJSON.errors.title);
                                $('#effectifError').html(error.responseJSON.errors.effectif);
                                $('#dateError').html(error.responseJSON.errors.date);
                                $('#endTimeError').html(error.responseJSON.errors.end_time);
                                $('#startTimeError').html(error.responseJSON.errors.start_time);
                             }
                                
                            },
                         });   
                    });
            },
            eventClick: function(event){
               var id = event.id;
               console.log(event.end)
               $('#showtitle').val(event.title);
               $('#showeffectif').val(event.effectif);
               $('#showdate').val(event.date);
               $('#showendTime').val(moment(event.end).format('YYYY-MM-DDTHH:mm:ss'));
               $('#showstartTime').val(moment(event.start).format('YYYY-MM-DDTHH:mm:ss')); 
               $('#showModal').modal('toggle');
                       
               

            }

        })

     });

    </script>

 </body>
 
</html>