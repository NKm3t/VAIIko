@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Úprava produktu</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option value="">{{ $products->category->name }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Názov</label>
                        <input type="text" class="form-control border" value="{{ $products->name }}" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control border" value="{{ $products->slug }}" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Stručný popis</label>
                        <textarea name="small_description" class="form-control border">{{ $products->small_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Popis</label>
                        <textarea name="description" class="form-control border">{{ $products->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Cena</label>
                        <input type="number" value="{{ $products->original_price }}" name="original_price" class="form-control border">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Cena po zľave</label>
                        <input type="number" value="{{ $products->selling_price }}" name="selling_price" class="form-control border">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Schovať produkt</label>
                        <input type="checkbox" {{ $products->status == "1" ? 'checked' : '' }} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trend</label>
                        <input type="checkbox" {{ $products->trending == "1" ? 'checked' : '' }} name="trending">
                    </div>
                    @if($products->image)
                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="Obrazok produktu" class="mb-3">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control border">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Odoslať</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
