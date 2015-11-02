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

namespace spec\Kreta\Component\VCS\Event;

use Kreta\Component\VCS\Model\Interfaces\BranchInterface;
use PhpSpec\ObjectBehavior;

/**
 * Class NewBranchEventSpec.
 */
class NewBranchEventSpec extends ObjectBehavior
{
    function let(BranchInterface $branch)
    {
        $this->beConstructedWith($branch);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Event\NewBranchEvent');
    }

    function it_extends_event()
    {
        $this->shouldHaveType('Symfony\Component\EventDispatcher\Event');
    }

    function it_gets_branch(BranchInterface $branch)
    {
        $this->getBranch()->shouldReturn($branch);
    }
}
