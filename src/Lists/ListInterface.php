<?php

declare(strict_types=1);

namespace Opmvpc\StructuresDonnees\Lists;

interface ListInterface
{
    public function __toString(): string;

    public function push(mixed $element): void;

    public function get(int $index): mixed;

    public function set(int $index, mixed $element): void;

    public function clear(): void;

    public function includes(mixed $element): bool;

    public function isEmpty(): bool;

    public function indexOf(mixed $element): int;

    public function remove(int $index): void;

    public function size(): int;

    public function toArray(): array;
}
