<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;
use Contentful\Delivery\Resource\Entry;

class HomeController extends Controller
{
    private $client;
    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function __invoke()
    {
        $entry = $this->client->getEntry('5MMxZLoap5AqcjEN9EN98t');
        $about = $this->client->getEntry('3cjzCoMTRJ62vqghcmWR9A');
        $query = (new Query())->setContentType('disciplines')->orderBy('fields.order');
        $disciplines = $this->client->getEntries($query);
        $newsQuery = (new Query())->setContentType('newsArticle')->orderBy('fields.publishDate',1);
        $news = $this->client->getEntries($newsQuery);
        $renderer = new \Contentful\RichText\Renderer();

        return view('welcome', ['home'=>($entry),'aboutText'=>($renderer->render($about->descriptionHomePage)), 'about'=>($about), 'disciplines'=>$disciplines, 'renderer'=>$renderer, 'news'=>$news] );
    }


}
