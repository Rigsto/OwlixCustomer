<a href="{{ url('item/'.$product->id.'/detail') }}">
    <div class="card">
        <div class="p-2">
            <div class="square-image">
                <img src="{{ $product->store_item_images[0]->image_url }}" alt="">
            </div>
        </div>
        
        <div class="card-body">
            <p class="card-text text-muted" style="font-size: 12px;">{{ $product->store->name }}</p>
            <h4 class="card-title mb-2">{{ $product->name }}</h4>
            <div class="product-rate-star mb-2">
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="ml-2">{{ $product->rating_count }}</span>
            </div>
            <div class="product-price d-flex justify-content-between align-items-end">
                <h5 class="font-bold">Rp{{ number_format($product->store_item_price, 0, ',', '.') }}</h5>
            </div>
        </div>
    </div>
</a>
