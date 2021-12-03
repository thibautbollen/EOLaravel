<?php

declare(strict_types=1);

namespace App\Contentful\View\Lookup;

use Contentful\Core\File\FileInterface;
use Contentful\Core\Resource\AssetInterface;
use Contentful\Delivery\Resource\Asset;

final class AssetFileDetector
{
    public function __invoke(
        AssetInterface $asset,
    ): ?FileInterface {
        if (! $asset instanceof Asset) {
            return null;
        }

        return $asset->getFile();
    }
}
