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

namespace Kreta\Component\VCS\Serializer\Registry\Interfaces;

use Kreta\Component\VCS\Serializer\Interfaces\SerializerInterface;

/**
 * Interface SerializerRegistryInterface.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
interface SerializerRegistryInterface
{
    /**
     * Returns all the serializers for the given provider.
     *
     * @param string $provider For example GitHub
     *
     * @return array with events as keys
     */
    public function getSerializers($provider);

    /**
     * Adds the given serializer to serializer array.
     *
     * @param string                                                         $provider   Provider name. e.g. 'github'
     * @param string                                                         $event      Event name. e.g. 'push'
     * @param \Kreta\Component\VCS\Serializer\Interfaces\SerializerInterface $serializer Serializer that parses event
     *
     * @throws \Kreta\Component\VCS\Serializer\Registry\ExistingSerializerException if serializers already exists
     */
    public function registerSerializer($provider, $event, SerializerInterface $serializer);

    /**
     * Deletes the serializer from the array for the given parameters.
     *
     * @param string $provider Name of the provider. For example 'github'
     * @param string $event    Name of the event. Fore example 'push'
     *
     * @throws \Kreta\Component\VCS\Serializer\Registry\NonExistingSerializerException if serializers does not exist
     */
    public function unregisterSerializer($provider, $event);

    /**
     * Checks if the serializer for the given parameter exists in the array.
     *
     * @param string $provider Name of the provider. For example 'github'
     * @param string $event    Name of the event. Fore example 'push'
     *
     * @return bool
     */
    public function hasSerializer($provider, $event);

    /**
     * Gets the serializer for the given parameters.
     *
     * @param string $provider Name of the provider. For example 'github'
     * @param string $event    Name of the event. Fore example 'push'
     *
     * @throws \Kreta\Component\VCS\Serializer\Registry\NonExistingSerializerException if serializers does not exist
     *
     * @return \Kreta\Component\VCS\Serializer\Interfaces\SerializerInterface
     */
    public function getSerializer($provider, $event);
}
