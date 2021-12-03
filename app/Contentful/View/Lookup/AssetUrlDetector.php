<?php

declare(strict_types=1);

namespace App\Contentful\View\Lookup;

use Contentful\Core\File\ProcessedFileInterface;
use Contentful\Core\File\UrlOptionsInterface;
use Contentful\Core\Resource\AssetInterface;

final class AssetUrlDetector
{
    public function __construct(
        private AssetFileDetector $assetFileDetector
    ) {
    }

    public function __invoke(
        AssetInterface $asset,
        ?UrlOptionsInterface $options = null
    ): ?string {
        $file = ($this->assetFileDetector)($asset);
        if (! $file instanceof ProcessedFileInterface) {
            return null;
        }

        return $file->getUrl($options);
    }
}
