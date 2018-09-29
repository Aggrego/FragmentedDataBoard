<?php
/**
 *
 * This file is part of the Aggrego.
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

declare(strict_types = 1);

namespace Aggrego\FragmentedDataBoard\Board\Prototype\Shard;

use ArrayIterator;
use Assert\Assertion;
use Iterator;
use IteratorAggregate;

class Collection implements IteratorAggregate
{
    /** @var array */
    private $list;

    public function __construct(array $list = [])
    {
        Assertion::allIsInstanceOf($list, Item::class);
        $this->list = $list;
    }

    public function add(Item $item): void
    {
        $this->list[] = $item;
    }

    public function getIterator(): Iterator
    {
        return new ArrayIterator($this->list);
    }
}
