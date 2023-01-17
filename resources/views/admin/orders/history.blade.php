@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Vybavené objednávky</h4>
                        <a href="{{ 'orders' }}" class="btn btn-warning float-end" >Nové objednávky</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Dátum vytvorenia</th>
                                <th>Číslo objednávky</th>
                                <th>Cena spolu</th>
                                <th>Stav</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ date('d.m.Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->tracking_no }}</td>
                                    <td>{{ $item->total_price. ' €' }}</td>
                                    <td>{{ $item->status == '0' ? 'Potvrdená' : 'Vybavená' }}</td>
                                    <td>
                                        <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">Zobraziť</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
