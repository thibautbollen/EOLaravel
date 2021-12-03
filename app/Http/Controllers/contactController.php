<?php

namespace App\Http\Controllers;

use Contentful\Delivery\Client as DeliveryClient;
use Illuminate\Http\Request;

class contactController extends Controller
{
    private $client;
    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function __invoke()
    {
        $entry = $this->client->getEntry('67dFUjpQ01dScCbq0uUREd');

        return view('contact', ['contact'=>($entry)] );
    }

}
