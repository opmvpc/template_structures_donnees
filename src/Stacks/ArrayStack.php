<?php

namespace Opmvpc\StructuresDonnees\Stacks;

class ArrayStack implements StackInterface
{
    protected array $elements;

    public function __construct()
    {
        $this->elements = [];
    }

    public function __toString(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }

    public function isEmpty(): bool {}

    public function push(mixed $element): StackInterface {}

    public function pop(): StackInterface {}

    public function top(): mixed {}

    public function toArray(): array {}

    public function clear(): void {}
}
