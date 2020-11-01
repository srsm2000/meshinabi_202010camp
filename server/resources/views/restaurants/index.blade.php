@extends('layouts.app')

@section('title', '一覧画面')

@section('content')
    <ul>
        @foreach ($restaurants as $restaurant)
            @switch($restaurant->reccomend)
                @case(1)
                    <li  class="list-unstyled border mb-5 pl-3 shadow">
                        @include('layouts.restaurant', compact('restaurant'))
                    </li>
                    @break
                @case(2)
                    <li  class="list-unstyled border mb-5 pl-3 shadow">
                        @include('layouts.restaurant', compact('restaurant'))
                    </li>
                    @break
                @case(3)
                    <li  class="list-unstyled border mb-5 pl-3 shadow">
                        @include('layouts.restaurant', compact('restaurant'))
                    </li>
                @break
                @default
                    <li  class="list-unstyled border mb-5 pl-3 shadow">
                        @include('layouts.restaurant', compact('restaurant'))
                    </li>
            @endswitch
        @endforeach
    </ul>
    <div class="d-flex justify-content-center">
        {{ $restaurants->links() }}
    </div>

@endsection
