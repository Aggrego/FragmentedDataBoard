<?php

declare(strict_types = 1);

namespace Aggrego\FragmentedDataBoard\Board;

use Aggrego\Domain\Board\Uuid;
use Aggrego\FragmentedDataBoard\Board\Exception\BoardNotFoundException;

interface Repository
{
    /**
     * @param Uuid $uuid
     * @return Board
     * @throws BoardNotFoundException
     */
    public function getBoardByUuid(Uuid $uuid): Board;
}
