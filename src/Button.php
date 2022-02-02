<?php

declare(strict_types=1);

namespace Eightfold\Uswds;

use Stringable;

use Eightfold\HTMLBuilder\Element;

use Eightfold\XMLBuilder\Implementations\Properties;

class Button implements Stringable
{
    use Properties;

    /**
     * @var array<string|Stringable>
     */
    private array $content = [];

    private $type = 'default';

    public static function create(string|Stringable ...$content): static
    {
        return new static(...$content);
    }

    final private function __construct(string|Stringable ...$content)
    {
        $this->content = $content;
    }

    public function secondary(): static
    {
        $this->type = 'secondary';
        return $this;
    }

    public function __toString(): string
    {
        $base = Element::button(...$this->content)->props(...$this->properties);
        return (string) match($this->type) {
            'secondary' => $base->prop('class usa-button usa-button--secondary'),
            default => $base->prop('class usa-button')
        };
    }
}
