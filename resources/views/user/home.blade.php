@extends('user.layout.app')
@section('content')
    <div class="homepage">
        <div class="container1">
        </div>
        <div class="container-3">
            <a class="container-6" href="{{ url('/profile') }}">
                <div class="profile-icon">
                </div>
                <div class="container-4">
                    <div class="profile">
                        Profile
                    </div>
                    <span class="profile-info">
                        A brief summary of you. <br />
                        Including your name, photo, <br />
                        and address.
                    </span>
                </div>
            </a>
            <a class="container-2" href="{{ url('/bill') }}">
                <div class="bills-icon">
                </div>
                <div class="container-5">
                    <div class="bills">
                        Bills
                    </div>
                    <span class="bills-info">
                        A place where all your bills<br />
                        will show. Including your water<br />
                        bill, electric bill, rent bill, and <br />
                        internet bill.
                    </span>
                </div>
            </a>
        </div>
        <a class="container-7" href="{{ url('/transaction') }}">
            <div class="transact-icon">
            </div>
            <div class="container-1">
                <div class="transactions">
                    Transactions
                </div>
                <span class="transact-info">
                    Stores and tracks all tenant<br />
                    payment information.
                </span>
            </div>
        </a>
    </div>
@endsection
