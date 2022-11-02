@props([
    'name',
    'label',
    'options',
    'value' => null,
    'required' => null
])
<div class="mt-4">
    <x-input-label for="{{$name}}" :required="$required" :value="$label"/>
    @if($required)
        @php($required="required=\"true\"")
    @endif
    <select name="{{$name}}"
            class="w-48 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            {{$required}}>
        <option value="">Selecione</option>
        @foreach($options as $key => $option)
            <option @if($value && $value->$name===$key) selected @endif  value="{{$key}}">{{$option}}</option>
        @endforeach
    </select>

    <x-input-error :messages="$errors->get($name)" class="mt-2"/>
</div>
