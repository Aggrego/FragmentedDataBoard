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

namespace spec\Aggrego\FragmentedDataBoard\Board\Exception;

use Aggrego\FragmentedDataBoard\Board\Exception\UnprocessableBoardException;
use PhpSpec\ObjectBehavior;
use RuntimeException;

class UnprocessableBoardExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(UnprocessableBoardException::class);
        $this->shouldBeAnInstanceOf(RuntimeException::class);
    }
}
