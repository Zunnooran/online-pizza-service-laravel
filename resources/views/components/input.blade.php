@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['style' => 'box-shadow: none;
outline: none;']) !!}>
