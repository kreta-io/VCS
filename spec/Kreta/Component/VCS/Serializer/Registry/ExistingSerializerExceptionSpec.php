<?php

/*
 * This file is part of the Kreta package.
 *
 * (c) Beñat Espiña <benatespina@gmail.com>
 * (c) Gorka Laucirica <gorka.lauzirika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Kreta\Component\VCS\Serializer\Registry;

use PhpSpec\ObjectBehavior;

/**
 * Class ExistingSerializerExceptionSpec.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class ExistingSerializerExceptionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('github', 'push');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Serializer\Registry\ExistingSerializerException');
    }

    function it_extends_invalid_argument_exception()
    {
        $this->shouldHaveType('\InvalidArgumentException');
    }

    function it_returns_message()
    {
        $this->getMessage()->shouldReturn('Serializer for "github"\'s "push" event already exists');
    }
}
