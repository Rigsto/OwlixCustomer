<section>
    <div class="d-flex justify-content-center pt-4 align-items-center w-100">
        <div class="d-flex align-items-center step-element mx-5">
            <div class="@if($order_process >= 1) rounded-circle-active @else rounded-circle-inactive @endif">1</div>
            <div class="@if($order_process >= 1) step-desc-active @else step-desc-inactive @endif">Keranjang</div>
        </div>
        <div class="d-flex align-items-center step-element mx-5">
            <div class="@if($order_process >= 2) rounded-circle-active @else rounded-circle-inactive @endif">2</div>
            <div class="@if($order_process >= 2) step-desc-active @else step-desc-inactive @endif">Checkout</div>
        </div>
        <div class="d-flex align-items-center step-element mx-5">
            <div class="@if($order_process >= 3) rounded-circle-active @else rounded-circle-inactive @endif">3</div>
            <div class="@if($order_process >= 3) step-desc-active @else step-desc-inactive @endif">Pembayaran</div>
        </div>
        <div class="d-flex align-items-center step-element mx-5">
            <div class="@if($order_process >= 4) rounded-circle-active @else rounded-circle-inactive @endif">4</div>
            <div class="@if($order_process >= 4) step-desc-active @else step-desc-inactive @endif">Selesai</div>
        </div>
    </div>
</section>
