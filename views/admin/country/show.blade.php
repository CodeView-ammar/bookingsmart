@extends('layouts.admin')

@section('content')
    <section class="content py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('country.index') }}">دولة</a></li>
                <li class="breadcrumb-item active" aria-current="page">view</li>
            </ol>
        </nav>
        <div class="card ">
            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">اسم البلد</span>
                    {{ $content->country_ar_name }}                </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">البلد والاسم</span>
                    {{ $content->country_en_name }}                </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">البلد نشط</span>
                    {{ $content->country_isactive ? 'Yes' : 'No' }}                </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">رمز مخصص البلد</span>
                    {{ $content->country_cust_code }}                </li>


            </ul>
        </div>
    </section>
@endsection
