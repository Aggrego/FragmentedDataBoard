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

namespace Aggrego\FragmentedDataBoard\Board;

use Aggrego\AggregateEventConsumer\Shared\TraitAggregate;
use Aggrego\AggregateEventConsumer\Uuid;
use Aggrego\Domain\Board\Board as DomainBoard;
use Aggrego\Domain\Board\Key;
use Aggrego\Domain\Profile\Profile;
use Aggrego\FragmentedDataBoard\Board\Events\BoardCreatedEvent;
use Aggrego\FragmentedDataBoard\Board\Events\ShardAddedEvent;
use Aggrego\FragmentedDataBoard\Board\Shard\FinalItem;
use Aggrego\FragmentedDataBoard\Board\Transformation\Item;
use Aggrego\FragmentedDataBoard\Board\Transformation\Key as TransformationKey;

class Board implements DomainBoard
{
    use TraitAggregate;

    /** @var Uuid */
    private $uuid;

    /** @var Key */
    private $key;

    /** @var Profile */
    private $profile;

    /** @var Metadata */
    private $metadata;

    public function __construct(Uuid $uuid, Key $key, Profile $profile, Metadata $metadata, ?Uuid $parentUuid)
    {
        $this->uuid = $uuid;
        $this->key = $key;
        $this->profile = $profile;
        $this->metadata = $metadata;

        $this->pushEvent(new BoardCreatedEvent($uuid, $key, $profile, $parentUuid));

        $this->metadata = $metadata;
        foreach ($metadata->getShards() as $shard) {
            $this->pushEvent(new ShardAddedEvent($this->uuid, $shard));
        }
    }

    public function getId(): Uuid
    {
        return $this->uuid;
    }

    public function getProfile(): Profile
    {
        return $this->profile;
    }

    public function generateTransformedMetadata(TransformationKey $key): Metadata
    {
        $metadata = $this->metadata;
        /** @var Item $item */
        foreach ($key as $item) {
            $metadata = $metadata->replace(
                new FinalItem(
                    $item->getUuid(),
                    $item->getProfile(),
                    $item->getData()
                )
            );
        }

        return $metadata;
    }
}
