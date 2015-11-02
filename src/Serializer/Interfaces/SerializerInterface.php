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

namespace Kreta\Component\VCS\Serializer\Interfaces;

/**
 * Interface SerializerInterface.
 */
interface SerializerInterface
{
    /**
     * Transforms json message received into a object.
     *
     * @param string $json Raw message received in json format
     *
     * @return Object
     */
    public function deserialize($json);
}
