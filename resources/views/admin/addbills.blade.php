@extends('admin.layout.app')
@section('content')
    <div class="bills-add-div container">
        @foreach ($tenant as $item)
            <div class="profile-div ">
                <div class="image">
                    <img src="{{ Storage::url($item->image) }}" alt="">
                </div>
                <div class="biography">
                    <h1>{{ $item->name }}</h1>
                    <h2>{{ $item->unit }}</h2>
                    <h2>{{ $item->email }}</h2>
                </div>
            </div>

            <form class=" p-3" action="{{ route('admin.SubmitBills') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <input type="hidden" name="user_id" id="" value="{{ $item->user_id }}">
                    <div class="col-lg-6 col-md-12 col-sm-12"
                        style="border-bottom: 2px solid black; padding: 0px 0px 7px 160px">
                        <h4>BILLS</h4>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 text-center"
                        style="border-bottom: 2px solid black; padding: 0px 150px 7px 0px">
                        <h4>AMOUNT</h4>
                    </div>
                </div>
                <div class="add-bills">
                    <div class="row">
                        <div class="col-lg-12 p-3"></div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h3>RENT: </h3>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <input class="form-control rent" type="number" name="rent" id="rent" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h3>WATER: </h3>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <input class="form-control water" type="number" name="water" id="water" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h3>INTERNET: </h3>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <input class="form-control internet" type="number" name="internet" id="internet" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h3>ELECTRICITY: </h3>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <input class="form-control electricity" type="number" name="electricity" id="electricity"
                                required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h3>DUE DATE: </h3>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <input class="form-control" type="date" name="due" id="due" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h3>MONTH: </h3>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <select name="month" class="form-control" required style="text-transform: capitalize">
                                <option value="01">january</option>
                                <option value="02">february</option>
                                <option value="03">march</option>
                                <option value="04">april</option>
                                <option value="05">may</option>
                                <option value="06">june</option>
                                <option value="07">july</option>
                                <option value="08">august</option>
                                <option value="09">september</option>
                                <option value="10">october</option>
                                <option value="11">november</option>
                                <option value="12">december</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h3>TOTAL: </h3>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-center submit">
                            <button class="btn" type="submit">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@endsection
