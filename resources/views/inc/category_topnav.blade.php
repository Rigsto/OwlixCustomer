<section>
    <div class="px-lg-5 px-sm-3 py-3 d-flex justify-content-center align-items-center" style="background-color: #f7f7f7">
        <div class="d-flex align-items-center">
            <a href="{{ route('home.home') }}">Home</a>
            <p class="mb-0 px-2"> / </p>
            <a href="{{ route('home.search.category', $category_id) }}">{{ $category_name }}</a>
            <p class="mb-0 px-2"> / </p>
            <p>{{ $product_name }}</p>
        </div>
    </div>
</section>