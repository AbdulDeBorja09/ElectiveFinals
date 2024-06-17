@extends('admin.layout.app')
@section('content')
<div class="payment-page">
    <div class="dormitel-1">
    </div>
    <div class="payments">
        PAYMENTS
    </div>
    @foreach ($bills as $item)
    <div class="container-10">
        <div class="container-7">
            <div class="rectangle-39">
                <img src="{{ Storage::url($item->customer->image) }}" alt="">
            </div>
            <div class="dela-cruz">
                {{ $item->customer->name }}<br />
                {{ $item->customer->unit }}
            </div>
        </div>
        <div class="containers">
            <a class="add-bill" href="/admin/transaction/{{ $item->id }}">
                VIEW PAYMENT
            </a>
        </div>
    </div>
    @endforeach

</div>
@endsection