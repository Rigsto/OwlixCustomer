@extends('inc.app')
@section('content')
    <div class="container" id="profileSections">
        <div class="card px-5 py-5 mx-5 mt-5 rounded-medium">
            <div class="d-flex justify-content-lg-between">
                <div class="d-flex">
                    <div style="background-image: url('{{ asset("img/shopOwner.png") }}');" class="ProfilePicture"></div>
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
                        <button class="small-btn-secondary px-3 py-2 w-100"><i class="fas fa-comment-dots mr-2"></i>Bantuan
                        </button>
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
                                    <td>
                                        <a href="" class="btn btn-circle btn-light" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="" class="btn btn-circle btn-light" title="Delete"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
