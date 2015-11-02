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

namespace spec\Kreta\Component\VCS\WebhookStrategy;

use Kreta\Component\VCS\Serializer\Interfaces\SerializerInterface;
use Kreta\Component\VCS\Serializer\Registry\Interfaces\SerializerRegistryInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GithubWebhookStrategySpec.
 */
class GithubWebhookStrategySpec extends ObjectBehavior
{
    function let(SerializerRegistryInterface $serializerRegistry)
    {
        $this->beConstructedWith($serializerRegistry);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\VCS\WebhookStrategy\GithubWebhookStrategy');
    }

    function it_extends_abstract_webhook_strategy()
    {
        $this->shouldHaveType('Kreta\Component\VCS\WebhookStrategy\Abstracts\AbstractWebhookStrategy');
    }

    function it_gets_serializer_for_event(
        SerializerRegistryInterface $serializerRegistry,
        Request $request,
        SerializerInterface $serializer
    ) {
        $request->headers = new HeaderBag(['X-Github-Event' => 'push']);

        $serializerRegistry->getSerializer('github', 'push')->shouldBeCalled()->willReturn($serializer);
        $this->getSerializer($request);
    }
}
