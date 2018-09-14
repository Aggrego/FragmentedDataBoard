<?php

declare(strict_types = 1);

namespace Aggrego\ShardDataBoard\Board;

use Aggrego\Domain\Board\Board;
use Aggrego\ShardDataBoard\Board\Prototype\Board as ProgressiveBoardPrototype;
use Aggrego\Domain\Board\Builder as FactoryInterface;
use Aggrego\Domain\Board\Prototype\Board as PrototypeBoard;

class Builder implements FactoryInterface
{

    public function isSupported(PrototypeBoard $board): bool
    {
        return $board instanceof ProgressiveBoardPrototype;
    }

    /**
     * @param PrototypeBoard|ProgressiveBoardPrototype $board
     * @return Board
     */
    public function build(PrototypeBoard $board): Board
    {
        // TODO: Implement factory() method.
    }
}
