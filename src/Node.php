<?php

declare(strict_types=1);

namespace Opmvpc\StructuresDonnees;

class Node
{
    private mixed $element;
    private ?Node $next;

    public function __construct(mixed $element, ?Node $next = null)
    {
        $this->element = $element;
        $this->next = $next;
    }

    public function getElement(): mixed {}

    public function setElement(mixed $element): void {}

    public function getNext(): ?Node {}

    public function setNext(?Node $next): void {}

}
