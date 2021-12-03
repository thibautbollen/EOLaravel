<?php

namespace App\Http\Controllers;

use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    private $client;
    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function __invoke()
    {
        $entry = $this->client->getEntry('3cjzCoMTRJ62vqghcmWR9A');
        $query = (new Query())->setContentType('board')->orderBy('fields.order');
        $members = $this->client->getEntries($query);
        $renderer = new \Contentful\RichText\Renderer();
        return view('about', ['about'=>($entry), 'text'=>($renderer->render($entry->descriptionDetailsPage)), 'image'=>$entry->pictureDetailsPage->getFile(), 'members'=>$members] );
    }

}
