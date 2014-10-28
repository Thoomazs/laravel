
<div class="col-sm-4">
    <div class="product-box">
        <a href="{{ route('products.detail', [$product->slug]) }}">
        <img src="{{ $product->photo }}" class="img-responsive" alt=""/>
            <h4>{{ $product->name }}</h4>
            <p>
                {{ $product->desc }}
            </p>
        </a>
    </div>
</div>