
{{--@if ($type === "small")--}}
{{--<div id="pager" class="small">--}}
    {{--<div class="item-count">--}}
        {{--{{ $paginator->getFrom() }}–{{ $paginator->getTo() }}--}}
        {{--<span class="muted font-weight-light">/</span>--}}
        {{--{{ $paginator->getTotal() }}--}}
    {{--</div>--}}
    {{--<ul class="pagination">--}}
        {{--<li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">--}}
            {{--<a--}}
            {{--@if($paginator->currentPage() !== 1) href="{{ $paginator->url($paginator->currentPage()-1) }}" @endif><i class="fa fa-angle-left"></i></a>--}}
        {{--</li>--}}
        {{--<li class="{{ ($paginator->currentPage() == $paginator->lastItem()) ? ' disabled' : '' }}">--}}
            {{--<a--}}
            {{--@if(($paginator->currentPage() !== $paginator->lastItem())) href="{{ $paginator->url($paginator->currentPage()+1) }}" @endif>--}}
            {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</div>--}}

{{--@else--}}

@if ($paginator->lastItem() > 0)
<div id="pager">
    <ul class="pagination">

        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a
            @if($paginator->currentPage() !== 1) href="{{ $paginator->url(1) }}" @endif><i class="fa fa-angle-double-left"></i></a>
        </li>

        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a
            @if($paginator->currentPage() !== 1) href="{{ $paginator->url($paginator->currentPage()-1) }}" @endif><i class="fa fa-angle-left"></i></a>
        </li>


        @for ($i = ( (($paginator->currentPage() - 5) < 1) ? 1 : ($paginator->currentPage() - 5) ); $i <= (  (($paginator->currentPage() + 5) > $paginator->lastItem()) ? $paginator->lastItem() : ($paginator->currentPage() + 5)); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="{{ ($paginator->currentPage() == $paginator->lastItem()) ? ' disabled' : '' }}">
            <a
            @if(($paginator->currentPage() !== $paginator->lastItem())) href="{{ $paginator->url($paginator->currentPage()+1) }}" @endif>
            <i class="fa fa-angle-right"></i>
            </a>
        </li>

        <li class="{{ ($paginator->currentPage() == $paginator->lastItem()) ? ' disabled' : '' }}">
            <a
            @if(($paginator->currentPage() !== $paginator->lastItem())) href="{{ $paginator->url($paginator->lastItem()) }}" @endif>
            <i class="fa fa-angle-double-right"></i>
            </a>
        </li>
    </ul>
</div>

{{ var_dump($paginator->currentPage()) }}
{{ var_dump($paginator->lastItem()) }}
@endif
{{--@endif--}}

