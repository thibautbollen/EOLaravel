<?php

namespace App\Http\Controllers;

use Contentful\Delivery\Client as DeliveryClient;
use Illuminate\Http\Request;

class disciplinesController extends Controller
{
    private $client;
    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function __invoke()
    {
        $entry = $this->client->getEntry('5MMxZLoap5AqcjEN9EN98t');

        return view('disciplines', ['home'=>($entry)] );
    }

}
