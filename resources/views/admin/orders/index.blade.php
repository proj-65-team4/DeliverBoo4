@extends('layouts.backend.app')

@section('content')
<style>
    #show-details{
            display: none;
        }
        
        #show-details-button{
            display: none;
        } 

    @media only screen and (max-width: 990px){
        #order{
            display: none;
        }

        main{
            padding: 2rem 0.5rem;
        }

        .container {
            margin-left: 1rem;
        }
        
    }
    @media only screen and (max-width: 890px){
        #order{
            display: none;
        }

        #mail{
            display: none;
        }

        main {
            padding: 2rem 0.5rem;
        }

        .container{
            margin-left: 0rem;
        }
    }


    @media only screen and (max-width: 740px){
        #order{
            display: none;
        }

        #mail{
            display: none;
        }

        #surname{
            display: none;
        }

        main{
            padding: 2rem 0.5rem;
        }
    }

    @media only screen and (max-width: 640px){
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

        main{
            padding: 2rem 0.5rem;
        }
    }

    @media only screen and (max-width: 480px){
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

        #date{
            display: none;
        }

        #time{
            display: none;
        }

        #total{
            display: none;
        }

        main{
            padding: 2rem 0rem;
        }

        .container{
            margin-left: 0rem;
        }

        .order-details #show-details{
            display: inline-block;
        }

        .order-details #show-details-button{
            display: inline;
            background: var(--main-color);
            border-radius: 10px;
            font-size: .8rem;
            padding: .5rem 0.3rem;
        }

        #show-details-button a{
            text-decoration: none;
        }

        .order-details #show-details-button:hover{
        background: #347dd5;
        color: white;
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
                        <td id="show-details"></td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td id="order">{{$order->id}}</td>
                        <td id="address">{{$order->delivery_address}}</td>
                        <td id="date">{{/* $order->date_order-> */date("d-m-Y h:m", strtotime($order->date_order))}}</td>
                        <td id="time">{{/* $order->date_delivery */date("h:m", strtotime($order->date_delivery))}}</td>
                        <td id="name">{{$order->customer_name}}</td>
                        <td id="surname">{{$order->customer_surname}}</td>
                        <td id="mail">{{$order->customer_email}}</td>
                        <td id="tel">{{$order->customer_telephone}}</td>
                        <td id="total">{{$order->subtotal}} ???</td>
                        <td id="show-details-button">
                            <a href="{{route('admin.orders.show',$order->id)}}" class="my-btn text-light" role="button">Dettagli{{--  <span class="text-light las la-arrow-right"></span> --}}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-5 d-flex justify-content-center">
            <div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection