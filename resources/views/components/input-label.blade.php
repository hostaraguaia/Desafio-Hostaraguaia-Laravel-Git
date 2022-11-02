@props([
    'value',
    'required' => null
])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }} @if($required) * @endif
</label>
