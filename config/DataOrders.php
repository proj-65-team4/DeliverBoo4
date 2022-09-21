<?php

use Carbon\Carbon;

return [
    [
        "subtotal" => 28.30,
        "date_order" => Carbon::now(),
        "date_delivery" =>Carbon::now()->addMinute(rand(15,50)),
        "customer_name" => "Mario",
        "customer_surname" => "Verde",
        "customer_email" => "mario@verde.it",
        "customer_telephone" => "3327471239",
        "delivery_address" => "Via prova 123",
    ],
    [
        "subtotal" => 17.20,
        "date_order" => Carbon::now(),
        "date_delivery" =>Carbon::now()->addMinute(rand(15,50)),
        "customer_name" => "Gianni",
        "customer_surname" => "Galli",
        "customer_email" => "gianni@ilgallo.it",
        "customer_telephone" => "1234567890",
        "delivery_address" => "Via napoli 33",
    ],
    [
        "subtotal" => 37.65,
        "date_order" => Carbon::now(),
        "date_delivery" =>Carbon::now()->addMinute(rand(15,50)),
        "customer_name" => "Luigi",
        "customer_surname" => "Rossi",
        "customer_email" => "Luigi@gmail.com",
        "customer_telephone" => "6317427538",
        "delivery_address" => "Via Roma 89",
    ],
    [
        "subtotal" => 8.99,
        "date_order" => Carbon::now(),
        "date_delivery" =>Carbon::now()->addMinute(rand(15,50)),
        "customer_name" => "Marcello",
        "customer_surname" => "Conte",
        "customer_email" => "Marcello@libero.it",
        "customer_telephone" => "3332224448",
        "delivery_address" => "Via napoli 11",
    ],


    ];