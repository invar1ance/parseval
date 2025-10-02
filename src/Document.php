<?php

declare(strict_types=1);

namespace Invariance\Parseval;

use Symfony\Component\DomCrawler\Crawler;

readonly class Document
{
    public private(set) Crawler $crawler;

    private function __construct(string $html)
    {
        $this->crawler = new Crawler($html);
    }

    public static function fromString(string $html): self
    {
        return new self($html);
    }

    public static function fromFile(string $path): self
    {
        return self::fromString(file_get_contents($path));
    }

    public function all(HtmlQuery $query): Crawler
    {
        return $this->crawler->filterXPath($query->toXPath())->first();
    }
}