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
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
interface SerializerInterface
{
    /**
     * Transforms json message received into a object.
     *
     * @param string $json Raw message received in json format
     *
     * @return object
     */
    public function deserialize($json);
}
