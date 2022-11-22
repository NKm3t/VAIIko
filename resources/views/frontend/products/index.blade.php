@extends('layouts.front')

@section('title')
    Dekorácie Lussy
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Obrazok">
                            <div class="card-body">
                                <h5>{{ $prod->name }}</h5>
                                <span class="float-end">{{ $prod->original_price.' €' }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
