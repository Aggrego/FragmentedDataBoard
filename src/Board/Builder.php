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
use Aggrego\Domain\Board\Board as DomainBoard;
use Aggrego\Domain\Board\Builder as FactoryInterface;
use Aggrego\Domain\Board\Key;
use Aggrego\Domain\Board\Metadata;
use Aggrego\Domain\Board\Prototype\Board as PrototypeBoard;
use Aggrego\Domain\Profile\Profile;
use Aggrego\FragmentedDataBoard\Board\Prototype\Board as ProgressiveBoardPrototype;

class Builder implements FactoryInterface
{
    public function isSupported(PrototypeBoard $board): bool
    {
        return $board instanceof ProgressiveBoardPrototype;
    }

    public function build(Uuid $uuid, Key $key, Profile $profile, Metadata $metadata, ?Uuid $parentUuid): DomainBoard
    {
        return new Board($uuid, $key, $profile, $metadata, $parentUuid);
    }
}
