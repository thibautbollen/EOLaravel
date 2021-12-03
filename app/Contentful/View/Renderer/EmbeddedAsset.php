<?php

/**
 * This file is part of the contentful/rich-text package.
 *
 * @copyright 2015-2021 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace App\Contentful\View\Renderer;

use App\Contentful\View\Lookup\AssetFileDetector;
use App\Contentful\View\Lookup\AssetUrlDetector;
use Contentful\Core\File\ImageFile;
use Contentful\Core\File\ImageOptions;
use Contentful\Delivery\Resource\Asset;
use Contentful\RichText\Node\EmbeddedAssetBlock as Block;
use Contentful\RichText\Node\EmbeddedAssetInline as Inline;
use Contentful\RichText\Node\NodeInterface;
use Contentful\RichText\NodeRenderer\NodeRendererInterface;
use Contentful\RichText\RendererInterface;

class EmbeddedAsset implements NodeRendererInterface
{
    private $fileDetector;
    private $urlDetector;

    public function __construct(
        AssetFileDetector $fileDetector,
        AssetUrlDetector $urlDetector
    ) {
        $this->urlDetector = $urlDetector;
        $this->fileDetector = $fileDetector;
    }

    /**
     * @psalm-assert-if-true Block|Inline $node
     */
    public function supports(NodeInterface $node): bool
    {
        return $node instanceof Block || $node instanceof Inline;
    }

    public function render(RendererInterface $renderer, NodeInterface $node, array $context = []): string
    {
        /* @var Block|Inline $node */
        if (! $this->supports($node)) {
            throw new \LogicException(\sprintf('Trying to use node renderer "%s" to render unsupported node of class "%s".', static::class, \get_class($node)));
        }

        $asset = $node->getAsset();
        $file = ($this->fileDetector)($asset);

        return match(true) {
            $file instanceof ImageFile => $this->renderImage($node),
            default => $this->renderUnkown($node)
        };
    }

    private function renderUnkown( $node): string
    {
        return '<div class="hidden"><!--Unable to display Asset-'.$node->getAsset()->getId().'--></div>';
    }

    /**
     * TODO : instead of harcoding the image size, provide different srcsets that can be used for a given view port.
     */
    private function renderImage( $node): string
    {
        /** @var Asset $asset */
        $asset = $node->getAsset();
        $url = ($this->urlDetector)($asset, (new ImageOptions())->setWidth(800));
        $class = $node instanceof Block ? 'block' : 'inline';

        if (! $url) {
            return $this->renderUnkown($node);
        }

        return sprintf(
            '<img src="%s" class="%s" alt="%s" />',
            htmlentities($url, ENT_QUOTES),
            $class,
            htmlentities((string) $asset->getTitle(), ENT_QUOTES)
        );
    }
}
