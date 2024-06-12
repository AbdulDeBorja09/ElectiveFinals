@extends('admin.layout.app')
@section('content')
    <div class="bills-page">
        <div class="dormitel-1">
        </div>
        <div class="bills">
            BILLS
        </div>
        @foreach ($tenants as $item)
            <div class="container-10">
                <div class="container-7">
                    <div class="rectangle-39">
                        <img src="{{ Storage::url($item->image) }}" alt="">
                    </div>
                    <div class="dela-cruz">
                        {{ $item->name }}<br />
                        {{ $item->unit }}
                    </div>
                </div>
                <div class="btn-container">
                    <a class="add-bill" href="/admin/bills/{{ $item->user_id }}">
                        ADD BILL
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
