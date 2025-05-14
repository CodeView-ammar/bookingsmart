@extends('layouts.admin')

@section('content')
    {{--@foreach($hall->bookingHallCode as $booking)
        {{dd($booking)}}
    @endforeach--}}
<style>.custom-btn:hover {
background-color: var(--secondary-color);
}
</style>
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    @section('title')

                    <h3 class="panel-title"><strong>عرض القاعات</strong></h3>
                    @endsection

                    <div class="panel-body">
                    <div class="row mb-3">
                        <div class="custom-heading-box">
                            <h2 class="text-center">اختر القاعه</h2>
                        </div>
                    </div>
                        <hr>
                        <hr>
                    <div class="row mb-1">
                        @foreach(hall::CustCustomer()->get() as $hall)
                            <div class="col-md-4 mb-3">
                                <a href="{{ URL::to('halls/booking/' . $hall->id . '') }}" class="btn  btn-block custom-btn" style="padding: 60px 1px;font-weight: bold;">
                                    <i class="fa fa-icon"></i> <!-- Replace "fa-icon" with the desired icon class -->
                                    {{ $hall->hall_code }}   -  الإدارة: {{ $hall->hallDept ? $hall->hallDept->dept_name_ar : null }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <a href="{{ route('bookings.index') }}" class="col-md-6  btn btn-danger ">الغاء</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('scripts')

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src='{{ url('assets/plugins/fullcalendar/moment.min.js') }}'></script>
    <script src='{{ url('assets/plugins/fullcalendar/fullcalendar.min.js') }}'></script>

    {{--    <script src="{{ url('assets/js/calendar.js') }}"></script>--}}
    <!-- END  PAGE LEVEL SCRIPTS -->
    @if(isset($sys_stting))
    <script>
        function runCalendar() {
            var $modal = $('#event-modal');
            $('#external-events div.external-event').each(function () {
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
                    revert: true, // will cause the event to go back to its
                    revertDuration: 20 //  original position after the drag
                });
            });
            /*  Initialize the calendar  */
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var form = '';
            var bookings = @json($sys_stting);
            var events = [];
                @foreach($hall->bookingHallCode as $booking)
                var txt="{{$booking->booking_start->format('h A')}} ";
                txt+=" to ";
                txt+="{{$booking->booking_end->format('h A')}}  "
                events.push({
                    title: txt,
                    start: new Date("{{$booking->booking_start}}"),
                    end: new Date("{{ $booking->booking_end }}"), // قم بتعديل هذا وفقًا لتنسيق تاريخك الخاص
                    className: 'bg-red'
                });
                @endforeach
            console.log(events)
            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },

                events:events,

                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (date, allDay) { // this function is called when something is dropped
                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    var $categoryClass = $(this).attr('data-class');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);
                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    if ($categoryClass)
                        copiedEventObject['className'] = [$categoryClass];
                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },

                selectable: true,
                eventClick: function (calEvent, jsEvent, view) {
                    var form = $("<form></form>");
                    form.append("<label>Change event name</label>");
                    form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success'><i class='fa fa-check'></i> Save</button></span></div>");
                    $modal.modal({
                        backdrop: 'static'
                    });
                    $modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                        calendar.fullCalendar('removeEvents', function (ev) {
                            return (ev._id == calEvent._id);
                        });
                        $modal.modal('hide');
                    });
                    $modal.find('form').on('submit', function () {
                        calEvent.title = form.find("input[type=text]").val();
                        calendar.fullCalendar('updateEvent', calEvent);
                        $modal.modal('hide');
                        return false;
                    });
                },
                select: function (start, end, allDay) {
                    $modal.modal({
                        backdrop: 'static'
                    });

                    form = $("<form></form>");
                    form.append("<div class='row'></div>");
                    form.find(".row").append("<div class='col-md-6'>" +
                        "<div class='form-group'>" +
                        "<label class='control-label'>Event Name</label>" +
                        "<input class='form-control' placeholder='Insert Event Name' type=text name='title'/></div></div>").append("<div class='col-md-6'>" +
                        "<div class='form-group'><label class='control-label'>Category</label>" +
                        "<select class='form-control' name='category'></select></div></div>").find("select[name='category']").append("<option value='bg-red'>Work</option>")
                        .append("<option value='bg-green'>Sport</option>").append("<option value='bg-purple'>Meeting</option>").append("<option value='bg-blue'>Lunch</option>").append("<option value='bg-yellow'>Children</option>");
                    $modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                        form.submit();
                    });
                    $modal.find('form').on('submit', function () {
                        title = form.find("input[name='title']").val();
                        $categoryClass = form.find("select[name='category'] option:checked").val();
                        if (title !== null) {
                            calendar.fullCalendar('renderEvent', {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay,
                                className: $categoryClass
                            }, true);
                        }
                        $modal.modal('hide');
                        return false;
                    });
                    calendar.fullCalendar('unselect');
                }

            });

        }

        runCalendar();

    </script>

@endif
    <script>
        $(document).ready(function() {
            $('a[id="booking_typex"]').click(function() {
                var selectedValue = $(this).val();
                $('<input>').attr({
                    type: 'hidden',
                    name: 'selected_value',
                    value: selectedValue
                }).appendTo('form');

                // إرسال النموذج
                $('form').submit();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('select[name="booking_type"]').change(function() {
                var selectedValue = $(this).val();
                $('<input>').attr({
                    type: 'hidden',
                    name: 'selected_value',
                    value: selectedValue
                }).appendTo('form');

                // إرسال النموذج
                $('form').submit();
            });
        });
    </script>


@endpush
