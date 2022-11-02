@props([
    'name',
    'label',
    'mask' => null,
    'maskReverse' => null,
    'value' => null,
    'required' => null,
    'type' => 'text',
])
@php
if($value) $value = $value->$name;
if(old($name)) $value = old($name);
@endphp
<div class="mt-4">
    <x-input-label :required="$required" for="{{$name}}" :value="$label" />

    <x-text-input id="{{$name}}" class="block w-full" type="{{$type}}" :data-mask="$mask" data-value="{!! $value !!}" :data-mask-reverse="$maskReverse" name="{{$name}}" :value="$value" :required="$required" autofocus />

    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
