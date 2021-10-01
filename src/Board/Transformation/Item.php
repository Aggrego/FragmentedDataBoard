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

use Aggrego\Domain\Profile\Profile;
use Aggrego\FragmentedDataBoard\Board\Data;
use Aggrego\FragmentedDataBoard\Board\Shard\Uuid;

class Item
{
    /** @var Uuid */
    private $uuid;

    /** @var Profile */
    private $profile;

    /** @var Data */
    private $data;

    public function __construct(Uuid $uuid, Profile $profile, Data $data)
    {
        $this->uuid = $uuid;
        $this->profile = $profile;
        $this->data = $data;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
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
