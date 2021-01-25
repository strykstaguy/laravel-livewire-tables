<select
    name="filters.{{$view->id}}"
    :id="$view->id"
    class="form-control"
>
    <option value="" selected>---</option>
    @foreach($view->options() as $key => $label)
        <option value="{{ $key }}" {{ $view->selected() === $key ? 'selected' : ''}}>{{ $label }}</option>
    @endforeach
</select>
