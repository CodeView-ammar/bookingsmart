
<div class="col-md-3">
    <div class="form-group">
       @if(isset($checkboxLabel)) <label for="{{ $name }}">{{ $checkboxLabel }}</label>@endif
        <div style="width:30px;"  class="div_checkbox {{ isset($form) ?'smunt'.$form:''}}">
            <input id="{{ $name }}" {{ isset($form) ? "form=$form" : '' }} class="switch" name="{{ $name }}" {{ isset($checked) ? 'checked' : '' }} {{ isset($disabled) ? 'disabled' : '' }} type="checkbox" {{ old("$name", isset($content) ? $content->$name : '') ? 'checked' : '' }} data-size="mini">
        </div>
        @if($errors->has($name))
            <div class="text-danger" role="alert">
                <strong>{{ $errors->first($name) }}</strong>
            </div>
        @endif
    </div>
</div>

