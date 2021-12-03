<?php

namespace App\Http\Controllers;

use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;
use Illuminate\Http\Request;

class membersController extends Controller
{
    private $client;
    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function __invoke()
    {
        $query = (new Query())->setContentType('eoMembers')->orderBy('fields.country');
        $members = $this->client->getEntries($query);
        $array = [];
        foreach ($members as $member) {
            if (!in_array($member->country, $array)) {
                $array[] = $member->country;
            }
        }
        return view('members', ['members'=>($members), 'array'=>$array] );
    }

}
