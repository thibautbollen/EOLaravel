<?php

namespace App\Http\Controllers;

use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;
use Illuminate\Http\Request;

class newsController extends Controller
{
    private $client;
    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function __invoke()
    {
        $newsQuery = (new Query())->setContentType('newsArticle')->orderBy('fields.publishDate',1);
        $news = $this->client->getEntries($newsQuery);

        return view('news', ['newsArticles'=>($news)] );
    }

}
