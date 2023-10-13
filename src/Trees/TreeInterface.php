<?php

declare(strict_types=1);

namespace Opmvpc\StructuresDonnees\Trees;

interface TreeInterface
{
    public function __toString(): string;

    public function isEmpty(): bool;

    public function insert(int|string $key, mixed $element): TreeInterface;

    public function search(int|string $key): mixed;

    public function min(): mixed;

    public function max(): mixed;

    public function toArray(): array;
}
