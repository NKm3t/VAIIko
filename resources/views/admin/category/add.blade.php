@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Pridať kategóriu</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Názov</label>
                        <input type="text" required class="form-control border" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" required class="form-control border" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Popis</label>
                        <textarea name="description" rows="3" required class="form-control border"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Schovať kategóriu</label>
                        <input type="checkbox" name="status">
                    </div>
{{--                    <div class="col-md-6 mb-3">--}}
{{--                        <label for="">Populárne</label>--}}
{{--                        <input type="checkbox" name="popular">--}}
{{--                    </div>--}}
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" required class="form-control border">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Odoslať</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
