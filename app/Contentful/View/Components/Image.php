<?php

declare(strict_types=1);

namespace App\Contentful\View\Components;

use Contentful\Core\File\ImageFile;
use Contentful\Core\File\ImageOptions;
use Illuminate\View\Component;
use Illuminate\View\View;

class Image extends Component
{
    private ImageFile $file;
    private ImageOptions $options;

    /**
     * @param 'jpg'|'png'|'webp' $format
     * @param 'pad'|'crop'|'fill'|'thumb'|'scale' $resizeFit
     * @param 'face'|'faces'|'top'|'bottom'|'right'|'left'|'top_right'|'top_left'|'bottom_right'|'bottom_left'|'center' $resizeFocus
     */
    public function __construct(
        ?ImageFile $file,
        ?int $width = null,
        ?int $height = null,
        ?string $format = null,
        ?int $quality = null,
        ?string $resizeFit = null,
        ?string $resizeFocus = null,
        ?float $radius = null,
        ?string $backgroundColor = null,
        bool $progressive = false,
        bool $png8bit = false,
    ) {
        $this->file = $file;
        $this->options = (new ImageOptions())
            ->setWidth($width)
            ->setHeight($height)
            ->setFormat($format)
            ->setQuality($quality)
            ->setResizeFit($resizeFit)
            ->setResizeFocus($resizeFocus)
            ->setRadius($radius)
            ->setBackgroundColor($backgroundColor)
            ->setProgressive($progressive)
            ->setPng8Bit($png8bit);
    }

    public function render(): View
    {
        return view('components.contentful.image', [
            'file' => $this->file,
            'options' => $this->options,
        ]);
    }
}
