@extends('layouts.admin')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة منح الاذن </strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('role_w_permission') }}" method="post"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                @include('.forms.selectOption', ['label' => 'نوع التصريح', 'name' => 'role_perm_role_id','disName'=>'role_name_ar', 'options' => $roles])
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div><label>الصلاحيات</label></div>
                                            <select class="js-example-basic-multiple" name="permissions[]" multiple="multiple">
                                            <?php foreach($permissions as $permission){?>
                                                <option value="{{$permission['id']}}"><?php echo $permission['permissions_name_ar'];?></option>
                                            <?php } ?>
                                            </select>
                                    @if($errors->has($permissions))
                                        <div class="text-danger" role="alert">
                                    <strong>{{ $errors->first($permissions) }}</strong>
                                        </div>
                                    @endif
                                </div>
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
                                        <a href="{{ route('role_w_permission.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
@endsection
