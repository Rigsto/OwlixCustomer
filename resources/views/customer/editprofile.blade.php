@extends('inc.app')
@section('styles')
    <style>
        .ProfilePictureEdit {
            max-width: 150px;
            max-height: 150px;
            height: 150px;
            width: 150px;
            background-size: contain;
            border: solid 1px transparent;
            border-radius: 90px;
        }

        #profileSections {
            max-width: 920px!important;
        }
    </style>
@endsection
@section('content')
    <section>
        <div class="container" id="profileSections">
            <div class="card px-5 py-5 mx-lg-5 mt-5 rounded-medium">
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-3 mb-4 align-items-center justify-content-center">
                        <div class="ProfilePictureEdit mb-4" style="background-image: url('{{ $profile['image'] ?? asset("img/shopOwner.png") }}');"></div>
                        <div class="w-100"><button class="w-100 btn">Ubah Foto</button></div>
                    </div>
                    <div class="mx-lg-3 col-lg-8">
                        <form action="{{ route('customer.profile.update') }}" method="POST">
                            @csrf
                            {!! Form::hidden('_method', 'PATCH') !!}
                            <div class="form-group">
                                {!! Form::label('inputName', 'Nama') !!}
                                {!! Form::text('inputName', $profile['name'], ['class'=>'form-control', 'id'=>'inputName', 'placeholder'=>'Masukkan nama lengkap...']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('inputEmail', 'Email') !!}
                                {!! Form::email('inputEmail', $profile['email'], ['class'=>'form-control', 'id'=>'inputEmail', 'placeholder'=>'Masukkan alamat email...']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('inputTelp', 'No. Telp') !!}
                                {!! Form::text('inputTelp', $profile['phone_number'], ['class'=>'form-control', 'id'=>'inputTelp', 'placeholder'=>'Masukkan nomor telpon...']) !!}
                            </div>
                            <button type="submit" class="btn btn-primary py-2 px-3 rounded w-100">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
