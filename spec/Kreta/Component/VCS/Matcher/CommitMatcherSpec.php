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
use Kreta\Component\VCS\Model\Interfaces\CommitInterface;
use Kreta\Component\VCS\Model\Interfaces\RepositoryInterface;
use Kreta\Component\VCS\Repository\IssueRepository;
use PhpSpec\ObjectBehavior;

/**
 * Class CommitMatcherSpec.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class CommitMatcherSpec extends ObjectBehavior
{
    function let(IssueRepository $issueRepository)
    {
        $this->beConstructedWith($issueRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Matcher\CommitMatcher');
    }

    function it_extends_abstract_matcher()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Matcher\Abstracts\AbstractMatcher');
    }

    function it_gets_related_issues(
        CommitInterface $commit,
        IssueRepository $issueRepository,
        IssueInterface $issue,
        RepositoryInterface $repository,
        BranchInterface $branch
    ) {
        $commit->getMessage()->shouldBeCalled()->willReturn('PR0-1 Testing relation with issue');
        $commit->getBranch()->shouldBeCalled()->willReturn($branch);
        $branch->getRepository()->shouldBeCalled()->willReturn($repository);
        $branch->getName()->shouldBeCalled()->willReturn('master');

        $issueRepository->findRelatedIssuesByRepository($repository, 'PR0', '1')
            ->shouldBeCalled()->willReturn([$issue]);

        $this->getRelatedIssues($commit)->shouldReturn([$issue]);
    }

    function it_matches_lowercase_projects(
        CommitInterface $commit,
        IssueRepository $issueRepository,
        IssueInterface $issue,
        RepositoryInterface $repository,
        BranchInterface $branch
    ) {
        $commit->getMessage()->shouldBeCalled()->willReturn('pr0-1 Testing relation with issue');
        $commit->getBranch()->shouldBeCalled()->willReturn($branch);
        $branch->getRepository()->shouldBeCalled()->willReturn($repository);
        $branch->getName()->shouldBeCalled()->willReturn('master');

        $issueRepository->findRelatedIssuesByRepository($repository, 'pr0', '1')
            ->shouldBeCalled()->willReturn([$issue]);

        $this->getRelatedIssues($commit)->shouldReturn([$issue]);
    }

    function it_returns_empty_array_if_not_branch_instance(IssueInterface $issue)
    {
        $this->getRelatedIssues($issue)->shouldReturn([]);
    }
}
