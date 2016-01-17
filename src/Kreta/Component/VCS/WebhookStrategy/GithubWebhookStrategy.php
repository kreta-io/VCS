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

namespace Kreta\Component\VCS\WebhookStrategy;

use Kreta\Component\VCS\WebhookStrategy\Abstracts\AbstractWebhookStrategy;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GithubWebhookStrategy.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class GithubWebhookStrategy extends AbstractWebhookStrategy
{
    /**
     * {@inheritdoc}
     */
    public function getSerializer(Request $request)
    {
        return $this->serializerRegistry->getSerializer('github', $request->headers->get('X-Github-Event'));
    }
}
