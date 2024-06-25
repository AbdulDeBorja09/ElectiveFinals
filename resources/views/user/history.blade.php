@extends('user.layout.app')
@section('content')
<section class="section1-bills">
    <div class="bills-upperleft">
        <p class="billsdue-title">BILLS DUE</p>
        <p class="bills-address">National University - Laguna <br> Km. 53, Pan Philippine Highway, <br> Brgy. Milagrosa,
            Calamba City, <br> Laguna 4027</p>
    </div>

    <div class="inspire-logo-bills">
        <img src="{{ url('image/inspire.png') }}" alt="Inspire Sports Academy">
    </div>
</section>

@foreach ($bill as $item)
<section class="section2-bills">
    <div class="leftside">
        <p class="billto">BILL TO:</p>
        <p class="details-bills">{{ $customer->name }} <br> {{ $customer->unit }}</p>
    </div>

    <div class="middleside">
        <p class="receiptno">RECEIPT NO:</p>
        <p class="receiptdate">RECEIPT DATE:</p>
        <p class="duedate">DUE DATE:</p>
    </div>

    <div class="rightside">
        <p class="rn-details">ID-{{ $item->receipt }}</p>
        <p class="rd-details">{{ $item->receiptdate }}</p>
        <p class="dd-details">{{ $item->due }}</p>
    </div>
</section>

<section class="section3-bills">
    <hr>
    <div class="flexbox-bills">
        <div class="title1-bills">
            <p class="billstitle">BILLS</p>
        </div>
        <div class="title2-bills">
            <p class="amounttitle">AMOUNT</p>
        </div>
    </div>
    <hr>

    <div class="flexbox2-bills">
        <div class="titles">
            <p class="r">RENT:</p>
            <p class="w">WATER:</p>
            <p class="i">INTERNET:</p>
            <p class="e">ELECTRICITY:</p>
        </div>
        <div class="amounts">
            <p class="a1">₱{{ $item->rent }}.00</p>
            <p class="a2">₱{{ $item->water }}.00</p>
            <p class="a3">₱{{ $item->internet }}.00</p>
            <p class="a4">₱{{ $item->electricity }}.00</p>
        </div>
    </div>

    <div class="flexbox3-bills text-center">
        <button class="text-center btn-dark mt-5 w-50" disabled
            style="text-transform:uppercase;">{{$item->staus}}</button>
        <div class="amountbox">
            <p class="total">TOTAL:</p>
            <p class="a5">₱{{ $item->total }}.00</p>
        </div>
    </div>
</section>
@endforeach
@endsection