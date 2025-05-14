@extends('layouts.admin')

@section('content')
    <div  id="main-content" class="dashboard">
        <div class="row">
            <div class="">
                <div id="external-events" class="bg-white row m-0">
                    <div class="col-md-4 p-0">
                        <div class="widget bg-gray-l">
                            <div class="widget-body p-b-0">
                                <div class="row">
                                    {{--@foreach($content->bookingHallCode as $item)
                                        {{ $item->bookingCoordinator ? $item->bookingCoordinator->name : null }}
                                    @endforeach--}}
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="panel-title width-100p c-blue w-500 f-20 carrois" id="calender-current-day">
                                            <h2 class="panel-title width-100p c-blue w-500 f-20 carrois">
                                                  : شاشة عرض حجوزات القاعة المبني  {{ $content->hallBulid ? $content->hallBulid->build_no : null }}
                                            </h2>
                                        </div>

                                        <div>
                                            الإدارة: {{ $content->hallDept ? $content->hallDept->dept_name_ar : null }}
                                        </div>
                                        <div>
                                            سعة القاعة: {{ $content->hall_capacity }}
                                        </div>
                                        <div id='external-events'>
                                            <br><br><br>
                                            <div class="external-event bg-green" data-class="bg-green" style="position: relative;">
                                                <i class="fa fa-move"></i>حجز مؤكد
                                            </div>
                                            <div class="external-event bg-purple" data-class="bg-purple" style="position: relative;">
                                                <i class="fa fa-move"></i>في انتظار التفعيل
                                            </div>
                                            <div class="external-event bg-red" data-class="bg-red" style="position: relative;">
                                                <i class="fa fa-move"></i>حجز ملغي
                                            </div>
                                            <div class="external-event bg-blue" data-class="bg-blue" style="position: relative;">
                                                <i class="fa fa-move"></i>في انتظار الموافقه
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-md-offset-1 p-0 no-bd">
                        <div class="widget bg-white">
                            <div class="widget-body p-b-0">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
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
            var bookings = @json($content->bookingHallCode);
            var events = [];
            @foreach($content->bookingHallCode as $booking)
                events.push({
                    title: "{{$booking->bookingCoordinator ? $booking->bookingCoordinator->name : null}}",
                    start: new Date("{{$booking->booking_start}}"), // قم بتعديل هذا وفقًا لتنسيق تاريخك الخاص
                    end: new Date("{{$booking->booking_end}}"), // قم بتعديل هذا وفقًا لتنسيق تاريخك الخاص
                    className: @if($booking->booking_is_Approv==1)'bg-green'@elseif($booking->booking_is_Approv==0&&$booking->booking_Approv_userid<>null)'bg-red'@elseif($booking->booking_isactive==0)'bg-purple'@else'bg-blue'@endif
                });
            @endforeach
           {{-- bookings.forEach(function (booking) {
                console.log(booking.bookingCoordinator)
                events.push({
                    title: booking.bookingCoordinator ? booking.bookingCoordinator.name : null,
                    start: new Date(booking.booking_start), // قم بتعديل هذا وفقًا لتنسيق تاريخك الخاص
                    end: new Date(booking.booking_end), // قم بتعديل هذا وفقًا لتنسيق تاريخك الخاص
                    className: 'bg-purple'
                });
            });--}}
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

@endpush
