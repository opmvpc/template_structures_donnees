<?php

use Opmvpc\StructuresDonnees\Trees\SearchTree;
use Opmvpc\StructuresDonnees\Trees\TreeInterface;

describe('SearchTree', function () {
    it('should be instance of SearchTree', function () {
        $three = new SearchTree();
        expect($three)->toBeInstanceOf(TreeInterface::class);
        expect($three)->toBeInstanceOf(SearchTree::class);
    });


    // public function isEmpty(): bool;
    it('should be empty', function () {
        $three = new SearchTree();
        expect($three->isEmpty())->toBeTrue();
    });

    it('should not be empty', function () {
        $three = new SearchTree();
        $three->insert(1, 1);
        expect($three->isEmpty())->toBeFalse();
    });

    // public function insert(mixed $element): TreeInterface;
    it('should insert element', function () {
        $three = new SearchTree();
        $three->insert(1, 1);
        expect($three->isEmpty())->toBeFalse();
    });

    it('should insert a lot of elements', function () {
        $three = new SearchTree();
        for ($i = 0; $i < 100; $i++) {
            $three->insert($i, $i);
        }
        expect($three->isEmpty())->toBeFalse();
        expect($three->toArray())->toBe(range(0, 99));
    });

    it('should insert with string keys', function () {
        $three = new SearchTree();
        $three->insert('hi', 1);
        $three->insert('hello', 2);
        $three->insert('world', 3);
        expect($three->isEmpty())->toBeFalse();
        expect($three->toArray())->toBe(['hello' => 2, 'hi' => 1, 'world' => 3]);

    });

    it('should insert with a lot of string keys', function () {
        $three = new SearchTree();
        for ($i = 0; $i < 100; $i++) {
            $three->insert((string) $i, $i);
        }
        expect($three->isEmpty())->toBeFalse();
        expect($three->toArray())->toBe(range(0, 99));
    });

    it('should insert same element', function () {
        $three = new SearchTree();
        $three->insert(1, 1);
        $three->insert(1, 2);
        expect($three->isEmpty())->toBeFalse();
        expect($three->toArray())->toBe([1 => 2]);
    });

    // public function search($key, mixed $element): mixed;
    it('should search element', function () {
        $three = new SearchTree();
        $three->insert(1, 1);
        expect($three->search(1))->toBe(1);
    });

    it('should search with string keys', function () {
        $three = new SearchTree();
        $three->insert('hi', 1);
        $three->insert('hello', 2);
        $three->insert('world', 3);
        expect($three->search('hello'))->toBe(2);
        expect($three->search('hi'))->toBe(1);
        expect($three->search('world'))->toBe(3);
    });

    // public function min(): mixed;
    it('should return min element', function () {
        $three = new SearchTree();
        $three->insert(0, 2);
        $three->insert(1, 1);
        $three->insert(2, 0);
        expect($three->min())->toBe(2);
    });

    it('should return min element with string keys', function () {
        $three = new SearchTree();
        $three->insert('hi', 2);
        $three->insert('hello', 1);
        $three->insert('world', 0);
        expect($three->min())->toBe(1);
    });

    // public function max(): mixed;
    it('should return max element', function () {
        $three = new SearchTree();
        $three->insert(0, 2);
        $three->insert(1, 1);
        $three->insert(2, 0);
        expect($three->max())->toBe(0);
    });

    it('should return max element with string keys', function () {
        $three = new SearchTree();
        $three->insert('hi', 2);
        $three->insert('hello', 1);
        $three->insert('world', 0);
        expect($three->max())->toBe(0);
    });

    // public function __toString(): string;
    it('should return string representation', function () {
        $three = new SearchTree();
        $three->insert(0, 2);
        $three->insert(1, 1);
        $three->insert(2, 0);
        expect($three->__toString())->toBe("[\n    2,\n    1,\n    0\n]");
    });

    it('should return string representation with string keys', function () {
        $three = new SearchTree();
        $three->insert('hi', 2);
        $three->insert('hello', 1);
        $three->insert('world', 0);
        expect($three->__toString())->toBe("{\n    \"hello\": 1,\n    \"hi\": 2,\n    \"world\": 0\n}");
    });

    // public function toArray(): array;
    it('should return array representation', function () {
        $three = new SearchTree();
        $three->insert(0, 2);
        $three->insert(1, 1);
        $three->insert(2, 0);
        expect($three->toArray())->toBe([2, 1, 0]);
    });

    it('should return array representation with string keys', function () {
        $three = new SearchTree();
        $three->insert('hi', 2);
        $three->insert('hello', 1);
        $three->insert('world', 0);
        expect($three->toArray())->toBe(['hello' => 1, 'hi' => 2, 'world' => 0]);
    });

    it('should work with mixed fluent calls', function () {
        $three = new SearchTree();
        $three->insert('hi', 2)->insert('hello', 1)->insert('world', 0);
        expect($three->toArray())->toBe(['hello' => 1, 'hi' => 2, 'world' => 0]);
    });

    it('should throw exception when search on empty tree', function () {
        $three = new SearchTree();
        $three->search(1);
    })->throws(\Exception::class, 'Tree is empty');

    it('should throw exception when min on empty tree', function () {
        $three = new SearchTree();
        $three->min();
    })->throws(\Exception::class, 'Tree is empty');

    it('should throw exception when max on empty tree', function () {
        $three = new SearchTree();
        $three->max();
    })->throws(\Exception::class, 'Tree is empty');
});
