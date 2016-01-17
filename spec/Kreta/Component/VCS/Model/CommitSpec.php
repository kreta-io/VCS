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

namespace spec\Kreta\Component\VCS\Model;

use Kreta\Component\VCS\Model\Interfaces\BranchInterface;
use PhpSpec\ObjectBehavior;

/**
 * Class CommitSpec.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class CommitSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Model\Commit');
    }

    function it_implements_commit_interface()
    {
        $this->shouldImplement('Kreta\Component\VCS\Model\Interfaces\CommitInterface');
    }

    function it_does_not_have_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function its_author_is_mutable()
    {
        $this->setAuthor('gorkalaucirica')->shouldReturn($this);
        $this->getAuthor()->shouldReturn('gorkalaucirica');
    }

    function its_branch_is_mutable(BranchInterface $branch)
    {
        $this->setBranch($branch)->shouldReturn($this);
        $this->getBranch()->shouldReturn($branch);
    }

    function its_issues_related_is_mutable()
    {
        $this->setIssuesRelated([])->shouldReturn($this);
        $this->getIssuesRelated()->shouldReturn([]);
    }

    function its_message_is_mutable()
    {
        $this->setMessage('Test message')->shouldReturn($this);
        $this->getMessage()->shouldReturn('Test message');
    }

    function its_sha_is_mutable()
    {
        $this->setSha('1231412423423e2342')->shouldReturn($this);
        $this->getSha()->shouldReturn('1231412423423e2342');
    }

    function its_url_is_mutable()
    {
        $this->setUrl('http://github.com/kreta/kreta')->shouldReturn($this);
        $this->getUrl()->shouldReturn('http://github.com/kreta/kreta');
    }
}
