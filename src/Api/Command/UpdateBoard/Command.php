<?php

declare(strict_types = 1);

namespace Aggrego\FragmentedDataBoard\Api\Domain\Command\UpdateBoard;

use Aggrego\Domain\Board\Uuid as BoardUuid;
use Aggrego\Domain\Profile\Profile;
use Aggrego\FragmentedDataBoard\Board\Data;
use Aggrego\FragmentedDataBoard\Board\Shard\Uuid as ShardUuid;

class Command
{
    /** @var BoardUuid */
    private $boardUuid;

    /** @var ShardUuid */
    private $shardUuid;

    /** @var Profile */
    private $profile;

    /** @var Data */
    private $data;

    public function __construct(
        string $boardUuid,
        string $shardUuid,
        string $profileName,
        string $versionName,
        string $data
    )
    {
        $this->boardUuid = new BoardUuid($boardUuid);
        $this->shardUuid = new ShardUuid($shardUuid);
        $this->profile = Profile::createFrom($profileName, $versionName);
        $this->data = new Data($data);
    }

    public function getBoardUuid(): BoardUuid
    {
        return $this->boardUuid;
    }

    public function getShardUuid(): ShardUuid
    {
        return $this->shardUuid;
    }

    public function getProfile(): Profile
    {
        return $this->profile;
    }

    public function getData(): Data
    {
        return $this->data;
    }
}
