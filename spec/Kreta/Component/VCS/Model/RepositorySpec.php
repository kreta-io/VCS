<?php

namespace spec\Kreta\Component\VCS\Model;

use Kreta\Component\Project\Model\Interfaces\ProjectInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\Model\Repository');
    }

    function its_id_is_mutable()
    {
        $this->setId('2222')->shouldReturn($this);
        $this->getId()->shouldReturn('2222');
    }

    function its_name_is_mutable()
    {
        $this->setName('kreta_io/kreta')->shouldReturn($this);
        $this->getName()->shouldReturn('kreta_io/kreta');
    }

    function its_project_are_mutable(ProjectInterface $project)
    {
        $this->addProject($project)->shouldReturn($this);

        $this->getProjects()->shouldHaveCount(1);

        $this->removeProject($project)->shouldReturn($this);

        $this->getProjects()->shouldHaveCount(0);
    }

    function its_provider_is_mutable()
    {
        $this->setProvider('github')->shouldReturn($this);
        $this->getProvider()->shouldReturn('github');
    }

    function its_url_is_mutable()
    {
        $this->setUrl('https://github.com/kreta-io/kreta')->shouldReturn($this);
        $this->getUrl()->shouldReturn('https://github.com/kreta-io/kreta');
    }
}