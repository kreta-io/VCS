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

namespace spec\Kreta\Component\VCS\Matcher;

use Kreta\Component\Issue\Model\Interfaces\IssueInterface;
use Kreta\Component\VCS\Model\Interfaces\BranchInterface;
use Kreta\Component\VCS\Model\Interfaces\RepositoryInterface;
use Kreta\Component\VCS\Repository\IssueRepository;
use PhpSpec\ObjectBehavior;

/**
 * Class BranchMatcherSpec.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class BranchMatcherSpec extends ObjectBehavior
{
    function let(IssueRepository $issueRepository)
    {
        $this->beConstructedWith($issueRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Matcher\BranchMatcher');
    }

    function it_extends_abstract_matcher()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Matcher\Abstracts\AbstractMatcher');
    }

    function it_gets_related_issues(
        BranchInterface $branch,
        IssueRepository $issueRepository,
        IssueInterface $issue,
        RepositoryInterface $repository
    ) {
        $branch->getRepository()->shouldBeCalled()->willReturn($repository);
        $branch->getName()->shouldBeCalled()->willReturn('feature/PR0-1-test-relation-with-issues');

        $issueRepository->findRelatedIssuesByRepository($repository, 'PR0', '1')
            ->shouldBeCalled()->willReturn([$issue]);

        $this->getRelatedIssues($branch)->shouldReturn([$issue]);
    }

    function it_returns_empty_array_if_not_branch_instance(IssueInterface $issue)
    {
        $this->getRelatedIssues($issue)->shouldReturn([]);
    }
}
