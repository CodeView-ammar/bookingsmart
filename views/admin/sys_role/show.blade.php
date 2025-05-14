@extends('layouts.admin')

@section('content')
    <section class="content py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">المستخدمين</a></li>
                <li class="breadcrumb-item active" aria-current="page">view</li>
            </ol>
        </nav>
        <div class="card ">
            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">صورة هوية المستخدم</span>
                    @if($content->user_userid_copy) <a href="{{ Storage::url($content->user_userid_copy)}}">{{ Storage::url($content->user_userid_copy)}}</a> @endif                </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">اسم تسجيل دخول المستخدم</span>
                    {{ $content->name }}                </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">منشئ المستخدم</span>
                    {{ $content->userUser ? $content->userUser->name : null }}                 </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">البريد الالكتروني للمستخدم</span>
                    {{ $content->email }}                </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">كلمة مرور المستخدم</span>
                    {{ $content->password }}                </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">نوع المستخدم</span>
                    {{ $content->userType ? $content->userType->user_type_name_ar : null }}                 </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">دور المستخدم</span>
                    {{ $content->userRole ? $content->userRole->role_name_ar : null }}                 </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">منشئ المستخدم</span>
                    {{ $content->userByUserid ? $content->userByUserid->name : null }}                 </li>


                <li class="list-group-item">
                    <span class="badge bg-primary rounded-pill">رمز مخصص للمستخدم</span>
                    {{ $content->user_cust_code }}                </li>


            </ul>
        </div>
    </section>
@endsection
