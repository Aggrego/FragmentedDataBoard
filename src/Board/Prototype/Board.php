<?php

declare(strict_types = 1);

namespace Aggrego\ShardDataBoard\Board\Prototype;

use Aggrego\ShardDataBoard\Board\Metadata;
use Aggrego\ShardDataBoard\Board\Prototype\Shard\Collection;
use Aggrego\ShardDataBoard\Board\Prototype\Shard\Item;
use Aggrego\ShardDataBoard\Board\Shard\Collection as ShardsCollection;
use Aggrego\ShardDataBoard\Board\Shard\InitialItem;
use Aggrego\ShardDataBoard\Board\State;
use Aggrego\Domain\Board\Key;
use Aggrego\Domain\Board\Metadata as DomainMetadata;
use Aggrego\Domain\Board\Prototype\Board as BoardInterface;
use Aggrego\Domain\Profile\Profile;
use Traversable;

class Board implements BoardInterface
{
    /** @var Key */
    private $key;

    /** @var Profile */
    private $profile;

    /** @var Collection */
    private $shards;

    /** @var State  */
    private $state;

    public function __construct(Key $key, Profile $profile, State $state)
    {
        $this->key = $key;
        $this->profile = $profile;
        $this->shards = new Collection();
        $this->state = $state;
    }

    public function getKey(): Key
    {
        return $this->key;
    }

    public function getProfile(): Profile
    {
        return $this->profile;
    }

    public function getShards(): Traversable
    {
        return $this->shards->getIterator();
    }

    public function addShard(Key $key, Profile $shardProfile): void
    {
        $this->shards->add(new Item($shardProfile, $key));
    }

    public function getMetadata(): DomainMetadata
    {
        $shardsList = [];
        /** @var Item $item */
        foreach ($this->getShards() as $item) {
            $shardsList[] = new InitialItem($item->getProfile(), $item->getKey());
        }

        return new Metadata($this->state, new ShardsCollection($shardsList));
    }
}
