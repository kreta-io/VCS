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

namespace spec\Kreta\Component\VCS\Factory;

use Kreta\Component\VCS\Model\Interfaces\BranchInterface;
use PhpSpec\ObjectBehavior;

/**
 * Class CommitFactorySpec.
 */
class CommitFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Kreta\Component\VCS\Model\Commit');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Factory\CommitFactory');
    }

    function it_creates_a_commit(BranchInterface $branch)
    {
        $this->create('11231', 'Test commit', $branch, 'gorkalaucirica', 'http://github.com/kreta/kreta')
            ->shouldReturnAnInstanceOf('Kreta\Component\VCS\Model\Commit');
    }
}
