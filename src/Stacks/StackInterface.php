<?php

namespace Opmvpc\StructuresDonnees\Stacks;

interface StackInterface
{
    public function __toString(): string;

    public function isEmpty(): bool;

    public function push(mixed $item): StackInterface;

    public function pop(): StackInterface;

    public function top(): mixed;

    public function clear(): void;

    public function toArray(): array;
}
