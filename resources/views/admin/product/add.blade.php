@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Pridať produkt</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id">
                            <option value="">Vyberte kategoriu</option>
                            @foreach($category as $item)
                                <option value="{{ $item->id }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meno</label>
                        <input type="text" class="form-control border" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control border" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Stručný popis</label>
                        <textarea name="small_description" rows="3" class="form-control border"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Popis</label>
                        <textarea name="description" rows="3" class="form-control border"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Cena</label>
                        <input type="number" name="original_price" class="form-control border">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Cena po zľave</label>
                        <input type="number" name="selling_price" class="form-control border">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Daň</label>
                        <input type="number" name="tax" class="form-control border">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trend</label>
                        <input type="checkbox" name="trending">
                    </div>
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
