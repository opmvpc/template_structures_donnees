<?php

declare(strict_types=1);

namespace Opmvpc\StructuresDonnees\Lists;

interface CollectionInterface extends ListInterface
{
    public function map(callable $callback): CollectionInterface;

    public function filter(callable $callback): CollectionInterface;

    public function reduce(callable $callback, mixed $initial = null): mixed;

    public function forEach(callable $callback): void;

    public function some(callable $callback): bool;

    public function every(callable $callback): bool;

    public function find(callable $callback): mixed;

    public function join(string $separator = ','): string;

    public function reverse(): CollectionInterface;

    public function sort(callable $callback = null): CollectionInterface;

    public function concat(...$collection): CollectionInterface;

    public function fill(mixed $value = null, int $start = 0, int $end = null): CollectionInterface;
}
