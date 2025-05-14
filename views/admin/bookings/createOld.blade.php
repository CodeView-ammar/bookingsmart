@extends('layouts.admin')

@section('content')
    {{--@foreach($hall->bookingHallCode as $booking)
        {{dd($booking)}}
    @endforeach--}}
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة حجز</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('bookings/create') }}" method="post"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <h2 class="text-center">اختر القاعه</h2>
                                @foreach(hall::CustCustomer()->get() as $hall)
                                    <a type="button" class="btn btn-lg btn-block btn-success">{{ $hall->hall_code }} _ {{ $hall->hallBulid ? $hall->hallBulid->build_no : null }} -  الإدارة: {{ $hall->hallDept ? $hall->hallDept->dept_name_ar : null }}</a>
                                @endforeach
                                <div class="col-md-12">

                                    @include('.forms.selectOption', ['label' => 'القاعه', 'name' => 'booking_hall_code','disName'=>'hall_code', 'options' => hall::CustCustomer()->get()])
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>نوع الحجز</label>
                                            <select name="booking_type" class="form-control">
                                                <option value="{{0}}">اختر نوع الحجز</option>
                                                @foreach (booking_type::CustCustomer()->get() as $option)
                                                    <option value="{{ $option->id }}" @if ($option->id == old("booking_type", isset($content) ? $content->booking_type : '')) selected @endif>{{ $option->btype_name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has("booking_type"))
                                                <div class="text-danger" role="alert">
                                                    <strong>{{ $errors->first("booking_type") }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <a class="btn" id="booking_typex">عرض الحجوزات </a>
                                    </div>
                        @if(isset($sys_stting))
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>الاحد</th>
                                                    <th>الاثنين</th>
                                                    <th>الثلاثاء</th>
                                                    <th>الاربعاء</th>
                                                    <th>الخميس</th>
                                                    <th>الجمعه</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    @for( $i =1;$i<=7;$i++)
                                                        @foreach($sys_stting as $booking)
                                                            @if($booking->sys_day_id==$i)
                                                                <td>
                                                                    <span>{{$booking->sys_from_hour->format('h A')}}</span>
                                                                    <span>الي</span>
                                                                    <span>{{$booking->sys_to_hour->format('h A')}}</span>
                                                                    to
                                                                </td>
                                                                @endif

                                                        @endforeach
                                                    @endfor
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="modal fade" id="event-modal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Manage</strong> my events</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-success save-event">Create event</button>
                                                        <button type="button" class="btn btn-danger delete-event"  data-dismiss="modal">Delete</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <div id="external-events" class="bg-white row m-0">
                                            <div class="col-md-4 p-0">
                                                <div class="widget bg-gray-l">
                                                    <div class="widget-body p-b-0">
                                                        <div class="row">
                                                            @foreach($content->bookingHallCode as $item)
                                                                {{ $item->bookingCoordinator ? $item->bookingCoordinator->name : null }}
                                                            @endforeach
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="panel-title width-100p c-blue w-500 f-20 carrois" id="calender-current-day">
                                                                    <h2 class="panel-title width-100p c-blue w-500 f-20 carrois">
                                                                        : شاشة عرض حجوزات القاعة المبني  {{ $hall->hallBulid ? $hall->hallBulid->build_no : null }}
                                                                    </h2>
                                                                </div>

                                                                <div>
                                                                    الإدارة:
                                                                    @if($hall->hallDept &&$hall->hallDept->dept_name_ar)
                                                                        {{$hall->hallDept->dept_name_ar }}
                                                                    @else
                                                                        {{ "" }}
                                                                    @endif
                                                                </div>

                                                                <div>
                                                                    سعة القاعة: {{ $hall->hall_capacity }}
                                                                </div>
                                                                <div id='external-events'>
                                                                    <br><br><br>
                                                                    <div class="external-event bg-red" data-class="bg-green" style="position: relative;">
                                                                        <i class="fa fa-move"></i>تم الحجز
                                                                    </div>
                                                                    <div class="external-event bg-purple" data-class="bg-purple" style="position: relative;">
                                                                        <i class="fa fa-move"></i>في انتظار التفعيل
                                                                    </div>
                                                                    <div class="external-event bg-red" data-class="bg-red" style="position: relative;">
                                                                        <i class="fa fa-move"></i>غير متاح
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

                            @endif
                                    @include('.forms.selectOption', ['label' => 'منسق الحجز', 'name' => 'booking_Coordinator_id','disName'=>'name', 'options' => user::get()])
                                    @include('.forms.inputDate',    ['label' => 'تاريخ بداية الحجز', 'name' => 'booking_start'])
                                    @include('.forms.inputDate',    ['label' => 'تاريخ نهاية الحجز', 'name' => 'booking_end'])
                                    @include('.forms.inputChekBox', ['label' => 'تأكيد الحجز','checkboxLabel'=>'تاكيد الحجز', 'name' => 'booking_is_confirmed'])
                                    @include('.forms.inputChekBox', ['label' => 'تفعيل الحجز','checked'=>'checked','checkboxLabel'=>'حالة التفعيل', 'name' => 'booking_isactive'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6  text-center">
                                    <div class="form-group">
                                        <button type="submit" class="col-md-12 btn btn-success btn-rounded">
                                            اضافة
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6  text-center">
                                    <div class="form-group">
                                        <a href="{{ route('bookings.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
