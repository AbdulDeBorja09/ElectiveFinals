@extends('admin.layout.app')
@section('content')
    <div class="tenants-add-div">
        @foreach ($tenant as $item)
            <h2>EDIT TENANT</h2>
            <div class="profile-div container">
                <div class="image">
                    <img src="{{ Storage::url($item->image) }}" alt="">
                </div>
                <div class="biography">
                    <h1>{{ $item->name }}</h1>
                    <h2>{{ $item->unit }}</h2>
                    <h2>{{ $item->email }}</h2>
                </div>
            </div>
            <form class="form-row  container" action="{{ route('admin.SubmitEditTenant') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h1>Full Name:</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <input class="form-control" type="text" name="name" id="" required
                            value="{{ $item->name }}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h1>Email:</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <input class="form-control" type="text" id="" required value="{{ $item->email }}"
                            readonly>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h1>Age:</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <input class="form-control" type="text" name="age" id="" required
                            value="{{ $item->age }}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h1>Unit Number:</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <input class="form-control" type="text" name="unit" id="" required
                            value="{{ $item->unit }}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h1>Tenant Since:</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <input class="form-control" type="date" name="since" id="" required
                            value="{{ $item->since }}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h1>Image:</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <input class="form-control" type="file" name="image" id="" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="back-button">SUBMIT</button>
                    </div>
                    @if (session('success'))
                        <div class="alert compute-alert" role="alert">*{{ session('success') }} </div>
                    @endif
                    @if (session('error'))
                        <div class="alert compute-alert text-red-950" role="alert">*{{ session('error') }}
                        </div>
                    @endif
                </div>
            </form>
        @endforeach
    </div>
@endsection
