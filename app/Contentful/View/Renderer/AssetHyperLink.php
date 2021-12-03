<?php

declare(strict_types=1);

namespace App\Contentful\View\Renderer;

use App\Contentful\View\Lookup\AssetUrlDetector;
use Contentful\RichText\Node\AssetHyperlink as NodeClass;
use Contentful\RichText\Node\NodeInterface;
use Contentful\RichText\NodeRenderer\NodeRendererInterface;
use Contentful\RichText\RendererInterface;

final class AssetHyperLink implements NodeRendererInterface
{
    private $urlDetector;

    public function __construct(
        AssetUrlDetector $urlDetector
    ) {
        $this->urlDetector = $urlDetector;
    }

    public function supports(NodeInterface $node): bool
    {
        return $node instanceof NodeClass;
    }

    /**
     * {@inheritdoc}
     */
    public function render(RendererInterface $renderer, NodeInterface $node, array $context = []): string
    {
        /* @var NodeClass $node */
        if (! $node instanceof NodeClass) {
            throw new \LogicException(\sprintf('Trying to use node renderer "%s" to render unsupported node of class "%s".', static::class, \get_class($node)));
        }

        $asset = $node->getAsset();
        $url = ($this->urlDetector)($asset) ?? '#Asset-'.$asset->getId();

        return \sprintf(
            '<a href="%s" title="%s">%s</a>',
            htmlentities($url, ENT_QUOTES),
            $node->getTitle(),
            $renderer->renderCollection($node->getContent(), $context)
        );
    }
}
