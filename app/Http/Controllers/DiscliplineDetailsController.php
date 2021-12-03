<?php

namespace App\Http\Controllers;

use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;
use Contentful\Delivery\Resource\Entry;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DiscliplineDetailsController extends Controller
{
    private $client;
    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function __invoke(string $title)
    {
        $query = (new Query())
            ->setContentType('disciplines')
            ->where('fields.title', $title);
        $results = $this->client->getEntries($query);
        $renderer = new \Contentful\RichText\Renderer();

        return view('disciplineDetails', ['discipline'=>($results[0]), 'renderer'=>$renderer] );
    }
}
