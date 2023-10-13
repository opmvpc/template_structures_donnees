<?php

namespace Opmvpc\StructuresDonnees\Stacks;

use Opmvpc\StructuresDonnees\Node;

class LinkedStack implements StackInterface
{
    protected Node $head;
    protected Node $tail;
    protected int $size;

    public function __construct()
    {
        $this->head = new Node(null);
        $this->tail = $this->head;
        $this->size = 0;
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
