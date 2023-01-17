@extends('layouts.front')

@section('title')
    Dekorácie Lussy
@endsection

<script>
    function validateForm() {
        var firstName = $('.firstName').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var street = $('.street').val();
        var city = $('.city').val();
        var postCode = $('.postCode').val();
        var state = $('.state').val();

        var pocetZlych = 0;

        if (!firstName) {
            fname_error = "Zadajte meno a priezvisko";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
            pocetZlych++;
        } else {
            fname_error = "";
            $('#fname_error').html('');
        }

        if (!email) {
            email_error = "Zadajte email";
            $('#email_error').html('');
            $('#email_error').html(email_error);
            pocetZlych++;
        } else {
            email_error = "";
            $('#email_error').html('');
        }

        if (!phone) {
            phone_error = "Zadajte telefónne číslo";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
            pocetZlych++;
        } else {
            phone_error = "";
            $('#phone_error').html('');
        }

        if (!street) {
            street_error = "Zadajte ulicu";
            $('#street_error').html('');
            $('#street_error').html(street_error);
            pocetZlych++;
        } else {
            street_error = "";
            $('#street_error').html('');
        }

        if (!city) {
            city_error = "Zadajte mesto";
            $('#city_error').html('');
            $('#city_error').html(city_error);
            pocetZlych++;
        } else {
            city_error = "";
            $('#city_error').html('');
        }

        if (!postCode) {
            postCode_error = "Zadajte PSČ";
            $('#postCode_error').html('');
            $('#postCode_error').html(postCode_error);
            pocetZlych++;
        } else {
            postCode_error = "";
            $('#postCode_error').html('');
        }

        if (!state) {
            state_error = "Zadajte štát";
            $('#state_error').html('');
            $('#state_error').html(state_error);
            pocetZlych++;
        } else {
            state_error = "";
            $('#state_error').html('');
        }

        return pocetZlych > 0 ? false : true;
    }
</script>

@section('content')
    <div class="py-3 mb-4 border-top">
        <div class="container">
            <h6 class="navigation-text mb-0">
                <a href="{{ url('/') }}" class="navigation">
                    Domov
                </a> <a class="navigation"> / </a>
                <a href="{{ url('cart') }}" class="navigation">
                    Košík
                </a>
            </h6>
        </div>
    </div>

    <div class="container mt-3">
        <form action="{{ url('place-order')}}" onsubmit="return validateForm()" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6>Základné informácie</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">Meno priezvisko</label>
                                    <input type="text" value="{{ Auth::user()->name }}" name="firstName" class="form-control firstName">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" value="{{ Auth::user()->email }}" name="email" class="form-control email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Telefón</label>
                                    <input type="text" value="{{ Auth::user()->phone }}" name="phone" class="form-control phone">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Ulica</label>
                                    <input type="text" value="{{ Auth::user()->street}}" name="street" class="form-control street">
                                    <span id="street_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Mesto</label>
                                    <input type="text" value="{{ Auth::user()->city }}" name="city" class="form-control city">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">PSČ</label>
                                    <input type="text" value="{{ Auth::user()->postCode }}" name="postCode" class="form-control postCode">
                                    <span id="postCode_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Štát</label>
                                    <input type="text" value="{{ Auth::user()->state }}" name="state" class="form-control state">
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Informácie o objednávke</h6>
                            <hr>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Názov</th>
                                        <th>Množstvo</th>
                                        <th>Poznámka</th>
                                        <th>Cena</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }} ks</td>
                                            <td>{{ $item->note }}</td>
                                            <td>{{ $item->products->original_price * $item->prod_qty }} €</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" id="postButton" class="btn btn-primary float-end checkout-btn">Objednať</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
