<!-- resources/views/components/select.blade.php -->
<div class="col-md-6">
    <div class="form-group">
    <label>{{ $label }}</label>
        <select name="{{ $name }}" class="form-control">
            @foreach ($options  as $key => $value)
                <option value="{{ $key }}" @if ($key == old("$name", isset($content) ? $content->$name : '')) selected @endif>{{ $value}}</option>
            @endforeach
        </select>
        @if($errors->has($name))
            <div class="text-danger" role="alert">
                <strong>{{ $errors->first($name) }}</strong>
            </div>
        @endif
    </div>
</div>
