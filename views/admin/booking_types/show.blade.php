@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.booking_types.index') }}">انواع الحجز</a></li>
            <li class="breadcrumb-item active" aria-current="page"> view </li>
        </ol>
    </nav>



    <section class="content py-5">
        <div class="card ">

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">اسم النوع</span>
                    {{ $content->btype_name }}                </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">المستخدم</span>
                    {{ $content->btypeByUserid ? $content->btypeByUserid->name : null }}                 </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">كود العميل</span>
                    {{ $content->typeCustCode ? $content->typeCustCode->name : null }}                 </li>


            </ul>
        </div>
    </section>
@endsection
