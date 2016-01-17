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

namespace spec\Kreta\Component\VCS\EventListener;

use Kreta\Component\Issue\Model\Interfaces\IssueInterface;
use Kreta\Component\VCS\Event\NewBranchEvent;
use Kreta\Component\VCS\Matcher\BranchMatcher;
use Kreta\Component\VCS\Model\Interfaces\BranchInterface;
use Kreta\Component\VCS\Repository\BranchRepository;
use PhpSpec\ObjectBehavior;

/**
 * Class BranchListenerSpec.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class BranchListenerSpec extends ObjectBehavior
{
    function let(BranchMatcher $matcher, BranchRepository $branchRepository)
    {
        $this->beConstructedWith($matcher, $branchRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\EventListener\BranchListener');
    }

    function it_listens_to_new_branch(
        BranchMatcher $matcher,
        BranchRepository $branchRepository,
        NewBranchEvent $event,
        BranchInterface $branch,
        IssueInterface $issue
    ) {
        $event->getBranch()->shouldBeCalled()->willReturn($branch);

        $matcher->getRelatedIssues($branch)->shouldBeCalled()->willReturn([$issue]);
        $branch->setIssuesRelated([$issue])->shouldBeCalled();

        $branchRepository->persist($branch)->shouldBeCalled();

        $this->newBranch($event);
    }
}
