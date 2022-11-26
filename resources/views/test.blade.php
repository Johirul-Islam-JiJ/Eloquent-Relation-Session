<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Welcome to {{ config('app.name') }}</h1>

<br>

@if($test)
    <h2>Something</h2>
@else
    <h4>Nothing</h4>
@endif
<br>
@foreach($test as $item)
    <li>
        {{ $item }}
    </li>
@endforeach
<br>
@forelse($test as $item)
    <li>
        {{ $item }}
    </li>
@empty
    <span>No Data</span>
@endforelse
<br>
@for($count = 0; $count < 10; $count++)
    @continue($count == 4)
    <li>{{ $count + 1 }}</li>
    @break($count == 7)
@endfor
<br>
@switch($random)
    @case(1)
        <h5>first</h5>
        @break
    @case(2)
        <h5>Second</h5>
        @break
    @case(3)
        <h5>Third</h5>
        @break
        @break
    @default
        <h5>Greater than 3</h5>
@endswitch

@php
    $count = 5;
@endphp

@while($count<10)
    <li>{{ $count }}</li>
    @php
        $count++;
    @endphp
@endwhile

</body>
</html>
