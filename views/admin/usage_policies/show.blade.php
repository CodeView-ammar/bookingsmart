@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.usage_policies.index') }}">دليل الاستخدام</a></li>
            <li class="breadcrumb-item active" aria-current="page"> view </li>
        </ol>
    </nav>

    <section class="content py-5">
        <div class="card ">

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">policies_hall_id</span>
                    {{ $content->policiesHall ? $content->policiesHall->hall_code : null }}                 </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">policies_text</span>
                    {{ $content->policies_text }}                </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">policies_by_userid</span>
                    {{ $content->policiesByUserid ? $content->policiesByUserid->name : null }}                 </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">policies_cust_code</span>
                    {{ $content->policiesCustCode ? $content->policiesCustCode->cust_code : null }}                 </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">policies_isactive</span>
                    {{ $content->policies_isactive ? 'مفعل' : 'غير مفعل' }}                </li>


            </ul>
        </div>
    </section>
@endsection
