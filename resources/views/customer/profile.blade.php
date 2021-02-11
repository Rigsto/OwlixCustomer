@extends('inc.app')
@section("styles")
    <style>
        a:hover {
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
    <div class="container" id="profileSections">
        @include('inc.alert')
        <div class="card px-5 py-5 mx-5 mt-5 rounded-medium">
            <div class="d-flex justify-content-lg-between">
                <div class="d-flex">
                    <div style="background-image: url('{{ $profile['image'] ?? asset("img/shopOwner.png") }}');" class="ProfilePicture"></div>
                    <div class="mx-3">
                        <h4 id="UserProfileName">{{ $profile['name'] }}</h4>
                        <p class="text-primary my-0">{{ $profile['email'] }}</p>
                        <p>{{ $profile['phone_number'] }}</p>
                    </div>
                </div>
                <div style="max-width: 138px;">
                    <div>
                        <a href="{{ route('customer.profile.edit') }}" class="small-btn-primary px-3 py-2 w-100">
                            <i class="fas fa-pen mr-2"></i>
                            Edit Profil
                        </a>
                    </div>
                    <div class="mt-3">
                        <a href="https://api.whatsapp.com/send?phone=15551234567" class="small-btn-secondary px-3 py-2 w-100">
                            <i class="fas fa-comment-dots mr-2"></i>Bantuan
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="card px-5 py-5 mx-5 my-5 rounded-medium">
            <ul class="nav nav-pills mb-3 justify-content-sm-between" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a href="#pill-address" class="nav-link active" id="pill-address-tab" data-toggle="pill" role="tab" aria-controls="pill-address" aria-selected="true">Daftar Alamat</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active my-4" id="pill-address" role="tabpanel" aria-labelledby="pill-address-tab">
                    @foreach($address as $add)
                        <div class="card px-4 py-4 mb-4 rounded-medium">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                @php
                                $city = \App\Models\AddressCity::find($add['city_id']);
                                $province = \App\Models\AddressProvince::find($add['province_id']);
                                @endphp
                                <tr>
                                    <td>
                                        <p class="font-weight-bold text-primary mb-0">{{ $add['fullname'] }}</p>
                                        <p class="text-muted mb-0">{{ $add['phone_number'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0">{{ $add['address'] }}</p>
                                        <p class="text-muted mb-0">{{ $city->name }} {{ $add['postal_code'] }}, {{ $province->name }}</p>
                                    </td>
                                    <td class="text-right">
                                        @if($add['id'] == $profile['id_default_address'])
                                            <button class="btn btn-success" style="cursor: none; pointer-events: none"><i class="fa fa-check"></i> Set as Default Address</button>
                                        @else
                                            <a href="{{ route('customer.profile.address.default', $add['id']) }}" class="btn btn-light" title="Set Default"><i class="fa fa-check"></i> Set as Default Address</a>
                                        @endif

                                        <a href="" class="btn btn-light" title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>

                                        @if($add['id'] == $profile['id_default_address'])
                                            <button disabled class="btn btn-light" title="Cannot delete default address"><i class="fa fa-trash"></i> Delete</button>
                                        @else
                                            <a href="{{ route('customer.profile.address.delete', $add['id']) }}" class="btn btn-light" title="Delete" onclick="event.preventDefault(); document.getElementById('deleteAddress').submit();"><i class="fa fa-trash"></i> Delete</a>
                                            <form action="{{ route('customer.profile.address.delete', $add['id']) }}" id="deleteAddress" class="d-none" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                    <a class="btn btn-warning text-primary" data-toggle="collapse" href="#collapseAddress" role="button" aria-expanded="false" aria-controls="collapseAddress">Tambah Alamat</a>
                    <div class="collapse" id="collapseAddress">
                        <div class="card px-4 py-4 my-4 rounded-medium">
                            <form action="{{ route('customer.profile.address.store') }}" method="POST">
                                @csrf
                                {!! Form::hidden('hasDefaultAddress', $profile['id_default_address']) !!}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        {!! Form::label('name', 'Nama') !!}
                                        {!! Form::text('name', null, ['class'=>'form-control', 'required']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('phone', 'No Telp') !!}
                                        {!! Form::text('phone', null, ['class'=>'form-control', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('address', 'Alamat') !!}
                                    {!! Form::text('address', null, ['class'=>'form-control', 'required']) !!}
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        {!! Form::label('state', 'Provinsi') !!}
                                        {!! Form::select('state', $provinces, null, ['class'=>'form-control custom-select', 'placeholder'=>'-- Pilih Provinsi --', 'required']) !!}
                                    </div>
                                    <div class="form-group col-md-4">
                                        {!! Form::label('city', 'Kota') !!}
                                        {!! Form::select('city', $cities, null, ['class'=>'form-control custom-select', 'placeholder'=>'-- Pilih Kota --', 'required']) !!}
                                    </div>
                                    <div class="form-group col-md-4">
                                        {!! Form::label('zip', 'Kode Pos') !!}
                                        {!! Form::text('zip', null, ['class'=>'form-control', 'id'=>'inputZip', 'required']) !!}
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary py-2 px-3 rounded w-100">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
            $("select[name='state']").change(function (){
                const province_id = $(this).val();

                $.ajax({
                    url: "{{ route('ajax.province.cities') }}",
                    method: "GET",
                    data: {
                        id: province_id,
                    },
                    success: function (data){
                        $("select[name='city']").html(data.options);
                    },
                    error: function (a,b,c){
                        alert("Failed to get data");
                    }
                });
            });
        });
    </script>
@endsection
