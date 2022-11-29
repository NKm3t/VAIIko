@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Úprava kategórie</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Meno</label>
                        <input type="text" value="{{ $category->name }}" class="form-control border" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $category->slug }}" class="form-control border" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Popis</label>
                        <textarea name="description" rows="3" class="form-control border">{{ $category->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $category->status == "1" ? 'checked':"" }} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Populárne</label>
                        <input type="checkbox" {{ $category->popular == "1" ? 'checked':"" }} name="popular">
                    </div>
                    @if($category->image)
                        <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Obrazok kategorie" class="mb-3">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control border ">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Odoslať</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
