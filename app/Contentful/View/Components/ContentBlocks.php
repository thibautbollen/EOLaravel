<?php

namespace App\Contentful\View\Components;

use Contentful\Core\Resource\ResourceArray;
use Illuminate\View\Component;
use Illuminate\View\View;

class ContentBlocks extends Component
{
    public function __construct(
        private iterable $blocks
    ) {
    }

    public function render(): View
    {
        return view('components.contentful.content-blocks', [
            'blocks' => $this->blocks,
        ]);
    }
}
