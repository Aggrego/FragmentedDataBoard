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

namespace Aggrego\FragmentedDataBoard\Board\Transformation;

use Aggrego\Domain\Board\Key as DomainKey;
use Aggrego\Domain\Profile\Profile;
use Aggrego\FragmentedDataBoard\Board\Data;
use Aggrego\FragmentedDataBoard\Board\Shard\Uuid;
use ArrayIterator;
use Assert\Assert;
use Iterator;
use IteratorAggregate;

class Key implements IteratorAggregate
{
    /** @var Item[] */
    private $items;

    public function __construct(Item ...$items)
    {
        $this->items = $items;
    }

    public static function fromKey(DomainKey $key): self
    {
        Assert::thatAll($key->getValue())
            ->keyExists('shard_uuid')
            ->keyExists('profile')
            ->keyExists('data');

        $list = [];
        foreach ($key->getValue() as $row) {
            $list[] = new Item(
                new Uuid($row['shard_uuid']),
                Profile::createFromName($row['profile']),
                new Data($row['data'])
            );
        }

        return new self(...$list);
    }

    public function getIterator(): Iterator
    {
        return new ArrayIterator($this->items);
    }
}
