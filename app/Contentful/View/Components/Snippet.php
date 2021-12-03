<?php

namespace App\Contentful\View\Components;

use App\Contentful\DataProvider\SnippetProvider;
use Illuminate\View\Component;
use Illuminate\View\View;

class Snippet extends Component
{
    public function __construct(
        private string $slug
    ) {
    }

    public function render(): View
    {
        /** @var SnippetProvider $snippetProvider */
        $snippetProvider = app()->make(SnippetProvider::class);

        return view('components.contentful.snippet', [
            'snippet' => $snippetProvider($this->slug),
        ]);
    }
}
