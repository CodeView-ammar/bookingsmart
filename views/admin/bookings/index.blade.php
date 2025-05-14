@extends('layouts.admin')

@section('content')

    <div id="main-content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>شاشة </strong> الموافقه علي الحجز</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <div class="btn-group">
                                    <a href="{{url('bookings/create')}}"  class="btn btn-danger">
                                        اضف الان <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">القائمة <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a id="print-button" href="#">طباعة</a>
                                        </li>
                                        @php
                                            $print = "
                                            <div class='text-center'>موافاقات الحجز</div>
                                                 <table class='table table-striped table-hover dataTable' id='table-editable'>
                                                     <thead>
                                                         <tr role='row'>
                                                             <th>م</th>
                                                             <th>رقم الحجز</th>
                                                             <th>إدارة القاعة</th>
                                                             <th>كود القاعة</th>
                                                             <th>مبنى القاعة</th>
                                                             <th>المنسق </th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>";
                                             foreach($content as $key=>$item) {
                                                 $print .= "
                                                     <tr>
                                                         <td width='35'>". ($key+1) ."</td>
                                                         <td width='35'>". $item->id ."</td>
                                                         <td>". $item->bookingHallCode->hallDept->dept_name_ar ."</td>
                                                         <td>". $item->bookingHallCode->hall_code ."</td>
                                                         <td>". $item->bookingHallCode->hallBulid->build_no."</td>
                                                         <td>". $item->bookingCoordinator->name ."</td>
                                                     </tr>";
                                             }

                                             $print .= "
                                                     </tbody>
                                                 </table>";
                                        @endphp
                                        <li><a id="" href="{{ url('pdf') }}?print={{ urlencode($print) }}&name=City.pdf">احفظ كملف pdf</a></li>
                                        </li>
                                        <li><a id="export-btn" href="#">استخراج شيت اكسيل</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                @if($content->count())
                                    <table class="table table-striped table-hover dataTable" id="table-editable">
                                        <thead>
                                        <tr role="row">
                                            <th>م</th>
                                            <th>رقم الحجز</th>
                                            <th>إدارة القاعه</th>
                                            <th>كود القاعه</th>
                                            <th>مبني القاعه</th>
                                            <th>المنسق </th>
                                            <th>تفاصيل الحجز </th>
                                            <th class="text-center">ارسال الاشعارات </th>
                                            <th  class="text-center">الموافقه</th>
                                            <th class="text-center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($content as $key=>$item)
                                            <tr>
                                                <td width="35">{{ $key+1 }}</td>
                                                <td width="35">{{ $item->id }}</td>
                                                <td>{{ @$item->bookingHallCode->hallDept->dept_name_ar??" " }}</td>
                                                <td>{{ @$item->bookingHallCode->hall_code }}</td>
                                                <td>{{ @$item->bookingHallCode->hallBulid->build_no??"" }}</td>
                                                <td>{{ @$item->bookingCoordinator->name??"" }}</td>
                                                <td>

                                                    <a href="{{  URL::to("/bookings/$item->id") }}" type="button" class="btn btn-sm btn-icon btn-rounded btn-success" onclick="submitForm('{{ $item->id }}', 'phone')">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <div class="col-xs-6 text-center" style="padding-right: 0px; padding-left: 0px;">
                                                            <button type="button" class="btn btn-sm btn-icon btn-rounded btn-info" onclick="submitForm('{{ $item->id }}', 'phone')">
                                                                <i class="fa fa-mobile-phone"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-xs-6 text-center" style="padding-right: 0px; padding-left: 0px;">
                                                            <button type="button" class="btn btn-sm btn-icon btn-rounded btn-info" onclick="submitForm('{{ $item->id }}', 'email')">
                                                                <i class="fa fa-envelope-o"></i>
                                                            </button>
                                                        </div>
                                                        <script>
                                                            function submitForm(itemId, method) {
                                                                var form = $('#form' + itemId);
                                                                // إضافة حقل إخفاء لتحديد الطريقة (phone أو email)
                                                                $('<input>').attr({
                                                                    type: 'hidden',
                                                                    name: 'submit_method',
                                                                    value: method
                                                                }).appendTo(form);
                                                                // إرسال النموذج
                                                                form.submit();
                                                            }
                                                        </script>

                                                    </div>
                                                    <div class="row">
                                                       {{-- <div class="col-xs-4 text-center" style="padding-right: 0px;padding-left: 0px;"><span class="glyphicon glyphicon-ok"></span>
                                                            </div>--}}
                                                        @if($item->booking_issend_notice)
                                                        <div class="col-xs-12 text-center" style="padding-right: 0px;padding-left: 0px;">تم الارسال<span class="glyphicon glyphicon-ok"></span></div>
                                                        @else
                                                            <div class="col-xs-12 text-center" style="padding-right: 0px;padding-left: 0px;">لم يتم الارسال<span class="glyphicon glyphicon-remove"></span></div>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td class="text-center">
                                                    <form id="form{{$item->id}}" action="{{url('bookings', [$item->id])}}" method="post"  enctype="multipart/form-data">
                                                        <input type="hidden" name="_method" value="PUT">
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
                                                    </form>
                                                        <div class="form-group">
                                                            <select form="form{{$item->id}}" onchange="submitForm('{{ $item->id }}', '')" name="booking_is_Approv" class="form-control">
                                                                    <option  selected  style="color: #212020"  value="3">لم يحدد</option>
                                                                    <option value="1" @if($item->booking_is_Approv==1)selected @endif style="color: #212020">موافق</option>
                                                                <option value="0" @if($item->booking_is_Approv== "0") selected @endif style="color: #212020">مرفوض</option>
                                                            </select >
{{--                                                        </div>--}}
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <form style="display: contents" action="{{ url('bookings', [$item->id]) }}" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button onclick="return confirm('هل انته متاكد من الحذف ?')" type="submit" class="btn btn-sm btn-icon btn-rounded btn-danger" data-check-delete="true"><i class="fa fa-times-circle"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="card-footer clearfix">
                                        @if($content->count())
                                            {{ $content->links() }}
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      {{--  <!-- END MAIN CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>شاشة  </strong> الحجوزات</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <div class="btn-group">
                                    <a href="{{url('bookings/create')}}"  class="btn btn-danger">
                                        اضف الان <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">القائمة <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a id="print-button" href="#">طباعة</a>
                                        </li>
                                        <li><a  id="export-pdf-btn" href="#">احفظ كملف pdf</a>
                                        </li>
                                        <li><a id="export-btn" href="#">استخراج شيت اكسيل</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                <table class="table table-striped dataTable" id="table2" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 42px;" aria-label=": activate to sort column ascending"></th>
                                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 279px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                           إدارة القاعه
                                        </th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 350px;" aria-label="Browser: activate to sort column ascending">
                                            مبني القاعه
                                        </th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 322px;" aria-label="Platform(s): activate to sort column ascending">
                                            المنسق</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 241px;" aria-label="Engine version: activate to sort column ascending">
                                            تاريخ البداية
                                        </th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 171px;" aria-label="CSS grade: activate to sort column ascending">
                                            تاريخ النهاية
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    @foreach($content as $item)
                                        <tr class="gradeA odd">
                                            <td class="center ">
                                                <i style="color: #C75757" class="fa fa-plus-square-o" onclick="toggleDetails(this)"></i>
                                            </td>
                                            <td class=" sorting_1">
                                            @if ($item->bookingHallCode && $item->bookingHallCode->hallDept)
                                                {{ $item->bookingHallCode->hallDept->dept_name_ar }}
                                            @else

                                            @endif
                                            </td>
                                            <td class=" sorting_1">
                                            @if ($item->bookingHallCode && $item->bookingHallCode->hallBulid)
                                                {{ $item->bookingHallCode->hallBulid->build_no }}
                                            @else

                                            @endif
                                            </td>
                                            <td>
                                                @if ($item->bookingCoordinator && $item->bookingCoordinator->name)
                                                    {{ $item->bookingCoordinator->name }}
                                                @else

                                                @endif
                                            </td>
                                            <td class="center">{{  $item->booking_start  }}</td>
                                            <td class="center">{{ $item->booking_end }}</td>
                                        </tr>
                                        <tr class="details">
                                            <td colspan="6">
                                                <table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">
                                                    <div class="panel-body">

                                                        <div class="row">
                                                            <div class="col-md-4   ">
                                                                <div class="form-group">
                                                                    <button form="form{{$item->id}}" type="submit" class="col-md-12 btn btn-danger">
                                                                        تحديث
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        <div class="col-md-4   ">
                                                            <div class="form-group">
                                                        <form style="display: contents" action="{{ url('bookings', [$item->id]) }}" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button onclick="return confirm('هل انته متاكد من الحذف ?')" type="submit" class="delete col-md-12 btn btn-danger" data-check-delete="true"><i class="fa fa-times-circle"></i></i>حذف</button>
                                                        </form>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </table>
                                            </td>

                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                <script>
                                    function toggleDetails(icon) {
                                        var detailsRow = icon.closest('tr').nextElementSibling;
                                        detailsRow.classList.toggle('details');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>




@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ url('assets/plugins/datatables/dataTables.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/datatables/dataTables.tableTools.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/newSass.sass') }}">
    <style>
        .details {
            display: none;
        }
    </style>
@endsection
@section('custom-scripts')
    <script src="{{ url('assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables/dynamic/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables/dataTables.tableTools.js') }}"></script>
    <script src="{{ url('assets/js/table_editable.js') }}"></script>
{{--    <script src="{{ url('assets/js/table_dynamic.js') }}"></script>--}}

    <!-- END  PAGE LEVEL SCRIPTS -->
{{--    <script src="{{ url('assets/js/application.js') }}"></script>--}}
    {{--<script>
        (function() {
            var __slice = [].slice;

            (function($, window) {
                "use strict";
                var BootstrapSwitch;
                BootstrapSwitch = (function() {
                    BootstrapSwitch.prototype.defaults = {
                        state: true,
                        size: null,
                        animate: true,
                        disabled: false,
                        readonly: false,
                        onColor: "primary",
                        offColor: "default",
                        onText: "on",
                        offText: "off",
                        labelText: "&nbsp;"
                    };

                    function BootstrapSwitch(element, options) {
                        var _this = this;
                        if (options == null) {
                            options = {};
                        }
                        this.$element = $(element);
                        this.options = $.extend({}, this.defaults, options, {
                            state: this.$element.is(":checked"),
                            size: this.$element.data("size"),
                            animate: this.$element.data("animate"),
                            disabled: this.$element.is(":disabled"),
                            readonly: this.$element.is("[readonly]"),
                            onColor: this.$element.data("on-color"),
                            offColor: this.$element.data("off-color"),
                            onText: this.$element.data("on-text"),
                            offText: this.$element.data("off-text"),
                            labelText: this.$element.data("label-text")
                        });
                        this.$on = $("<span>", {
                            "class": "switch-handle-on switch-" + this.options.onColor,
                            html: this.options.onText
                        });
                        this.$off = $("<span>", {
                            "class": "switch-handle-off switch-" + this.options.offColor,
                            html: this.options.offText
                        });
                        this.$label = $("<label>", {
                            "for": this.$element.attr("id"),
                            html: this.options.labelText
                        });
                        this.$wrapper = $("<div>", {
                            "class": function() {
                                var classes;
                                classes = ["switch-toggle"];
                                classes.push(_this.options.state ? "switch-on" : "switch-off");
                                if (_this.options.size != null) {
                                    classes.push("switch-" + _this.options.size);
                                }
                                if (_this.options.animate) {
                                    classes.push("switch-animate");
                                }
                                if (_this.options.disabled) {
                                    classes.push("switch-disabled");
                                }
                                if (_this.options.readonly) {
                                    classes.push("switch-readonly");
                                }
                                if (_this.$element.attr("id")) {
                                    classes.push("switch-id-" + (_this.$element.attr("id")));
                                }
                                return classes.join(" ");
                            }
                        });
                        this.$div = this.$element.wrap($("<div>")).parent();
                        this.$wrapper = this.$div.wrap(this.$wrapper).parent();
                        this.$element.before(this.$on).before(this.$label).before(this.$off);
                        this._elementHandlers();
                        this._handleHandlers();
                        this._labelHandlers();
                        this._formHandler();
                    }

                    BootstrapSwitch.prototype._constructor = BootstrapSwitch;

                    BootstrapSwitch.prototype.state = function(value, skip) {
                        if (typeof value === "undefined") {
                            return this.options.state;
                        }
                        if (this.options.disabled || this.options.readonly) {
                            return this.$element;
                        }
                        value = !!value;
                        this.$element.prop("checked", value).trigger("change.bootstrapSwitch", skip);
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.toggleState = function(skip) {
                        if (this.options.disabled || this.options.readonly) {
                            return this.$element;
                        }
                        return this.$element.prop("checked", !this.options.state).trigger("change.bootstrapSwitch", skip);
                    };

                    /*
                    TODO: refactor
                    toggleRadioState: (uncheck, skip) ->
                      $element = @$element.not ":checked"

                      if uncheck
                        $element.trigger "change.bootstrapSwitch", skip
                      else
                        $element.prop("checked", not @$element.is ":checked").trigger "change.bootstrapSwitch", skip
                      @$element
                    */


                    BootstrapSwitch.prototype.size = function(value) {
                        if (typeof value === "undefined") {
                            return this.options.size;
                        }
                        if (this.options.size != null) {
                            this.$wrapper.removeClass("switch-" + this.options.size);
                        }
                        this.$wrapper.addClass("switch-" + value);
                        this.options.size = value;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.animate = function(value) {
                        if (typeof value === "undefined") {
                            return this.options.animate;
                        }
                        value = !!value;
                        this.$wrapper[value ? "addClass" : "removeClass"]("switch-animate");
                        this.options.animate = value;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.disabled = function(value) {
                        if (typeof value === "undefined") {
                            return this.options.disabled;
                        }
                        value = !!value;
                        this.$wrapper[value ? "addClass" : "removeClass"]("switch-disabled");
                        this.$element.prop("disabled", value);
                        this.options.disabled = value;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.toggleDisabled = function() {
                        this.$element.prop("disabled", !this.options.disabled);
                        this.$wrapper.toggleClass("switch-disabled");
                        this.options.disabled = !this.options.disabled;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.readonly = function(value) {
                        if (typeof value === "undefined") {
                            return this.options.readonly;
                        }
                        value = !!value;
                        this.$wrapper[value ? "addClass" : "removeClass"]("switch-readonly");
                        this.$element.prop("readonly", value);
                        this.options.readonly = value;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.toggleReadonly = function() {
                        this.$element.prop("readonly", !this.options.readonly);
                        this.$wrapper.toggleClass("switch-readonly");
                        this.options.readonly = !this.options.readonly;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.onColor = function(value) {
                        var color;
                        color = this.options.onColor;
                        if (typeof value === "undefined") {
                            return color;
                        }
                        if (color != null) {
                            this.$on.removeClass("switch-" + color);
                        }
                        this.$on.addClass("switch-" + value);
                        this.options.onColor = value;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.offColor = function(value) {
                        var color;
                        color = this.options.offColor;
                        if (typeof value === "undefined") {
                            return color;
                        }
                        if (color != null) {
                            this.$off.removeClass("switch-" + color);
                        }
                        this.$off.addClass("switch-" + value);
                        this.options.offColor = value;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.onText = function(value) {
                        if (typeof value === "undefined") {
                            return this.options.onText;
                        }
                        this.$on.html(value);
                        this.options.onText = value;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.offText = function(value) {
                        if (typeof value === "undefined") {
                            return this.options.offText;
                        }
                        this.$off.html(value);
                        this.options.offText = value;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.labelText = function(value) {
                        if (typeof value === "undefined") {
                            return this.options.labelText;
                        }
                        this.$label.html(value);
                        this.options.labelText = value;
                        return this.$element;
                    };

                    BootstrapSwitch.prototype.destroy = function() {
                        var $form;
                        $form = this.$element.closest("form");
                        if ($form.length) {
                            $form.off("reset.bootstrapSwitch").removeData("bootstrap-switch");
                        }
                        this.$div.children().not(this.$element).remove();
                        this.$element.unwrap().unwrap().off(".bootstrapSwitch").removeData("bootstrap-switch");
                        return this.$element;
                    };

                    BootstrapSwitch.prototype._elementHandlers = function() {
                        var _this = this;
                        return this.$element.on({
                            "change.bootstrapSwitch": function(e, skip) {
                                var checked;
                                e.preventDefault();
                                e.stopPropagation();
                                e.stopImmediatePropagation();
                                checked = _this.$element.is(":checked");
                                if (checked === _this.options.state) {
                                    return;
                                }
                                _this.options.state = checked;
                                _this.$wrapper.removeClass(checked ? "switch-off" : "switch-on").addClass(checked ? "switch-on" : "switch-off");
                                if (!skip) {
                                    if (_this.$element.is(":radio")) {
                                        $("[name='" + (_this.$element.attr('name')) + "']").not(_this.$element).prop("checked", false).trigger("change.bootstrapSwitch", true);
                                    }
                                    return _this.$element.trigger("switchChange", {
                                        el: _this.$element,
                                        value: checked
                                    });
                                }
                            },
                            "focus.bootstrapSwitch": function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                                e.stopImmediatePropagation();
                                return _this.$wrapper.addClass("switch-focused");
                            },
                            "blur.bootstrapSwitch": function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                                e.stopImmediatePropagation();
                                return _this.$wrapper.removeClass("switch-focused");
                            },
                            "keydown.bootstrapSwitch": function(e) {
                                if (!e.which || _this.options.disabled || _this.options.readonly) {
                                    return;
                                }
                                switch (e.which) {
                                    case 32:
                                        e.preventDefault();
                                        e.stopPropagation();
                                        e.stopImmediatePropagation();
                                        return _this.toggleState();
                                    case 37:
                                        e.preventDefault();
                                        e.stopPropagation();
                                        e.stopImmediatePropagation();
                                        return _this.state(false);
                                    case 39:
                                        e.preventDefault();
                                        e.stopPropagation();
                                        e.stopImmediatePropagation();
                                        return _this.state(true);
                                }
                            }
                        });
                    };

                    BootstrapSwitch.prototype._handleHandlers = function() {
                        var _this = this;
                        this.$on.on("click.bootstrapSwitch", function(e) {
                            _this.state(false);
                            return _this.$element.trigger("focus.bootstrapSwitch");
                        });
                        return this.$off.on("click.bootstrapSwitch", function(e) {
                            _this.state(true);
                            return _this.$element.trigger("focus.bootstrapSwitch");
                        });
                    };

                    BootstrapSwitch.prototype._labelHandlers = function() {
                        var _this = this;
                        return this.$label.on({
                            "mousemove.bootstrapSwitch": function(e) {
                                var left, percent, right;
                                if (!_this.drag) {
                                    return;
                                }
                                percent = ((e.pageX - _this.$wrapper.offset().left) / _this.$wrapper.width()) * 100;
                                left = 25;
                                right = 75;
                                if (percent < left) {
                                    percent = left;
                                } else if (percent > right) {
                                    percent = right;
                                }
                                _this.$div.css("margin-left", "" + (percent - right) + "%");
                                return _this.$element.trigger("focus.bootstrapSwitch");
                            },
                            "mousedown.bootstrapSwitch": function(e) {
                                if (_this.drag || _this.options.disabled || _this.options.readonly) {
                                    return;
                                }
                                _this.drag = true;
                                if (_this.options.animate) {
                                    _this.$wrapper.removeClass("switch-animate");
                                }
                                return _this.$element.trigger("focus.bootstrapSwitch");
                            },
                            "mouseup.bootstrapSwitch": function(e) {
                                if (!_this.drag) {
                                    return;
                                }
                                _this.drag = false;
                                _this.$element.prop("checked", parseInt(_this.$div.css("margin-left"), 10) > -25).trigger("change.bootstrapSwitch");
                                _this.$div.css("margin-left", "");
                                if (_this.options.animate) {
                                    return _this.$wrapper.addClass("switch-animate");
                                }
                            },
                            "click.bootstrapSwitch": function(e) {
                                e.preventDefault();
                                e.stopImmediatePropagation();
                                _this.toggleState();
                                return _this.$element.trigger("focus.bootstrapSwitch");
                            }
                        });
                    };

                    BootstrapSwitch.prototype._formHandler = function() {
                        var $form;
                        $form = this.$element.closest("form");
                        if ($form.data("bootstrap-switch")) {
                            return;
                        }
                        return $form.on("reset.bootstrapSwitch", function() {
                            return window.setTimeout(function() {
                                return $form.find("input").filter(function() {
                                    return $(this).data("bootstrap-switch");
                                }).each(function() {
                                    return $(this).bootstrapSwitch("state", false);
                                });
                            }, 1);
                        }).data("bootstrap-switch", true);
                    };

                    return BootstrapSwitch;

                })();
                $.fn.extend({
                    bootstrapSwitch: function() {
                        var args, option, ret;
                        option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                        ret = this;
                        this.each(function() {
                            var $this, data;
                            $this = $(this);
                            data = $this.data("bootstrap-switch");
                            if (!data) {
                                $this.data("bootstrap-switch", data = new BootstrapSwitch(this, option));
                            }
                            if (typeof option === "string") {
                                return ret = data[option].apply(data, args);
                            }
                        });
                        return ret;
                    }
                });
                return $.fn.bootstrapSwitch.Constructor = BootstrapSwitch;
            })(window.jQuery, window);

        }).call(this);
    </script>--}}
@endsection
