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

use PhpSpec\ObjectBehavior;

/**
 * Class BranchFactorySpec.
 */
class BranchFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Kreta\Component\VCS\Model\Branch');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Factory\BranchFactory');
    }

    function it_creates_branch_model()
    {
        $this->create()->shouldReturnAnInstanceOf('Kreta\Component\VCS\Model\Branch');
    }
}
