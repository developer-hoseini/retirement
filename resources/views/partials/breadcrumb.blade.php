<div class="d-flex flex-wrap justify-content-between">
    <h5 class="h6">{{ ts_lang('Admin panel') }}</h5>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M 6 1.5 L 4.5 0 L 0.5 4 L 4.5 8 L 6 6.5 l -2.5 -2.5 z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('app.index') }}">{{ ts_lang('Admin panel') }}</a></li>
            @foreach($breadcrumb as $item)
                @if($loop->last)
                    <li class="breadcrumb-item active" aria-current="page">{{ $item['text'] }}</li>
                @else
                    @if(@isset($item['params']) && count($item['params']))
                    <li class="breadcrumb-item"><a href="{{ route($item['route_name'], $item['params']) }}">{{ $item['text'] }}</a></li>
                    @else
                    <li class="breadcrumb-item"><a href="{{ route($item['route_name']) }}">{{ $item['text'] }}</a></li>
                    @endif
                @endif
            @endforeach
        </ol>
    </nav>
</div>
