<div class='row'>
    <div>
        <img src="{{ $restaurant->img_path }}" alt="" class="square-img">
    </div>
    <div class='ml-3'>
        <div class='mt-3 mb-3'>
            <h3>
                <a href="/restaurants/{{ $restaurant->id }}">{{ $restaurant->name }}</a>
                @if ($restaurant->reccomend)
                    {{ $restaurant->reccomend }}位
                @endif
            </h3>
        </div>
        <div>
            <div>{{ $restaurant->pr_short }}</div>
            <div>{{ $restaurant->opentime }}</div>
            <ul class="menu_images">
                @foreach ($restaurant->menus as $menu)
                    <li class="item"><img src="{{ url($menu->img_path) }}" class="square-img-s"></li>
                    @break($loop->iteration >= 7)
                @endforeach
            </ul>
        </div>
    </div>
</div>
