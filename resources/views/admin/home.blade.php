@extends('admin.layout.app')
@section('content')
    <div class="admin-homepage">
        <div class="container">
        </div>
        <div class="container-3">
            <a class="container-6" href="/admin/tenants">
                <div class="tenants-icon">
                </div>
                <div class="container-4">
                    <div class="tenants">
                        Tenants
                    </div>
                    <span class="tenants-info">
                        A place for adding/creating,
                        editing, and deleting tenants’
                        account.
                    </span>
                </div>
            </a>
            <a class="container-2" href="/admin/bills">
                <div class="bills-icon">
                </div>
                <div class="container-5">
                    <div class="bills">
                        Bills
                    </div>
                    <span class="bills-info">
                        A place where you will add
                        tenants’ bills.
                    </span>
                </div>
            </a>
        </div>
        <a class="container-7" href="/admin/transactions">
            <div class="payment-icon">
            </div>
            <div class="container-1">
                <div class="payment">
                    Payment
                </div>
                <span class="payment-info">
                    Stores and tracks all tenant<br />
                    payment information.
                </span>
            </div>
        </a>
    </div>
@endsection
