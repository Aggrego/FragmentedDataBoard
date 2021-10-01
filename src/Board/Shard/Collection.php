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

namespace Aggrego\FragmentedDataBoard\Board\Shard;

use Aggrego\Domain\Profile\Profile;
use Aggrego\FragmentedDataBoard\Board\Exception\InvalidUuidComparisonOnReplaceException;
use ArrayIterator;
use Assert\Assertion;
use Countable;
use Iterator;
use IteratorAggregate;

class Collection implements Countable, IteratorAggregate
{
    /** @var Item[] */
    private $list;

    private function __construct(array $list)
    {
        $this->list = $list;
    }

    public static function createNew(array $list): self
    {
        Assertion::allIsInstanceOf($list, InitialItem::class);
        return new self($list);
    }

    public function replace(FinalItem $finalShard): self
    {
        /** @var Item $shard */
        $list = $this->list;
        $listUuid = [];
        foreach ($list as $key => $shard) {
            if ($shard instanceof FinalItem) {
                continue;
            }
            $listUuid[] = $shard->getUuid()->getValue();
            if ($shard->getUuid()->equal($finalShard->getUuid())
                && $shard->getProfile()->equal($finalShard->getProfile())) {
                $list[$key] = $finalShard;
                return new self($list);
            }
        }

        throw new InvalidUuidComparisonOnReplaceException(
            sprintf(
                'Could not find initial shard by uuid %s in given collection: %s',
                $finalShard->getUuid()->getValue(),
                join(',', $listUuid)
            )
        );
    }

    public function count(): int
    {
        return count($this->list);
    }

    public function getIterator(): Iterator
    {
        return new ArrayIterator($this->list);
    }

    public function findAllByProfile(Profile $profile): Iterator
    {
        $list = [];
        foreach ($this->list as $item) {
            if ($item->getProfile()->equal($profile)) {
                $list[] = $item;
            }
        }
        return new ArrayIterator($list);
    }
}
