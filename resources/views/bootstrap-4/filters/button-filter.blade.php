<input
    type="button"
    class="btn brn-primary"
    name="filters.{{$view->id}}"
    id="{{$view->id}}"
    value="{{$view->title}}"
    wire:model="filters.{{$view->id}}"
/>
