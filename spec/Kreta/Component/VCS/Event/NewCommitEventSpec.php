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

use Kreta\Component\VCS\Model\Interfaces\CommitInterface;
use PhpSpec\ObjectBehavior;

/**
 * Class NewCommitEventSpec.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class NewCommitEventSpec extends ObjectBehavior
{
    function let(CommitInterface $commit)
    {
        $this->beConstructedWith($commit);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Event\NewCommitEvent');
    }

    function it_extends_event()
    {
        $this->shouldHaveType('Symfony\Component\EventDispatcher\Event');
    }

    function it_gets_commit(CommitInterface $commit)
    {
        $this->getCommit()->shouldReturn($commit);
    }
}
