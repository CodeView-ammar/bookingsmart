@extends('layouts.admin')

@section('content')

<div class="container mt-1">
    <div class="row">
        
        <h2 class="panel-title width-100p c-blue w-500 f-20 carrois text-center">
        @section('title')
           <p style="font-weight: bold;"> شاشة عرض حجوزات القاعة المبنى : {{ $content->hallBulid ? $content->hallBulid->build_no : "غير محدد" }}
                | الإدارة: {{ $content->hallDept ? $content->hallDept->dept_name_ar : null }}
                | سعة القاعة: {{ $content->hall_capacity }}</p>
        @endsection
                <div>
                </div>
                <div>
                </div>
            </h2>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <div class=" pull-left">

                       <!--  <button class="btn btn-danger" onclick="goBack()">&nbsp;<i class="fa fa-undo"></i>&nbsp;   الصفحة السابقة </button>-->
                    </div>
                </div>
            </div>
            <div class="col-8 text-center">
                <h3 id="weekDate">Current Week</h3>
            </div>
        </div>


        <div class="row" >
                <div class="col-sm-12">
                    <div class="col-xs-4" style="
    text-align: left;        
">
                            <button class="btn btn-danger" onclick="prevWeek()">الاسبوع السابق</button>
                    </div>
                    <div class="col-xs-4">
                    <button type="button" class="btn btn-info" id="openModalBtn" style="width: 295px;font-weight: 900;" >
                    استكمال الحجز
                    </button>
                    </div>
                    <div class="col-xs-4">
                            <button class="btn btn-danger" onclick="nextWeek()">الاسبوع القادم</button>
                    </div>
                </div>
            </div>

            <div id="updateResult"></div>


            <!-- Modal content -->

            <div id="reservationModal" style="display: none;">
                <div class="modal-dialog">
<!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
     

        <table id="scheduleTable" class="table table-bordered mt-3">
            <thead>

            </thead>
            <tbody id="scheduleBody">
            <!-- Schedule content will be added here dynamically using JavaScript -->
            </tbody>
        </table>

<style>
    .modal-dialog {
    max-width: 100%; /* تعيين أقصى عرض إلى 90% */
}

.modal-content {
    height: auto; /* اجعل المحتوى قابلاً للتكيف */
    max-height: 80vh; /* تعيين الحد الأقصى للارتفاع */
    overflow-y: auto; /* إضافة شريط تمرير عند تجاوز المحتوى */
}
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document"style="
    width: 60%;
"> <!-- فئة modal-xl هنا -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إدارة الحجز</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              
                <input type="hidden" id="user_id" value="{{ auth()->id() }}" name="user_id">
                <input type="hidden" id="booking_hall_code" value="{{ $content->id }}" name="booking_hall_code">

                <div class="clear-fix"></div>
                <br>

                <table class="table table-striped table-hover dataTable" id="table-editable" aria-describedby="table-editable_info">
                    <tbody>
                        <tr id="usersContainer">
                            <!-- سيتم إضافة المستخدمين هنا -->
                        </tr>
                    </tbody>
                </table>
                <button type="button" onclick="addUserField()" class="btn btn-danger">إضافة مستخدم</button>

                <table class="table table-striped table-hover dataTable" id="table-editable-spec" aria-describedby="table-editable_info">
                    <tbody>
                        <div id="table-bookings-spec">

                        </div>
                        <tr id="specContainer" style="margin-top: 29px;">
                            <!-- سيتم إضافة المميزات الخاصة هنا -->
                        </tr>
                    </tbody>
                </table>
                <button type="button" onclick="addSpecField()" class="btn btn-danger">إضافة مميزات خاصة</button><br>
                 
                    
                    @include('.forms.inputChekBox', ['label' => 'دعم فني/تقنية معلومات', 'checkboxLabel' => 'دعم فني/تقنية معلومات', 'name' => 'suported','id'=>"suported"])
                    <div class="col-md-6" style="display:none" id="g_suported_note">
                            <div class="form-group">
                        <label>دعم فني/تقنية معلومات</label>
                                <textarea name="suported_note" id="suported_note" class="form-control" >  </textarea>
                        @if($errors->has('suported_note'))
                            <div class="text-danger" role="alert">
                                <strong>{{ $errors->first(suported_note) }}</strong>
                            </div>
                        @endif
                            </div>
                        </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                     
		
            
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="button" onclick="updateBookings()" class="btn btn-success save-event">إرسال الحجز</button>
            </div>
        </div>
    </div>
</div>
  @push('scripts')
        <script>
document.getElementById("suported").addEventListener("change",function(){
    let textg=document.getElementById("g_suported_note");
    textg.style.display=this.checked ? "block" : "none"; 
});
$(document).ready(function() {
        // أغلق القائمة عند الدخول إلى الصفحة
        if ($("#sidebar").hasClass("mCustomScrollbar _mCS_1")) {
            
            $(".navbar-toggle").click(); // استدعاء حدث النقر لإغلاق القائمة
        }
    });

const scheduleBody=document.getElementById('scheduleBody');
            const weekDate=document.getElementById('weekDate');
            let currentWeek=new Date();
            var bookings=@json($content->bookingHallCode);
            var specificationData=@json(specification::get());
            function getDayOfWeek(dateString) {
        const [day, month, year] = dateString.split('/').map(Number);
        const dateObject = new Date(year, month - 1, day);
        const daysOfWeek = ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
        const dayIndex = dateObject.getDay();
        return {
            dayName: daysOfWeek[dayIndex],
            dayIndex: dayIndex + 1
        }
    }
            
    function renderSchedule() {
        scheduleBody.innerHTML = "";
        const daysOfWeek = ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
        const headerRow = document.createElement('tr');
        for (let day = 0; day < 7; day++) {
            const headerCell = document.createElement('th');
            const currentDay = new Date(currentWeek.getFullYear(), currentWeek.getMonth(), currentWeek.getDate() + day);
            const date = currentDay.getDate();
            const month = currentDay.getMonth() + 1;
            const year = currentDay.getFullYear();
            var DayName = getDayOfWeek(`${date}/${month}/${year}`).dayName
            headerCell.innerHTML = `<strong>${DayName}</strong><br>${date}/${month}/${year}`;
                    headerRow.appendChild(headerCell)}
                scheduleBody.appendChild(headerRow);
                var bookings=@json($content->bookingHallCode);
                var bookingHour;
                var dayes=@json($content->hallDays);
                for(let hour=7;hour<20;hour++)
                {const row=document.createElement('tr');
                    for(let day=0;day<7;day++)
                    {
                        const cell=document.createElement('td');
                        const startTime=hour<10?`0${hour}:00`:`${hour}:00`;
                        const endTime=hour+1<10?`0${hour + 1}:00`:`${hour + 1}:00`;
                        const currentDay=new Date(currentWeek.getFullYear(),currentWeek.getMonth(),currentWeek.getDate()+day);
                        const date=currentDay.getDate();
                        const month=currentDay.getMonth()+1;
                        const year=currentDay.getFullYear();
                        var Dayindex=getDayOfWeek(`${date}/${month}/${year}`).dayIndex

                        const dayAvailability=dayes.find(d=>d.sys_day_id===Dayindex&&d.sys_from_hour<=startTime&&d.sys_to_hour>=endTime);
                        if(dayAvailability){
                            
                            cell.innerHTML=` <div class='date' >${year}-${month}-${date}</div><strong class=time> ${startTime}-${endTime} </strong><br>متاح`;
                            cell.classList.add('green-cell')
                            cell.classList.add('select-cell-text');
                        }else{
                                cell.textContent=`${startTime} - ${endTime}\nغير متاح`;cell.classList.add('booked-cell')
                            }
                        @foreach($content->bookingHallCode as $booking)
                    @php
                        $bookingHours=$booking->bookingHours;@endphp
                    var bookinghours=@json($bookingHours);
                    const booking{{$booking->id}}=bookinghours.find(
                        b=>{const bookingDate=new Date(b.booking_start);
                        const bookingDay=bookingDate.getDate();
                        const bookingMonth=bookingDate.getMonth();
                        const bookingYear=bookingDate.getFullYear();
                        const bookingHour=bookingDate.getHours()-3;
                        return bookingYear===currentDay.getFullYear()&&bookingMonth===currentDay.getMonth()&&bookingDay===currentDay.getDate()&&bookingHour===hour}
                    );
                        if(booking{{$booking->id}})
                            {cell.innerHTML=`<strong id='{{$booking->id}}'>${startTime} - ${endTime}</strong><br>${date}-${month}-${year}<br>{{$booking->id}} محجوز`;
                                cell.classList.add('red-cell');
                                cell.classList.add('select-cell-text');
                                cell.dataset.bookingId={{$booking->id}};
                                cell.addEventListener('click',()=>changeCellColor(cell))
                            }
                   @endforeach  row.appendChild(cell);
                    cell.addEventListener('click',()=>changeCellColor(cell))}
                    scheduleBody.appendChild(row)}}
          
                    function updateWeekDate(){
                const options={weekday:'long',year:'numeric',month:'long',day:'numeric'};
                weekDate.textContent=currentWeek.toLocaleDateString('en-US',options)
            }
        
        
                function prevWeek(){currentWeek.setDate(currentWeek.getDate()-7);renderSchedule();updateWeekDate()}
            function nextWeek(){currentWeek.setDate(currentWeek.getDate()+7);renderSchedule();updateWeekDate()}
              document.getElementById('openModalBtn').addEventListener('click', function() {
                    const selectedCells = document.querySelectorAll('.blue-cell'); 
                    if (selectedCells.length === 0) {
                        alert('يرجى تحديد الفترات الزمنية قبل الاستمرار في الحجز.');
                    } else {
                        $('#exampleModal').modal('show'); 
                    }
                });
                
                let selectedTimes = [];
                function changeCellColor(cell) {
                    if (cell.classList.contains('red-cell')) {
                        const bookingId = cell.dataset.bookingId;
                        window.location.href = `/bookings/${bookingId}`;
                    }
                    if (cell.classList.contains('green-cell')) {
                        cell.classList.remove('green-cell');

                        // استخدام querySelector للوصول إلى العنصر داخل الخلية
                        const dateElement = cell.querySelector('.date'); // افترض أن لديك عنصر يحمل الكلاس .date داخل الخلية
                        const timeElement = cell.querySelector('.time'); // افترض أن لديك عنصر يحمل الكلاس .time داخل الخلية

                        if (dateElement && timeElement) {
                            const dateText = dateElement.textContent; // نص التاريخ
                            const timeText = timeElement.textContent; // نص الوقت

                            // إضافة التاريخ والوقت إلى القائمة
                            selectedTimes.push({ date: dateText, time: timeText });
                        } else {
                            alert('لا يوجد عنصر يحمل الكلاس .date أو .time في هذه الخلية.');
                            return false;
                        }

                        cell.classList.add('blue-cell');
                    } else if (cell.classList.contains('blue-cell')) {
                        cell.classList.remove('blue-cell');
                        cell.classList.add('green-cell');
                        cell.classList.add('select-cell-text');
                        // إزالة التاريخ والوقت من القائمة عند إلغاء تحديد الخلية
                        const dateElement = cell.querySelector('.date');
                        const timeElement = cell.querySelector('.time');
                        if (dateElement && timeElement) {
                            const dateText = dateElement.textContent;
                            const timeText = timeElement.textContent;

                            selectedTimes = selectedTimes.filter(item => !(item.date === dateText && item.time === timeText));
                            console.log(selectedTimes); // طباعة القائمة بعد الإزالة
                        }
                    }
                }
            renderSchedule();updateWeekDate()
            function goBack() {
                window.history.back();
            }

            function updateBookings() {
                const blueCellDates = [];
                const blueCells = document.querySelectorAll('.blue-cell');
                
                blueCells.forEach(cell => {
        const startTime = cell.innerText.split('-')[0].replace(/\n/g, ' ').trim();
        blueCellDates.push({ startTime });
    });

    const bookingCoordinatorId =1;
    const suported=document.getElementById('suported').checked ;
    const suported_note=document.getElementById('suported_note').value;
    const isConfirmed = false;
    const isActive = true;
    const user_id = document.getElementById('user_id').value;
    const booking_hall_code = document.getElementById('booking_hall_code').value;

    const usersData = [];
    document.querySelectorAll('#usersContainer .row').forEach(userRow => {
        usersData.push({
            title: '',
            name: userRow.querySelector('[name^="hall_user_name"]').value,
            mobile: userRow.querySelector('[name^="hall_user_Mobile"]').value,
            email: userRow.querySelector('[name^="hall_user_email"]').value,
        });
    });
    
    const specData = [];
    document.querySelectorAll('#specContainer .row').forEach(specRow => {
        specData.push({
            Special_specs_id: specRow.querySelector('[name^="Special_specs_id"]').value,
            Special_want_no: specRow.querySelector('[name^="Special_want_no"]').value,
        });
    });
    if (validateForm()) {
    
    const formData = new FormData();
    formData.append('blueCellDates', JSON.stringify(
        blueCellDates));
    formData.append('selectedTimes', JSON.stringify(selectedTimes));
    
    formData.append('booking_Coordinator_id', bookingCoordinatorId);
    formData.append('booking_is_confirmed', isConfirmed);
    formData.append('booking_isactive', isActive);
    formData.append('user_id', user_id);
    
    
    formData.append('booking_hall_code', booking_hall_code);
    formData.append('usersData', JSON.stringify(usersData));
    formData.append('specData', JSON.stringify(specData));
    console.log(suported);
    formData.append('suported', suported);
    formData.append('suported_note', suported_note);

    fetch('http://localhost/bookingweb/api/bookings', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (!response.ok) { 
            return response.text().then(errorMessage => {
                throw new Error(`HTTP Error: ${response.status}\nResponse: ${errorMessage}`);
            });
        }
        return response.json();
    })
    .then(data => {
        console.log('تم إرسال البيانات بنجاح:', data);
        document.getElementById('updateResult').innerText = 'تم تحديث الحجز بنجاح!';
        window.location.reload();
    })
    .catch(error => {
        console.error('❌ حدث خطأ أثناء إرسال البيانات:', error);
        document.getElementById('updateResult').innerText = 'حدث خطأ أثناء تحديث الحجز.';
        alert("خطأ أثناء الإرسال: " + error.message);
    });
}
}

            
            
                document.addEventListener('DOMContentLoaded',
            function(){
                const openModalBtn=document.getElementById('openModalBtn');
                const reservationModal=document.getElementById('reservationModal');
                const closeModalBtns=document.getElementsByClassName('close-modal');
                const blueCells=document.querySelectorAll('.blue-cell');
                
                for(
                    const closeButton of closeModalBtns)
                    {
                        closeButton.addEventListener('click',function(){
                            reservationModal.style.display='none'}
                        )
                    }
                window.addEventListener('click',function(event)
                {
                    if(event.target===reservationModal)
                    {
                        reservationModal.style.display='none'
                    }
                })
            });
                let userCount=1;let specCount=1;function addUserField(){const usersContainer=document.getElementById('usersContainer');const userRow=document.createElement('div');userRow.className='row';const row=document.createElement('tr');const titleField=createUserField('Title',`hall_user_title[${userCount}]`);const nameField=createUserField('Name',`hall_user_name[${userCount}]`);const mobileField=createUserField('Mobile',`hall_user_Mobile[${userCount}]`);const emailField=createUserField('Email',`hall_user_email[${userCount}]`);const colDelete=deletdRew(()=>removeUserRow(userRow));userRow.appendChild(nameField);userRow.appendChild(mobileField);userRow.appendChild(emailField);userRow.appendChild(colDelete);usersContainer.appendChild(userRow);userCount++

                }
          function validateForm() {
    const email = document.querySelector('input[name^="hall_user_email"]');
    const mobile = document.querySelector('input[name^="hall_user_Mobile"]');

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // نمط البريد الإلكتروني
    const mobilePattern = /^\+?[\d\s]{7,15}$/; // نمط رقم الهاتف (يمكنك تعديله حسب الحاجة)

    if (!emailPattern.test(email.value)) {
        alert('يرجى إدخال بريد إلكتروني صحيح.');
        return false;
    }

    if (!mobilePattern.test(mobile.value)) {
        alert('يرجى إدخال رقم هاتف صحيح.');
        return false;
    }

    return true; // إذا كانت جميع الفحوصات ناجحة
}

// document.querySelector('.save-event').addEventListener('click', function () {
//     if (if (validateForm()) {
//         updateBookings(); // إذا كانت الفلاتر ناجحة، قم بإرسال البيانات
//      {
//         updateBookings(); // إذا كانت الفلاتر ناجحة، قم بإرسال البيانات
//     }
// });


              function addSpecField(){
            const specContainer=document.getElementById('specContainer');
           
            const specRow=document.createElement('div');
            specRow.className='row';
            specRow.style.margin_top= "29px";
            const row=document.createElement('tr');
            const specField=createSelectField('Special_specs_id',`Special_specs_id[${specCount}]`,specificationData);
            const noField=createNoField('كمية',`Special_want_no[${specCount}]`);
            const colDelete=deletdRew(()=>removeUserRow(specRow));
            specRow.appendChild(specField);
            specRow.appendChild(noField);
            specRow.appendChild(colDelete);
            specContainer.appendChild(specRow);specCount++}
            function createUserField(placeholder, name) {
                const colDiv = document.createElement('td');
                const inputField = document.createElement('input');
                inputField.className = 'form-control small';
                inputField.type = 'text';
                inputField.name = name;
                inputField.placeholder = placeholder;
                if(placeholder=="Email")
                    inputField.style.width = '313px';

                colDiv.appendChild(inputField);
                return colDiv;
            }
            function createNoField(placeholder,name){
                const colDiv=document.createElement('td');
                const inputField=document.createElement('input');
                inputField.className='form-control small ';
                inputField.max='10';
                inputField.min='1';
                inputField.value='1';
                inputField.type='number';inputField.name=name;
                inputField.placeholder=placeholder;
                colDiv.appendChild(inputField);
                return colDiv
            }
            function createSelectField(placeholder,name,options){
                const colDiv=document.createElement('td');
                const selectElement=document.createElement('select');
                selectElement.className='form-control small ';
                selectElement.name=name;options.forEach(option=>{const optionElement=document.createElement('option');optionElement.value=option.id;optionElement.textContent=option.specs_name_ar;selectElement.appendChild(optionElement)});colDiv.appendChild(selectElement);return colDiv}
            function deletdRew(onclick){
                const colDiv=document.createElement('td');
                const deleteButton=document.createElement('button');
                deleteButton.className='btn btn-danger';
                deleteButton.type='button';
                deleteButton.onclick=onclick;
                deleteButton.textContent='حذف';
                colDiv.appendChild(deleteButton);
                return colDiv
            }
            function removeUserRow(row){row.remove()}
            addUserField();
    addSpecField();
        </script>
    @endpush
@endsection

@section('custom-css')
    <style>
        td {
            height: 50px;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
        }
        /* إضافة خطوط بين الخلايا */
        #scheduleTable td {
            border: 2px solid #6d4646; /* لون الخط بين الخلايا */
            padding: 8px; /* تضبيط التباعد داخل الخلية */
        }

        .green-cell { background-color: var(--secondary-color) ; }
        .blue-cell { background-color:  #F2C75C; }
        .red-cell  { background-color: #A13525; }
        .select-cell-text  { color:rgb(255, 255, 255); }
        .gray-cell { background-color: var(--secondary-color); }

    </style>
@endsection
