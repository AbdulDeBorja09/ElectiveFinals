@extends('user.layout.app')
@section('content')
    @foreach ($profile as $item)
        <section class="section1">
            <div class="profile-img">
                <img src="{{ Storage::disk('s3')->url($customer->image) }}" alt="Customer Image">
            </div>
            <div class="profile-info">
                <p class="profile-name">{{ $item->name }}</p>
                <p class="unit-number">{{ $item->unit }}</p>
                <p class="email">{{ $item->email }}</p>
            </div>
        </section>
        <section class="section2">
            <hr>

            <div class="profile-basicinfo">
                <p class="basicinfo-title">BASIC INFORMATION</p>

                <div class="infodetails">

                    <div class="fullname">
                        <p class="fullnametitle">FULL NAME:</p>
                        <div class="box1">{{ $item->name }}</div>
                    </div>

                    <div class="age">
                        <p class="agetitle">AGE:</p>
                        <div class="box2">{{ $item->age }}</div>
                    </div>

                    <div class="email">
                        <p class="emailtitle">EMAIL:</p>
                        <div class="box3">{{ $item->email }}</div>
                    </div>

                    <div class="unitnumber">
                        <p class="unitnumbertitle">UNIT NUMBER:</p>
                        <div class="box5">{{ $item->unit }}</div>
                    </div>

                </div>
            </div>
        </section>
    @endforeach
@endsection
