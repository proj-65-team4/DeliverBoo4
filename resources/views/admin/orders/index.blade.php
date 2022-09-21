@extends('layouts.backend.app')

@section('content')
<style>
    @media only screen and (max-width: 980px){
        #order{
            display: none;
        }
    }
    @media only screen and (max-width: 780px){
        #order{
            display: none;
        }

        #mail{
            display: none;
        }
    }

    @media only screen and (max-width: 570px){
        #order{
            display: none;
        }

        #mail{
            display: none;
        }

        #surname{
            display: none;
        }
    }

    @media only screen and (max-width: 570px){
        #order{
            display: none;
        }

        #mail{
            display: none;
        }

        #surname{
            display: none;
        }

        #address{
            display: none;
        }
    }
</style>

    <div class="container">
        <h2 class="pb-4">Dettagli ordini</h2>

        <div class="order-details" id="no-more-table">
            <table width="100%">
                <thead>
                    <tr>
                        <td id="order">Nr. Ordine</td>
                        <td id="address">Indirizzo</td>
                        <td id="date">Data Ordine</td>
                        <td id="time">Orario</td>
                        <td id="name">Nome</td>
                        <td id="surname">Cognome</td>
                        <td id="mail">Email</td>
                        <td id="tel">Tel.</td>
                        <td id="total">Subtotale</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td id="order">{{$order->id}}</td>
                        <td id="address">{{$order->delivery_address}}</td>
                        <td id="date">{{$order->date_order}}</td>
                        <td id="time">{{$order->date_delivery}}</td>
                        <td id="name">{{$order->customer_name}}</td>
                        <td id="surname">{{$order->customer_surname}}</td>
                        <td id="mail">{{$order->customer_email}}</td>
                        <td id="tel">{{$order->customer_telephone}}</td>
                        <td id="total">{{$order->subtotal}} €</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection