@extends('template')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div id="fullcalendar"></div>
        </div>
    </div>

@endsection
@push('scripts')
<script>

    $(document).ready(function () {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var cal = $('#fullcalendar');

        var calendar = cal.fullCalendar({
            editable: true,
            selectable: true,
            selectHelper: true,
            droppable: true,
            weekends: true,
            header: {
                left: 'prev,today,next',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: '/events',
            eventRender: function (event, element, view) {
                event.allDay = event.allDay === 'true';

            },
            loading: function (isLoading, view) {
                if (isLoading) {
                    $('body').LoadingOverlay("show")
                } else {
                    $('body').LoadingOverlay("hide")
                }
            },
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-D HH:mm:ss");
                if (event.end !== null)
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-D HH:mm:ss");

                var allDay;
                if(event.allDay===1){
                    allDay = 1;
                }else{
                    allDay=0
                }

                $.ajax({
                    url: '/events/' + event.id + '/update',
                    data: '_token={{csrf_token()}}&start_date=' + start + '&end_date=' + end + '&allDay=' + allDay + '&id=' + event.id,
                    type: "POST",
                    success: function (json) {
                        notice("Updated Successfully");
                    }
                });
            },
            eventResize: function (event) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-D HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-D HH:mm:ss");

                var allDay;
                if(event.allDay===1){
                    allDay = 1;
                }else{
                    allDay=0
                }

                $.ajax({
                    url: '/events/' + event.id + '/update',
                    data: '_token={{csrf_token()}}&start_date=' + start + '&end_date=' + end + '&allDay=' + allDay + '&id=' + event.id,
                    type: "POST",
                    success: function (json) {
                        notice("Updated Successfully");
                    }
                });
            },
            eventClick: function(event) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-D");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-D");
                var div =$('#create-event-modal');
                div.find('.modal-title').html(event.title);
                div.find('input[name=title]').val(event.title);
                div.find('input[name=start_date]').val(start);
                div.find('input[name=end_date]').val(end);

                $('#eventUrl').attr('href',event.url);
                div.modal('show');
            },

        });

        $('.create-event-btn').click(function () {
            $('#create-event-modal').modal('show');
        });
        $('.repeats').change(function () {
            $('#freq').toggle();
            $('#due-by').toggle();
        });
    });
</script>

@endpush

@push('modals')
<div class="modal fade" id="create-event-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">New Event</h4>
            </div>
            {!! Form::open(['url'=>'/events/create']) !!}
            <div class="modal-body">
                @include('events.create')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endpush