<?php

describe('LinkedStack', function () {
    it('should be instance of StackInterface', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        expect($stack)->toBeInstanceOf(\Opmvpc\StructuresDonnees\Stacks\StackInterface::class);
        expect($stack)->toBeInstanceOf(\Opmvpc\StructuresDonnees\Stacks\LinkedStack::class);
    });

    it('should push element', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        expect($stack->top())->toBe(3);
        expect($stack->toArray())->toBe([1, 2, 3]);
    });

    it('should pop element', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        $stack->pop();
        expect($stack->top())->toBe(2);
        expect($stack->toArray())->toBe([1, 2]);
    });

    it('should check if stack is empty', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        expect($stack->isEmpty())->toBe(true);
        $stack->push(1);
        expect($stack->isEmpty())->toBe(false);
    });

    it('should throw exception when pop on empty stack', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        $stack->pop();
    })->throws(\Exception::class, 'Stack is empty');

    it('should throw exception when top on empty stack', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        $stack->top();
    })->throws(\Exception::class, 'Stack is empty');

    it('should clear stack', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        $stack->clear();
        expect($stack->isEmpty())->toBe(true);
    });

    // __toString
    it('should print stack', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        expect($stack->__toString())->toBe("[\n    1,\n    2,\n    3\n]");
    });

    // toArray
    it('should return array', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        expect($stack->toArray())->toBe([1, 2, 3]);
    });

    // a lot of push
    it('should push a lot of elements', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        for ($i = 0; $i < 100; ++$i) {
            $stack->push($i);
            expect($stack->top())->toBe($i);
        }
        expect($stack->toArray())->toBe(range(0, 99));
    });

    // a lot of pop
    it('should pop a lot of elements', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        for ($i = 0; $i < 100; ++$i) {
            $stack->push($i);
        }
        for ($i = 0; $i < 100; ++$i) {
            $stack->pop();
        }
        expect($stack->isEmpty())->toBe(true);
    });

    // a lot of push and pop
    it('should push and pop a lot of elements', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        for ($i = 0; $i < 100; ++$i) {
            $stack->push($i);
        }
        for ($i = 0; $i < 100; ++$i) {
            $stack->pop();
        }
        for ($i = 0; $i < 100; ++$i) {
            $stack->push($i);
        }
        for ($i = 0; $i < 100; ++$i) {
            $stack->pop();
        }
        expect($stack->isEmpty())->toBe(true);
    });


    it('should work with fluent calls', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        $stack->push(1)->push(2)->push(3);
        expect($stack->top())->toBe(3);
        expect($stack->toArray())->toBe([1, 2, 3]);
        $stack->pop()->pop();
        expect($stack->top())->toBe(1);
        expect($stack->toArray())->toBe([1]);
        $stack->clear();
        $stack->push(1)->push(2)->push(3)->pop()->pop();
        expect($stack->top())->toBe(1);
        expect($stack->toArray())->toBe([1]);
    });


    it('should return an exception if top on empty stack', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        $stack->top();
    })->throws(\Exception::class, 'Stack is empty');

    it('should return an exception if pop on empty stack', function () {
        $stack = new \Opmvpc\StructuresDonnees\Stacks\LinkedStack();
        $stack->pop();
    })->throws(\Exception::class, 'Stack is empty');

});
