@extends('layouts.front')

@section('title')
    Dekorácie Lussy
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Domov / {{$category->name}}</h6>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ url('category/'.$category->slug.'/'.$prod->slug) }}">
                                <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" class="w-100" alt="Obrazok">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <span class="float-end">{{ $prod->original_price.' €' }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
