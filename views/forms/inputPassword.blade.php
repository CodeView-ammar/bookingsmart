<!-- resources/views/form.blade.php -->
<div class="col-md-6">
    <div class="form-group">
<label>{{ $label }}</label>
<input name="{{ $name }}" class="form-control" type="password" value="{{ old($name, isset($content) ? $content->$name : '') }}" >

@if($errors->has($name))
    <div class="text-danger" role="alert">
        <strong>{{ $errors->first($name) }}</strong>
    </div>
@endif
    </div>
</div>
