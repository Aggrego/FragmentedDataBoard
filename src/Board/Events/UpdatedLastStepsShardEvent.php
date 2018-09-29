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

namespace Aggrego\FragmentedDataBoard\Board\Events;

use Aggrego\AggregateEventConsumer\Shared\Event;
use Aggrego\AggregateEventConsumer\Uuid;

class UpdatedLastStepsShardEvent extends Event
{
    public function __construct(Uuid $uuid)
    {
        parent::__construct(['uuid' => $uuid->getValue()]);
    }
}
