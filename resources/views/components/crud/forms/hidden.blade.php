@props([
    'name',
    'value',
    'ignore' => false
])

@php
    if($ignore === false){
        if($value) $value = $value->$name;
        if(old($name)) $value = old($name);
    }
@endphp
<div>
    <input type="hidden" name="{{$name}}" value="{{$value}}">
</div>
