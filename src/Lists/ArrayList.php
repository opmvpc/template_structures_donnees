<?php

declare(strict_types=1);

namespace Opmvpc\StructuresDonnees\Lists;

class ArrayList implements ListInterface
{
    protected array $elements;

    public function __construct()
    {
        $this->elements = [];
    }

    public function __toString(): string
    {
        return json_encode($this->elements, JSON_PRETTY_PRINT);
    }

    public function push(mixed $element = null): void {

        $this->elements[]=$element;
    }

    public function get(int $index): mixed {
    return $this->elements[$index];
    }

    public function set(int $index, mixed $element): void {
        $this->elements[]
    }

    public function clear(): void {
        $this->elements = [];
    }
    public function includes(mixed $element): bool {}

    public function isEmpty(): bool {

        if (empty($element)) {
            echo '$element is either 0, empty, or not set at all';
        }
    }

    public function indexOf(mixed $element): int {
        array_search($index,$elements);
    }

    public function remove(int $index): void {}

    public function size(): int {}

    public function toArray(): array {}
}
/*
if (array_key_exists($index, $elements)) {
    echo $element . " element is in the array";
}*/