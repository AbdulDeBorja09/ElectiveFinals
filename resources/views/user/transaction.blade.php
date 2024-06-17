@extends('user.layout.app')
@section('content')
<section class="section1-transact">
    <div class="transacttitle">
        <p class="transactions">TRANSACTIONS</p>
    </div>
    <div class="inspire-logo-transact">
        <img src="{{ url('image/inspire.png') }}" alt="Inspire Sports Academy">
    </div>
</section>

<section class="section2-transact">
    <hr>
    <div class="titles-transact">
        <p class="rn">RECEIPT NO.</p>
        <p class="amount">AMOUNT</p>
    </div>
    <hr>
    @foreach ($bill as $item)
    <div class="flexbox-transact">
        <div class="rn-details-transact">
            <p class="rn1">ID-{{ $item->receipt }}</p>

        </div>
        <div class="rn-amount-transact">
            <p class="rna1">₱{{ $item->total }}.00</p>
        </div>

        <div class="buttons-transact">
            <a class="btn1" href="history/{{ $item->id }}">VIEW</a>
        </div>

    </div>
    @endforeach
</section>
@endsection