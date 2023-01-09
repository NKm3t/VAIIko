@extends('layouts.front')

@section('title')
    Dekorácie Lussy
@endsection

@section('content')
    <div class="py-3 mb-4 border-top">
        <div class="container">
            <h6 class="navigation-text mb-0">
                <a href="{{ url('fcategory') }}" class="navigation">
                    Domov
                </a> <a class="navigation"> / </a>
                <a href="{{ url('view-fcategory/'.$products->category->slug) }}" class="navigation">
                    {{$products->category->name}}
                </a>
                <a class="navigation"> / {{$products->name}}</a>
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100" alt="Obrazok">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$products->name}}
                            @if ($products->trending == 1)
                                <label style="font-size: 16px;" class="float-end badge bg-danger">Akcia</label>
                            @endif
                        </h2>
                        <hr>
                        <p class="mt-3">
                            {{ $products->small_description }}
                        </p>
                        @if ($products->selling_price == null)
                            <label class="me-3">Cena: {{$products->original_price}} €</label>
                        @else
                            <label class="me-3">Cena: {{$products->original_price}} €</label> <br>
                            <label class="fw-bold">Zľavnená cena: {{$products->selling_price}} €</label>
                        @endif
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <div class="input-group mb-3 ">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control qty-input text-center" />
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="mt-1">Poznámka:</label>
                            <div>
                                <input type="text" name="note" value="" class="note note-input">
                            </div>
                        </div>
                        <div class="row-md-9 float-end">
                            <button type="button" class="btn btn-primary me-3 addToCartBtn">Do košíka <i class="bi bi-cart-fill"></i></button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        Popis
                    </h2>
                    <p class="mt-3">
                        {{ $products->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
