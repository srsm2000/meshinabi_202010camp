@extends('layouts.app')

@section('title', '詳細画面')

@section('content')
    <table class="table-bordered mb-5 mt-3">
        {{-- mbはマージンボトム、mtはmargin top --}}
        <colgroup span="1" style="width:200px;background-color:#efefef;"></colgroup>
        {{-- colgroupはカラムを設定するときに使う。 --}}
        @include('layouts.restaurant', compact('restaurant'))
        <tbody>
            <tr>
                <th>店名</th>
                <td>
                    <p>{{ $restaurant->name }}</p>
                    <p>{{ $restaurant->name_kana }}</p>
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $restaurant->address }}</td>
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>{{ $restaurant->category->name }}</td>
            </tr>
            <tr>
                <th>営業時間</th>
                <td>{{ $restaurant->opentime }}</td>
            </tr>
            <tr>
                <th>定休日</th>
                <td>{{ $restaurant->holiday }}</td>
            </tr>
            <tr>
                <th>その他</th>
                <td>{{ $restaurant->note }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ action('RestaurantController@index') }}">戻る</a>
    {{-- urlをコントローラーのアクションで指定できる --}}

@endsection
