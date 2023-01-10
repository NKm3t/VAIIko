@extends('layouts.front')

@section('title')
    Dekorácie Lussy
@endsection

@section('content')
    <div class="py-3 mb-4 border-top">
        <div class="container">
            <h6 class="navigation-text mb-0">
                <a href="{{ url('/') }}" class="navigation">
                    Domov
                </a> <a class="navigation"> / </a>
                <a href="{{ url('cart') }}" class="navigation">
                    Košík
                </a>
            </h6>
        </div>
    </div>

    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6>Základné informácie</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">Meno priezvisko</label>
                                    <input type="text" value="{{ Auth::user()->name }}" name="firstName" required class="form-control firstName">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" value="{{ Auth::user()->email }}" name="email" required class="form-control email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Telefón</label>
                                    <input type="text" value="{{ Auth::user()->phone }}" name="phone" required class="form-control phone">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Ulica</label>
                                    <input type="text" value="{{ Auth::user()->street}}" name="street" required class="form-control street">
                                    <span id="street_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Mesto</label>
                                    <input type="text" value="{{ Auth::user()->city }}" name="city" required class="form-control city">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">PSČ</label>
                                    <input type="text" value="{{ Auth::user()->postCode }}" name="postCode" required class="form-control postCode">
                                    <span id="postCode_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Štát</label>
                                    <input type="text" value="{{ Auth::user()->state }}" name="state" required class="form-control state">
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Informácie o objednávke</h6>
                            <hr>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Názov</th>
                                        <th>Množstvo</th>
                                        <th>Poznámka</th>
                                        <th>Cena</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }} ks</td>
                                            <td>{{ $item->note }}</td>
                                            <td>{{ $item->products->selling_price * $item->prod_qty }} €</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-primary float-end checkout-btn">Objednať</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
