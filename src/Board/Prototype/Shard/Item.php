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
