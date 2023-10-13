<?php

declare(strict_types=1);

namespace Opmvpc\StructuresDonnees\Trees;

use Opmvpc\StructuresDonnees\Leaf;
use Opmvpc\StructuresDonnees\Stacks\ArrayStack;

class SearchTree implements TreeInterface
{
    protected ?Leaf $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function __toString(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }

    public function isEmpty(): bool {}

    public function insert(int|string $key, mixed $element): TreeInterface {}

    public function search(int|string $key): mixed {}

    public function min(): mixed {}

    public function max(): mixed {}


    public function toArray(): array {}

}
