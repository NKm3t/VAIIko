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
                                        <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="Obrazok">
                                        <div class="card-body">
                                            <a href="{{ url('view-fcategory/'.$cate->id) }}">
                                            <h5>{{ $cate->name }}</h5>
                                            </a>
                                            <p>{{ $cate->description }}</p>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
