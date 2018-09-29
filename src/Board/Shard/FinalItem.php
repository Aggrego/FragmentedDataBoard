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

namespace Aggrego\FragmentedDataBoard\Board\Shard;

use Aggrego\FragmentedDataBoard\Board\Data;
use Aggrego\Domain\Profile\Profile;

class FinalItem extends Item
{
    /** @var Data */
    private $data;

    public function __construct(Uuid $uuid, Profile $profile, Data $data)
    {
        parent::__construct($uuid, $profile);
        $this->data = $data;
    }

    public function getData(): Data
    {
        return $this->data;
    }
}
