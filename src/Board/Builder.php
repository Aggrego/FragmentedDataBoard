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

namespace Aggrego\FragmentedDataBoard\Board;

use Aggrego\AggregateEventConsumer\Uuid;
use Aggrego\Domain\Board\Board;
use Aggrego\Domain\Board\Key;
use Aggrego\Domain\Board\Metadata;
use Aggrego\Domain\Profile\Profile;
use Aggrego\FragmentedDataBoard\Board\Prototype\Board as ProgressiveBoardPrototype;
use Aggrego\Domain\Board\Builder as FactoryInterface;
use Aggrego\Domain\Board\Prototype\Board as PrototypeBoard;

class Builder implements FactoryInterface
{
    public function isSupported(PrototypeBoard $board): bool
    {
        return $board instanceof ProgressiveBoardPrototype;
    }

    public function build(Uuid $uuid, Key $key, Profile $profile, Metadata $step, ?Uuid $parentUuid): Board
    {
        // TODO: Implement build() method.
    }
}
