<?php

declare(strict_types = 1);

namespace Aggrego\FragmentedDataBoard\Board\Shard;

use Aggrego\Domain\Profile\Profile;

abstract class Item
{
    /** @var Uuid */
    private $uuid;

    /** @var Profile */
    private $profile;

    public function __construct(Uuid $uuid, Profile $profile)
    {
        $this->uuid = $uuid;
        $this->profile = $profile;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getProfile(): Profile
    {
        return $this->profile;
    }
}
