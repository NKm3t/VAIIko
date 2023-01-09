@extends('layouts.admin')

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Objednávka</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 order-details">
                                <label for="">Meno a priezvisko</label>
                                <div class="border ">{{ $orders->firstName }}</div>
                                <label for="">Email</label>
                                <div class="border ">{{ $orders->email }}</div>
                                <label for="">Telefón</label>
                                <div class="border ">{{ $orders->phone }}</div>
                                <label for="">Adresa</label>
                                <div class="border ">
                                    {{ $orders->street }},
                                    {{ $orders->city }},
                                    {{ $orders->state }}
                                </div>
                                <label for="">PSČ</label>
                                <div class="border ">{{ $orders->postCode }}</div>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Názov</th>
                                        <th>Množstvo</th>
                                        <th>Poznámka</th>
                                        <th>Cena</th>
                                        <th>Obrázok</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->qty }}ks</td>
                                            <td>{{ $item->note }}</td>
                                            <td>{{ $item->price }}€</td>
                                            <td>
                                                <img class="img_order_view" src="{{ asset('assets/uploads/products/'.$item->products->image) }}" alt="">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <h4>Cena spolu: {{$orders->total_price}}€</h4>

                                <div class="mt-5 px-2">
                                    <label for="">Stav objednávky</label>
                                    <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select w-50" name="order_status">
                                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Čaká</option>
                                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Vybavená</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary float-end mt-3" >Odoslať</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
