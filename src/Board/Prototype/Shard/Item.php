<?php

declare(strict_types = 1);

namespace Aggrego\FragmentedDataBoard\Board\Prototype\Shard;

use Aggrego\Domain\Board\Key;
use Aggrego\Domain\Profile\Profile;

class Item
{
    /** @var Profile */
    private $profile;

    /** @var Key */
    private $key;

    public function __construct(Profile $profile, Key $key)
    {
        $this->profile = $profile;
        $this->key = $key;
    }

    public function getProfile(): Profile
    {
        return $this->profile;
    }

    public function getKey(): Key
    {
        return $this->key;
    }
}
