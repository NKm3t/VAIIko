@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Kategorie stranka</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Názov</th>
                        <th>Popis</th>
                        <th>Obrázok</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="cate-image" alt="Obrázok tu">
                            </td>
                            <td>
                                <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary btn-sm">Upraviť</a>
                                <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger btn-sm">Vymazať</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
