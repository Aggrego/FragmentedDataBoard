<?php

namespace Aggrego\FragmentedDataBoard\Board\Shard;

use Aggrego\Domain\Board\Key;
use Aggrego\Domain\Profile\Profile;
use Ramsey\Uuid\Uuid as RamseyUuid;

class InitialItem extends Item
{
    /** @var Key */
    private $key;

    public function __construct(Profile $profile, Key $key)
    {
        parent::__construct(
            new Uuid(RamseyUuid::uuid4()->toString()),
            $profile
        );
        $this->key = $key;
    }

    public function getKey(): Key
    {
        return $this->key;
    }
}
