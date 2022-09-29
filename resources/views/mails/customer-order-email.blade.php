@component('mail::message')

<div class="container">

    Ciao {{ $order->customer_name }},
    
    ti informiamo che l'ordine è avvenuto con successo.
    
    Ecco il riepilogo dell'ordine:
    
    <table>
        <thead>
            <tr>
                <th>Prodotto</th>
                <th>Prezzo</th>
                <th>Quantità</th>
                <th>Subtotale</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
            <tr>
                <td>{{$item["name"]}}</td>
                <td>{{$item["price"]}}</td>
                <td>{{$item["quantity"]}}</td>
                <td>{{ $item["quantity"] * $item["price"] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Totale ordine: <strong>{{$order->subtotal}}</strong></h2>
</div>


{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Grazie,<br>
Team 4 TheBeasts
@endcomponent
