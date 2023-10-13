<?php

declare(strict_types=1);

namespace Opmvpc\StructuresDonnees;

class Leaf
{
    private int|string $key;
    private mixed $element;
    private ?Leaf $left;
    private ?Leaf $right;

    public function __construct(int|string $key, mixed $element, ?Leaf $left = null, ?Leaf $right = null)
    {
        $this->key = $key;
        $this->element = $element;
        $this->left = $left;
        $this->right = $right;
    }

    public function getKey(): int|string {}

    public function setKey(int|string $key): void {}

    public function getElement(): mixed {}

    public function setElement(mixed $element): void {}

    public function getLeft(): ?Leaf {}

    public function setLeft(?Leaf $left): void {}

    public function getRight(): ?Leaf {}

    public function setRight(?Leaf $right): void {}
}
