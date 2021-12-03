<?php

namespace App\Http\Controllers;

use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;
use Illuminate\Http\Request;

class NewsArticleController extends Controller
{
    private $client;

    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function __invoke(string $publishDate)
    {

        $query = (new Query())
            ->setContentType('newsArticle')
            ->where('fields.publishDate', $publishDate);
        $extra = (new Query())
            ->setContentType('newsArticle');



        $results = $this->client->getEntries($query);
        $extraresults = $this->client->getEntries($extra);

        $renderer = new \Contentful\RichText\Renderer();

        return view('newsArticle', ['news' => ($results[0]), 'renderer' => $renderer]);
    }
}
