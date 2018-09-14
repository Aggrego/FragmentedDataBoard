<?php

declare(strict_types = 1);

namespace Aggrego\ShardDataBoard\Board;

use Aggrego\ShardDataBoard\Board\Shard\Collection;
use Aggrego\ShardDataBoard\Board\Shard\FinalItem;
use Aggrego\Domain\Board\Metadata as DomainMetadata;

class Metadata implements DomainMetadata
{
    /** @var State */
    private $state;

    /** @var Collection */
    private $shards;

    public function __construct(State $state, Collection $shards)
    {
        $this->state = $state;
        $this->shards = $shards;
    }

    public function getState(): State
    {
        return $this->state;
    }

    public function replace(FinalItem $finalItem): void
    {
        $this->shards->replace($finalItem);
    }

    public function getShards(): Collection
    {
        return $this->shards;
    }

    public function readyToTransformation(): bool
    {
        return $this->shards->isAllShardsFinishedProgress();
    }
}
