@extends('layouts.front')

@section('title')
    Dekorácie Lussy
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Všetky kategórie</h2>
                    <div class="row">
                        @foreach($fcategory as $cate)
                            <div class="col-md-2 mb-3">
                                    <div class="card">
                                        <a href="{{ url('view-fcategory/'.$cate->slug) }}">
                                        <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" class="w-100" alt="Obrazok">
                                        <div class="card-body">
                                            <h5>{{ $cate->name }}</h5>

                                            <p>{{ $cate->description }}</p>
                                        </div>
                                        </a>
                                    </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
