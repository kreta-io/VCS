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

namespace Kreta\Component\VCS\WebhookStrategy\Abstracts;

use Kreta\Component\VCS\Serializer\Registry\Interfaces\SerializerRegistryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Abstract class WebhookStrategyInterface.
 */
abstract class AbstractWebhookStrategy
{
    /**
     * The serializer registry.
     *
     * @var \Kreta\Component\VCS\Serializer\Registry\Interfaces\SerializerRegistryInterface
     */
    protected $serializerRegistry;

    /**
     * Constructor.
     *
     * @param SerializerRegistryInterface $serializerRegistry Serializer
     */
    public function __construct(SerializerRegistryInterface $serializerRegistry)
    {
        $this->serializerRegistry = $serializerRegistry;
    }

    /**
     * Decides which serializer should be used for the given request and returns it.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request The request done by the webhook
     *
     * @abstract
     */
    abstract public function getSerializer(Request $request);
}
