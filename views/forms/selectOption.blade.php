<div class="col-md-6">
    <div class="form-group">
        <label>{{ $label }}</label>
        <select id="{{ $name }}" name="{{ $name }}" class="form-control">
            @foreach ($options as $option)
                <option value="{{ $option->id }}" @if ($option->id == old("$name", isset($content) ? $content->$name : '')) selected @endif>{{ $option->$disName }}</option>
            @endforeach
        </select>
        @if($errors->has($name))
            <div class="text-danger" role="alert">
                <strong>{{ $errors->first($name) }}</strong>
            </div>
        @endif
    </div>
</div>
