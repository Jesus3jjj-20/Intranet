@extends('layouts.plantilla')

@section('titulo', 'Calendario')
@section('nombreUsuario', $user->name)

@section('contenido')

<script>



    $(function () {


    /* initialize the external events
    -----------------------------------------------------------------*/
    function ini_events(ele) {
    ele.each(function () {


    // create an Event Object (https://fullcalendar.io/docs/event-object)
    // it doesn't need to have a start or end
    var eventObject = {
    title: $.trim($(this).text()) // use the element's text as the event title
    }

    // store the Event Object in the DOM element so we can get to it later
    $(this).data('eventObject', eventObject)

    // make the event draggable using jQuery UI
    $(this).draggable({
    zIndex        : 1070,
    revert        : true, // will cause the event to go back to its
    revertDuration: 0  //  original position after the drag
    })

    })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
    -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
    itemSelector: '.external-event',
    eventData: function(eventEl) {
    return {
    title: eventEl.innerText,
    backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
    borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
    textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
    };
    }
    });

    var calendar = new Calendar(calendarEl, {
    headerToolbar: {
    left  : 'prev,next today',
    center: 'title',
    right : 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    themeSystem: 'bootstrap',
    //Random default events

   events: <?php 
   echo "[";
   foreach($eventos as $evento){
    echo "{
          title : '" . $evento->nombre . "',
          start:  new Date(" . $evento->annio_inicio . ",". $evento->mes_inicio.",". $evento->dia_inicio . ",". $evento->hora_inicio . ",". $evento->minutos_inicio ."),
          end:  new Date(". $evento->annio_fin .",". $evento->mes_fin .",". $evento->dia_fin . ",". $evento->hora_fin . ",". $evento->minutos_fin ."),
          backgroundColor: '". $evento->color ."', 
          borderColor    : '". $evento->color ."',
          allDay         : ". $evento->todo_dia ."
          },";
          
   }
   echo "],";

  ?>

    editable  : false,
    droppable : true, // this allows things to be dropped onto the calendar !!!
   /* drop      : function(info) {
    // is the "remove after drop" checkbox checked?
    if (checkbox.checked) {
    // if so, remove the element from the "Draggable Events" list
    info.draggedEl.parentNode.removeChild(info.draggedEl);
    }
    }*/
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
    e.preventDefault()
    // Save color
    currColor = $(this).css('color')
    // Add color effect to button
    $('#add-new-event').css({
    'background-color': currColor,
    'border-color'    : currColor
    })
    })
    $('#add-new-event').click(function (e) {
    e.preventDefault()
    // Get value and make sure it is not null
    var val = $('#new-event').val()
    if (val.length == 0) {
    return
    }

    // Create events
    var event = $('<div />')
    event.css({
    'background-color': currColor,
    'border-color'    : currColor,
    'color'           : '#fff'
    }).addClass('external-event')
    event.text(val)
    $('#external-events').prepend(event)

    // Add draggable funtionality
    ini_events(event)

    // Remove event from text input
    $('#new-event').val('')
    })
    })
    </script>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
             <div class="card" id="manejoEventos">
                <div class="card-header">
                  <h4 class="card-title">Manejar eventos</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">

                  @foreach($eventos as $evento)
                    <div class="external-event">{{$evento->nombre}}</div>
                  @endforeach

                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        Eliminar tras arrastrar
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header cabeceraCrearEvento">
                  <h3 class="card-title">Crear evento</h3>
                </div>
                <div class="card-body">
                <form method="POST" action="{{route('crearEvento')}}">
                      @csrf

                      <div class="input-group">
                        <input id="new-event" type="text" class="form-control" name="nombreEvento" placeholder="Título evento" required>

                        <!-- /btn-group -->
                      </div>
                      <!-- /input-group -->

                      <select class="form-select form-select-lg mt-3" aria-label=".form-select-lg example" id="colorEvento" name="colorEvento">
                        <option class="optionAzul" value="#007bff" selected>Azul</option>
                        <option class="optionAmarillo" value="#ffc107">Amarillo</option>
                        <option class="optionVerde" value="#28a745">Verde</option>
                        <option class="optionRojo" value="#dc3545">Rojo</option>
                        <option class="optionGris" value="#6c757d">Gris</option>
                      </select>

                      <div class="input-group mt-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                      </div>
                        <input  type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                      </div>

                      <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-clock" aria-hidden="true"></i></span>
                      </div>
                      <input type="number" value="00" id="horaInicio" name="horaInicio" class="form-control mr-1" min="00" max="24" />
                      :
                      <input type="number" value="00" id="minInicio" name="minInicio" class="form-control ml-1" min="00" max="59" />
                      </div>




                      <div class="input-group mt-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                      </div>
                        <input  type="date" class="form-control" id="fechaFin" name="fechaFin">
                      </div>

                      <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-clock" aria-hidden="true"></i></span>
                      </div>
                      <input type="number" value="00" id="horaFin" name="horaFin" class="form-control mr-1" min="00" max="24" />
                      :
                      <input type="number" value="00" id="minFin" name="minFin" class="form-control ml-1" min="00" max="59" />
                      </div>



                      <div class="checkbox mt-3">
                      <label for="diaEntero">
                        <input type="checkbox" id="diaEntero" name="diaEntero">
                        Todo el día
                      </label>
                    </div>

                  <!-- /btn-group -->

                  <div class="input-group-append">
                      <button type="submit" class="btn btn-primary botonEstiloControlsys mt-2">Añadir</button>
                  </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar">

                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
     </div>
    </section>
    <!-- /.content -->

    
@endsection