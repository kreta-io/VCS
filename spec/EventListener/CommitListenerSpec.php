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
use Kreta\Component\VCS\Event\NewCommitEvent;
use Kreta\Component\VCS\Matcher\CommitMatcher;
use Kreta\Component\VCS\Model\Interfaces\CommitInterface;
use Kreta\Component\VCS\Repository\CommitRepository;
use PhpSpec\ObjectBehavior;

/**
 * Class CommitListenerSpec.
 */
class CommitListenerSpec extends ObjectBehavior
{
    function let(CommitMatcher $matcher, CommitRepository $commitRepository)
    {
        $this->beConstructedWith($matcher, $commitRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\EventListener\CommitListener');
    }

    function it_listens_to_new_commit(
        CommitMatcher $matcher,
        CommitRepository $commitRepository,
        NewCommitEvent $event,
        CommitInterface $commit,
        IssueInterface $issue
    ) {
        $event->getCommit()->shouldBeCalled()->willReturn($commit);

        $matcher->getRelatedIssues($commit)->shouldBeCalled()->willReturn([$issue]);
        $commit->setIssuesRelated([$issue])->shouldBeCalled();

        $commitRepository->persist($commit)->shouldBeCalled();

        $this->newCommit($event);
    }
}
