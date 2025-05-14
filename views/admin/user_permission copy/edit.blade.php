@extends('layouts.admin')

@section('content')

    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>تعديل اذن </strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('role_w_permission', [$content->id])}}" method="post"  enctype="multipart/form-data">
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

                            <div class="row">
                                @include('.forms.selectOption', ['label' => 'نوع التصريح', 'name' => 'role_perm_role_id','disName'=>'role_name_ar', 'options' => $roles,"content"=>$content])
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div><label>الصلاحيات</label></div>
                                            <select class="js-example-basic-multiple" name="permissions" >
                                            <?php foreach($permissions as $permission){?>
                                                <option value="{{$permission['id']}}" <?php if($permission["id"]==$content["role_perm_permission_id"]) echo "selected";?>><?php echo $permission['permissions_name_ar'];?></option>
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
                                            تحديث
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
@endsection
