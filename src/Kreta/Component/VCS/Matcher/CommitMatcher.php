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

namespace Kreta\Component\VCS\Matcher;

use Kreta\Component\VCS\Matcher\Abstracts\AbstractMatcher;
use Kreta\Component\VCS\Model\Interfaces\CommitInterface;

/**
 * Class CommitMatcher.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class CommitMatcher extends AbstractMatcher
{
    /**
     * {@inheritdoc}
     */
    public function getRelatedIssues($commit)
    {
        if (!$commit instanceof CommitInterface || !$commit->getBranch()) {
            return [];
        }

        return array_merge(
            $this->findRelatedIssues($commit->getBranch()->getRepository(), $commit->getMessage()),
            $this->findRelatedIssues($commit->getBranch()->getRepository(), $commit->getBranch()->getName())
        );
    }
}
