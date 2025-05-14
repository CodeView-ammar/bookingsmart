@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.sys_days.index') }}">الايام</a></li>
            <li class="breadcrumb-item active" aria-current="page"> view </li>
        </ol>
    </nav>



    <section class="content py-5">
        <div class="card ">

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">اسم اليوم</span>
                    {{ $content->day_name }}                </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">المستخدم</span>
                    {{ $content->udayByUserid ? $content->udayByUserid->name : null }}                 </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">كود العميل</span>
                    {{ $content->udayCustCode ? $content->udayCustCode->name : null }}                 </li>


            </ul>
        </div>
    </section>
@endsection
