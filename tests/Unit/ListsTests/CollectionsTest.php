<?php

describe('Collection', function () {
    it('should be instance of Collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection)->toBeInstanceOf(\Opmvpc\StructuresDonnees\Lists\ListInterface::class);
        expect($collection)->toBeInstanceOf(\Opmvpc\StructuresDonnees\Lists\Collection::class);
    });

    it('should push element', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        expect($collection->size())->toBe(3);
        expect($collection->get(0))->toBe(1);
        expect($collection->get(1))->toBe(2);
        expect($collection->get(2))->toBe(3);
    });

    it('should remove element', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection->remove(2);
        expect($collection->size())->toBe(2);
        expect($collection->get(0))->toBe(1);
        expect($collection->get(1))->toBe(2);
    });

    it('should clear collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection->clear();
        expect($collection->size())->toBe(0);
    });

    it('should check if collection contains element', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        expect($collection->includes(2))->toBe(true);
        expect($collection->includes(4))->toBe(false);
    });

    it('should get the index of an element', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        expect($collection->indexOf(2))->toBe(1);
    });

    it('should check if collection is empty', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->isEmpty())->toBe(true);
        $collection->push(1);
        expect($collection->isEmpty())->toBe(false);
    });

    it('should convert collection to array', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        expect($collection->toArray())->toBe([1, 2, 3]);
    });

    it('should convert collection to string', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        expect($collection->__toString())->toBe("[\n    1,\n    2,\n    3\n]");
    });

    it('should mix push and remove', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection->remove(2);
        $collection->push(4);
        $collection->push(5);
        $collection->remove(1);
        $collection->remove(2);
        expect($collection->size())->toBe(2);
        expect($collection->get(0))->toBe(1);
    });

    it('should push and remove 100 elements', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        for ($i = 0; $i < 100; ++$i) {
            $collection->push($i);
        }
        expect($collection->size())->toBe(100);
        for ($i = 0; $i < 100; ++$i) {
            $collection->remove(0);
        }
        expect($collection->size())->toBe(0);
    });

    it('should push and remove objects', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        expect($collection->size())->toBe(3);
        $collection->remove(1);
        expect($collection->size())->toBe(2);
    });

    it('should throw exception when get index not found', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->get(0);
    })->throws(\Exception::class);

    it('should throw exception when set index not found', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->set(0, 1);
    })->throws(\Exception::class);

    it('should throw exception when remove index not found', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->remove(0);
    })->throws(\Exception::class);

    it('should throw exception when index of element not found', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->indexOf(0);
    })->throws(\Exception::class);

    it('should return an error if adding an element of a different type', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push('2');
    })->throws(\InvalidArgumentException::class);

    it('should reindex keys after delete', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection->remove(1);
        expect($collection->get(0))->toBe(1);
        expect($collection->get(1))->toBe(3);
    });

    // public function map(callable $callback): CollectionInterface;
    it('should map with an empty list', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection = $collection->map(function ($element) {
            return $element * 2;
        });
        expect($collection->size())->toBe(0);
    });

    it('should map', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection = $collection->map(function ($element) {
            return $element * 2;
        });
        expect($collection->get(0))->toBe(2);
        expect($collection->get(1))->toBe(4);
        expect($collection->get(2))->toBe(6);
    });

    it('should map with index', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection = $collection->map(function ($element, $index) {
            return $element * $index;
        });
        expect($collection->get(0))->toBe(0);
        expect($collection->get(1))->toBe(2);
        expect($collection->get(2))->toBe(6);
    });

    it('should map nested collections', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        $collection->get(0)->push(1);
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        $collection->get(1)->push(2);
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        $collection->get(2)->push(3);
        $collection = $collection->map(function ($element) {
            return $element->map(function ($element) {
                return $element * 2;
            });
        });

        expect($collection->get(0)->get(0))->toBe(2);
        expect($collection->get(1)->get(0))->toBe(4);
        expect($collection->get(2)->get(0))->toBe(6);
    });

    // public function filter(callable $callback): CollectionInterface;
    it('should filter with an empty list', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection = $collection->filter(function ($element) {
            return $element > 1;
        });
        expect($collection->size())->toBe(0);
    });

    it('should filter', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection = $collection->filter(function ($element) {
            return $element > 1;
        });
        expect($collection->get(0))->toBe(2);
        expect($collection->get(1))->toBe(3);
    });

    it('should filter with index', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection = $collection->filter(function ($element, $index) {
            return $index > 1;
        });
        expect($collection->get(0))->toBe(3);
    });

    it('should filter nested collections', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        $collection->get(0)->push(1);
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        $collection->get(1)->push(2);
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        $collection->get(2)->push(3);

        $collection = $collection->filter(function ($element) {
            return $element->get(0) > 1;
        });

        expect($collection->get(0)->get(0))->toBe(2);
        expect($collection->get(1)->get(0))->toBe(3);
    });

    it('should filter with text', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push('a');
        $collection->push('b');
        $collection->push('c');
        $collection = $collection->filter(function ($element) {
            return 'b' === $element;
        });
        expect($collection->get(0))->toBe('b');
    });

    // public function reduce(callable $callback, mixed $initial = null): mixed;
    it('should reduce with an empty list', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->reduce(function ($accumulator, $element) {
            return $accumulator + $element;
        }))->toBe(null);
    });

    it('should reduce', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        expect($collection->reduce(function ($accumulator, $element) {
            return $accumulator + $element;
        }))->toBe(1);
        $collection->push(2);
        expect($collection->reduce(function ($accumulator, $element) {
            return $accumulator + $element;
        }))->toBe(3);
        $collection->push(3);
        expect($collection->reduce(function ($accumulator, $element) {
            return $accumulator + $element;
        }))->toBe(6);
    });

    it('should reduce with initial value', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->reduce(function ($accumulator, $element) {
            return $accumulator + $element;
        }, 0))->toBe(0);
        $collection->push(1);
        expect($collection->reduce(function ($accumulator, $element) {
            return $accumulator + $element;
        }, 0))->toBe(1);
        $collection->push(2);
        expect($collection->reduce(function ($accumulator, $element) {
            return $accumulator + $element;
        }, 0))->toBe(3);
        $collection->push(3);
        expect($collection->reduce(function ($accumulator, $element) {
            return $accumulator + $element;
        }, 0))->toBe(6);
    });

    it('should make the sum of a big collection of random int', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        for ($i = 0; $i < 100; ++$i) {
            $collection->push(rand(0, 100));
        }
        expect($collection->reduce(function ($accumulator, $element) {
            return $accumulator + $element;
        }))->toBe(array_sum($collection->toArray()));
    });

    // public function forEach(callable $callback): void;
    it('should forEach with empty collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->forEach(function ($element) {
            $element = 'a';
        });
        expect($collection->size())->toBe(0);
    });

    it('should forEach', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);

        $sum = 0;

        $collection->forEach(function ($element) use (&$sum) {
            $sum += $element;
        });

        expect($sum)->toBe(6);
    });

    it('should forEach with index', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        $sum = 0;

        $collection->forEach(function ($element, $index) use (&$sum) {
            $sum += $element * $index;
        });

        expect($sum)->toBe(11);
    });

    it('should forEach with nested collections', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());
        $collection->push(new \Opmvpc\StructuresDonnees\Lists\Collection());

        $sum = 0;

        $collection->forEach(function ($element) use (&$sum) {
            $element->push(1);
            $sum += $element->get(0);
        });

        expect($sum)->toBe(3);
    });

    it('should foreach with text', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push('a');
        $collection->push('b');
        $collection->push('c');

        $sum = '';

        $collection->forEach(function ($element) use (&$sum) {
            $sum .= $element;
        });

        expect($sum)->toBe('abc');
    });

    // public function some(callable $callback): bool;
    it('should some with empty collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->some(function ($element) {
            return true;
        }))->toBe(false);
    });

    it('should some', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        expect($collection->some(function ($element) {
            return 3 === $element;
        }))->toBe(true);
    });

    it('should some with index', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        expect($collection->some(function ($element, $index) {
            return 3 === $element && 1 === $index;
        }))->toBe(true);
    });

    it('should some with text', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push('a');
        $collection->push('b');
        $collection->push('c');

        expect($collection->some(function ($element) {
            return 'b' === $element;
        }))->toBe(true);
    });

    it('should be false if some not found', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        expect($collection->some(function ($element) {
            return 5 === $element;
        }))->toBe(false);
    });

    // public function every(callable $callback): bool;
    it('should every with empty collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->every(function ($element) {
            return true;
        }))->toBe(true);
    });

    it('should every', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        expect($collection->every(function ($element) {
            return $element > 1;
        }))->toBe(true);
    });

    it('should every with index', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        expect($collection->every(function ($element, $index) {
            return $element > 1 && $index < 3;
        }))->toBe(true);
    });

    it('should every with text', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push('a');
        $collection->push('b');
        $collection->push('c');

        expect($collection->every(function ($element) {
            return 1 === strlen($element);
        }))->toBe(true);
    });

    it('should be false if every not found', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        expect($collection->every(function ($element) {
            return $element > 2;
        }))->toBe(false);
    });

    // public function find(callable $callback): mixed;
    it('should find with empty collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->find(function ($element) {
            return true;
        }))->toBe(null);
    });

    it('should find', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        expect($collection->find(function ($element) {
            return 3 === $element;
        }))->toBe(3);
    });

    it('should find with index', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        expect($collection->find(function ($element, $index) {
            return 3 === $element && 1 === $index;
        }))->toBe(3);
    });

    it('should find with text', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push('a');
        $collection->push('b');
        $collection->push('c');

        expect($collection->find(function ($element) {
            return 'b' === $element;
        }))->toBe('b');
    });

    it('should be null if find not found', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        expect($collection->find(function ($element) {
            return 5 === $element;
        }))->toBe(null);
    });

    // public function join(string $separator = ','): string;
    it('should join with empty collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->join())->toBe('');
    });

    it('should join with default separator', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        expect($collection->join())->toBe('1');
        $collection->push(2);
        expect($collection->join())->toBe('1, 2');
        $collection->push(3);
        expect($collection->join())->toBe('1, 2, 3');
        $collection->push(4);
        $collection->push(5);
        $collection->push(6);
        expect($collection->join())->toBe('1, 2, 3, 4, 5, 6');
    });

    it('should join with custom separator', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        expect($collection->join(' '))->toBe('1');
        $collection->push(2);
        expect($collection->join(' '))->toBe('1 2');
        $collection->push(3);
        expect($collection->join(' '))->toBe('1 2 3');
    });

    // public function reverse(): CollectionInterface;
    it('should reverse with empty collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->reverse()->size())->toBe(0);
    });

    it('should reverse', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(0);
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        expect($collection->reverse()->get(0))->toBe(4);
        expect($collection->reverse()->get(1))->toBe(3);
        expect($collection->reverse()->get(2))->toBe(2);
        expect($collection->reverse()->get(3))->toBe(1);
        expect($collection->reverse()->get(4))->toBe(0);
    });

    it('should reverse texts', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push('a');
        $collection->push('b');
        $collection->push('c');

        expect($collection->reverse()->get(0))->toBe('c');
        expect($collection->reverse()->get(1))->toBe('b');
        expect($collection->reverse()->get(2))->toBe('a');
    });

    // public function sort(callable $callback): CollectionInterface;
    it('should sort with empty collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->sort(function ($a, $b) {
            return $a <=> $b;
        })->size())->toBe(0);
    });

    it('should sort', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(4);
        $collection->push(3);
        $collection->push(2);
        $collection->push(1);
        $collection->push(0);

        $sortedCollection = $collection->sort(function ($a, $b) {
            return $a <=> $b;
        });

        expect($sortedCollection->get(0))->toBe(0);
        expect($sortedCollection->get(1))->toBe(1);
        expect($sortedCollection->get(2))->toBe(2);
        expect($sortedCollection->get(3))->toBe(3);
        expect($sortedCollection->get(4))->toBe(4);
    });

    it('should sort strings from iphone1 to 15', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push('iphone4');
        $collection->push('iphone5');
        $collection->push('iphone6');
        $collection->push('iphone11');
        $collection->push('iphone8');
        $collection->push('iphone3');
        $collection->push('iphone1');
        $collection->push('iphone9');
        $collection->push('iphone15');
        $collection->push('iphone14');
        $collection->push('iphone13');
        $collection->push('iphone12');
        $collection->push('iphone2');
        $collection->push('iphone7');
        $collection->push('iphone10');

        $sortedCollection = $collection->sort(function ($a, $b) {
            return $a <=> $b;
        });

        expect($sortedCollection->get(0))->toBe('iphone1');
        expect($sortedCollection->get(1))->toBe('iphone10');
        expect($sortedCollection->get(2))->toBe('iphone11');
        expect($sortedCollection->get(3))->toBe('iphone12');
        expect($sortedCollection->get(4))->toBe('iphone13');
        expect($sortedCollection->get(5))->toBe('iphone14');
        expect($sortedCollection->get(6))->toBe('iphone15');
        expect($sortedCollection->get(7))->toBe('iphone2');
        expect($sortedCollection->get(8))->toBe('iphone3');
        expect($sortedCollection->get(9))->toBe('iphone4');
        expect($sortedCollection->get(10))->toBe('iphone5');
        expect($sortedCollection->get(11))->toBe('iphone6');
        expect($sortedCollection->get(12))->toBe('iphone7');
        expect($sortedCollection->get(13))->toBe('iphone8');
        expect($sortedCollection->get(14))->toBe('iphone9');
    });

    // public function concat(CollectionInterface ...$collection): CollectionInterface;
    it('should concat with empty collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection2 = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->concat($collection2)->size())->toBe(0);
    });

    it('should concat', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(0);
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        $collection2 = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection2->push(5);
        $collection2->push(6);
        $collection2->push(7);
        $collection2->push(8);
        $collection2->push(9);

        $concatCollection = $collection->concat($collection2);

        expect($concatCollection->get(0))->toBe(0);
        expect($concatCollection->get(1))->toBe(1);
        expect($concatCollection->get(2))->toBe(2);
        expect($concatCollection->get(3))->toBe(3);
        expect($concatCollection->get(4))->toBe(4);
        expect($concatCollection->get(5))->toBe(5);
        expect($concatCollection->get(6))->toBe(6);
        expect($concatCollection->get(7))->toBe(7);
        expect($concatCollection->get(8))->toBe(8);
        expect($concatCollection->get(9))->toBe(9);
    });

    it('should concat multiple collections', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(0);
        $collection->push(1);

        $collection2 = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(2);
        $collection->push(3);

        $collection3 = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(4);
        $collection2->push(5);

        $concatCollection = $collection->concat($collection2, $collection3);

        expect($concatCollection->get(0))->toBe(0);
        expect($concatCollection->get(1))->toBe(1);
        expect($concatCollection->get(2))->toBe(2);
        expect($concatCollection->get(3))->toBe(3);
        expect($concatCollection->get(4))->toBe(4);
        expect($concatCollection->get(5))->toBe(5);
    });

    // public function fill(mixed $value = null, int $start = 0, int $end = null): CollectionInterface;
    it('should fill with empty collection', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        expect($collection->fill(1)->size())->toBe(0);
    });

    it('should fill with default value', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);
        $collection->push(5);

        $filledCollection = $collection->fill()->toArray();

        expect($filledCollection[0])->toBe(null);
        expect($filledCollection[1])->toBe(null);
        expect($filledCollection[2])->toBe(null);
        expect($filledCollection[3])->toBe(null);
        expect($filledCollection[4])->toBe(null);
    });

    it('should fill with custom value', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(0);
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        $filledCollection = $collection->fill(1);

        expect($filledCollection->get(0))->toBe(1);
        expect($filledCollection->get(1))->toBe(1);
        expect($filledCollection->get(2))->toBe(1);
        expect($filledCollection->get(3))->toBe(1);
        expect($filledCollection->get(4))->toBe(1);
    });

    it('should fill with custom value and start', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(0);
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        $filledCollection = $collection->fill(1, 2);

        expect($filledCollection->get(0))->toBe(0);
        expect($filledCollection->get(1))->toBe(1);
        expect($filledCollection->get(2))->toBe(1);
        expect($filledCollection->get(3))->toBe(1);
        expect($filledCollection->get(4))->toBe(1);
    });

    it('should fill with custom value and start and end', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(0);
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);
        $collection->push(4);

        $filledCollection = $collection->fill(1, 2, 4);

        expect($filledCollection->get(0))->toBe(0);
        expect($filledCollection->get(1))->toBe(1);
        expect($filledCollection->get(2))->toBe(1);
        expect($filledCollection->get(3))->toBe(1);
        expect($filledCollection->get(4))->toBe(4);
    });

    it('should work with mixed fluent calls', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(0);
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);

        $filledCollection = $collection->fill(1, 2, 4)->sort()->reverse();
        expect($filledCollection->toArray())->toBe([1, 1, 1, 0]);
    });

    it('should work with mixed fluent calls map, filter, reduce', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(0);
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);

        $filledCollection = $collection->map(function ($item) {
            return $item * 2;
        })->filter(function ($item) {
            return $item > 2;
        })->reduce(function ($carry, $item) {
            return $carry + $item;
        }, 0);

        expect($filledCollection)->toBe(10);
    });

    // harder
    it('should work with mixed fluent calls map, filter, reduce, sort, reverse', function () {
        $collection = new \Opmvpc\StructuresDonnees\Lists\Collection();
        $collection->push(0);
        $collection->push(1);
        $collection->push(2);
        $collection->push(3);

        $filledCollection = $collection->map(function ($item) {
            return $item * 2;
        })->filter(function ($item) {
            return $item > 2;
        })->sort()->reverse();

        expect($filledCollection->toArray())->toBe([6, 4]);
    });
});
