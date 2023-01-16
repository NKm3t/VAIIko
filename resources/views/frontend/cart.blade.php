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

    <div class="container my-5">
        <div class="card shadow cartItems">
            @if($cartItems->count() > 0)
            <div class="card-body">
                <table class="table table-cart table-striped">
                    <thead>
                    <tr>
                        <th>Obrázok</th>
                        <th>Názov</th>
                        <th>Cena</th>
                        <th>Množstvo</th>
                        <th>Poznámka</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cartItems as $item)
                        <tr class="product_data">
                            <td>
                                <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="Obrázok">
                            </td>
                            <td>{{ $item->products->name }}</td>
                            <td>{{ $item->products->original_price ." €" }}</td>
                            <td>
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                <div class="input-group mb-3 ">
                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}"/>
                                    <button class="input-group-text changeQuantity increment-btn">+</button>
                                </div>
                            </td>
                            <td>{{ $item->note }}
                                <!--<input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                <input type="text" name="note" value="{{ $item->note }}" class="note note-input">
                                <button class="btn btn-success changeNote">ok</button>-->
                            </td>
                            <td>
                                <button class="btn btn-danger delete-cart-item"><i class="bi bi-trash"></i> Vymazať</button>
                            </td>
                        </tr>
                        @php $total += $item->products->original_price * $item->prod_qty; @endphp
                    @endforeach
                    </tbody>
                </table>

            </div>
                <div class="card-footer">
                    <h6>Cena spolu: {{$total}} €
                        <a href="{{ url('checkout') }}" class="btn btn-success float-end">Pokračovať</a>
                    </h6>

                </div>
            @else
                <div class="card-body text-center">
                    <h2>Váš <i class="bi bi-cart"></i> košík je prázdny</h2>
                    <a href="{{ url('fcategory') }}" class="btn btn-outline-primary float-end"> Pokračovať k nákupu</a>
                </div>
            @endif
        </div>
    </div>
@endsection
