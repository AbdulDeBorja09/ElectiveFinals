@extends('admin.layout.app')
@section('content')
    <div class="tenant-page">
        <div class="dormitel-1">
        </div>
        <div class="tenants">
            TENANTS
        </div>
        @foreach ($tenants as $item)
            <div class="containers">
                <div class="container-6">
                    <div class="rectangle-39">
                        <img src="{{ Storage::url($item->image) }}" alt="">
                    </div>
                    <div class="dela-cruz">
                        {{ $item->name }}<br />
                        {{ $item->unit }}
                    </div>
                </div>
                <div class="container-8">
                    <a class="btn" href="tenants/{{ $item->user_id }}"> Edit </a>
                    <button class="btn" onclick="event.preventDefault(); document.getElementById('delete').submit()">
                        Delete
                    </button>
                </div>
            </div>

            <form action="{{ route('admin.deleteTenant') }}" id="delete" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="user_id" value="{{ $item->user_id }}">
            </form>
        @endforeach
        <a class="container-4" href="tenants/add" style="text-decoration: none; cursor:pointer;">
            <span class="add-tenant">
                ADD TENANT
            </span>
        </a>
    </div>
@endsection
