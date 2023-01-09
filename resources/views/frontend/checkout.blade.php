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
                                    <label for="">Meno</label>
                                    <input type="text" value="{{ Auth::user()->name }}" name="firstName" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Priezvisko</label>
                                    <input type="text" value="{{ Auth::user()->lastName }}" name="lastName" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" value="{{ Auth::user()->email }}" name="email" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Telefón</label>
                                    <input type="text" value="{{ Auth::user()->phone }}" name="phone" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Ulica</label>
                                    <input type="text" value="{{ Auth::user()->street}}" name="street" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Mesto</label>
                                    <input type="text" value="{{ Auth::user()->city }}" name="city" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">PSČ</label>
                                    <input type="text" value="{{ Auth::user()->postCode }}" name="postCode" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Štát</label>
                                    <input type="text" value="{{ Auth::user()->state }}" name="state" class="form-control">
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
                            <button type="submit" class="btn btn-primary float-end">Objednať</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
