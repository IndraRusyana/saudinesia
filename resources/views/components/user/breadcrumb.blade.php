<div class="container d-flex my-3">
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($loop->last || $breadcrumb['url'] === null)
                <li class="breadcrumb-item ">
                    @if ($loop->first)
                        <i class="fa-solid fa-house pe-2"></i>
                    @endif
                    {{ $breadcrumb['label'] }}
                </li>
            @else
                <li class="breadcrumb-item">
                    @if ($loop->first)
                        <i class="fa-solid fa-house pe-2"></i>
                    @endif
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</div>
