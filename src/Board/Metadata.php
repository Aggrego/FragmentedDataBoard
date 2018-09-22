<?php

declare(strict_types = 1);

namespace Aggrego\FragmentedDataBoard\Board;

use Aggrego\FragmentedDataBoard\Board\Shard\Collection;
use Aggrego\FragmentedDataBoard\Board\Shard\FinalItem;
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
