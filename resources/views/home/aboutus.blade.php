@extends('inc.app')
@section('content')
    <div class="container">
        <div class="py-5 px-5 rounded-images mt-3" style="background-color: #243C81; color: white; text-align: center;">
            <h3 class="mt-5" style="color: #FFD576;">Tentang Owlix</h3>
            <p class="mt-4 px-5 mb-5 mx-5" style="font-weight: 300; line-height: 2; font-size: 18px">
                Owlix adalah sebuah platform wirausaha khusus pelajar pertama di Indonesia yang menjual berbagai produk
                untuk membantu badan usaha, UMKM, Pelajar ataupun Yayasan untuk berkembang dan menjadi lebih
                baik.selain itu, Owlix membuka peluang usaha untuk semua orang agar menjadi wirausahawan yang sukses dan
                bisa membantu semua orang
            </p>
        </div>
        <div style="text-align: center;" class="py-4 px-5 mt-5">
            <h3>Kenapa Harus Berwirausaha di Owlix ?</h3>
            <div class="d-flex justify-content-between align-items-center p-5">
                <div>
                    <img src="{{ asset('img/aboutUsPict1.png') }}" alt="">
                    <p style="color: black">Buka Usaha tanpa Modal</p>
                </div>
                <div>
                    <img src="{{ asset('img/aboutUsPict2.png') }}" alt="">
                    <p style="color: black">Ringkas dan Praktis</p>
                </div>
                <div>
                    <img src="{{ asset('img/aboutUsPict3.png') }}" alt="">
                    <p style="color: black">Membantu sesama</p>
                </div>
                <div>
                    <img src="{{ asset('img/aboutUsPict4.png') }}" alt="">
                    <p style="color: black">Tidak harus punya produk</p>
                </div>
                <div>
                    <img src="{{ asset('img/aboutUsPict5.png') }}" alt="">
                    <p style="color: black">Keuntungan 100% untuk kamu</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container rounded py-5" style="background-color: #f0f4ff; color: black;">
        <div class="align-items-center justify-content-between">
            <div>
                <div class="py-3 px-5" style="">
                    <h3>Visi</h3>
                    <p>Owlix adalah sebuah platform wirausaha khusus pelajar pertama di Indonesia</p>
                </div>
                <div class="py-3 px-5" style="vertical-align: center;">
                    <h3>Misi</h3>
                    <ol>
                        <li>Menyediakan platform wirausaha untuk mensejahterakan masyarakat</li>
                        <li>Membantu UMKM menengah kebawah</li>
                        <li>Mengadakan aksi sosial dengan cara menggalang dana melalui sistem donasi di platform OWLIX
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
