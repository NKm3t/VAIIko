@extends('layouts.front')

@section('title')
    Dekorácie Lussy
@endsection

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Objednavka</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <label for="">Meno Priezvisko</label>
                                <div class="border ">{{ $orders->firstName }}</div>
                                <label for="">Email</label>
                                <div class="border ">{{ $orders->email }}</div>
                                <label for="">Telefon</label>
                                <div class="border ">{{ $orders->phone }}</div>
                                <label for="">Adresa</label>
                                <div class="border ">
                                    {{ $orders->street }},
                                    {{ $orders->city }},
                                    {{ $orders->state }}
                                </div>
                                <label for="">PSC</label>
                                <div class="border ">{{ $orders->postCode }}</div>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nazov</th>
                                        <th>Mnozstvo</th>
                                        <th>Cena</th>
                                        <th>Obrazok</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->qty }}ks</td>
                                            <td>{{ $item->price }}€</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <h4>Cena spolu: {{$orders->total_price}}€</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
