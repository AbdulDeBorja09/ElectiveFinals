@extends('admin.layout.app')
@section('content')
<div class="tenants-add-div">
    <h2>ADD TENANTS</h2>
    <form class="form-row  container" action="{{ route('admin.SubmitTenant') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h1>Full Name:</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <input class="form-control" type="text" name="name" id="" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h1>Email:</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <input class="form-control  @error('email') is-invalid @enderror" type="text" name="email" id=""
                    required value="{{ old('email') }}" autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h1>Password:</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <input class="form-control @error('password') is-invalid @enderror " type="text" name="password" id=""
                    required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h1>Age:</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <input class="form-control" type="text" name="age" id="" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h1>Unit Number:</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <input class="form-control" type="text" name="unit" id="" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h1>Tenant Since:</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <input class="form-control" type="date" name="since" id="" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h1>Image:</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <input class="form-control" type="file" name="image" id="" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                @if (session('success'))
                <div class=" success-alert" role="alert" style="text-transform: capitalize">*{{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class=" error-alert text-red-950" role="alert" style="text-transform: capitalize">* <i>{{
                        session('error') }}</i>
                </div>
                @endif
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="back-button">SUBMIT</button>
            </div>

        </div>
    </form>

</div>
@endsection