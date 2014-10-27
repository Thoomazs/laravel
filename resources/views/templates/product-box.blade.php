
<div class="col-sm-4">
    <div class="product-box">
        <a href="{{ route('products.detail', [$product->slug]) }}">
            <h4>{{ $product->name }}</h4>
            <p>
                {{ $product->desc }}
            </p>
        </a>
    </div>
</div>