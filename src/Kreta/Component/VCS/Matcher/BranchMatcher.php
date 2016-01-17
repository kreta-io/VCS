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
use Kreta\Component\VCS\Model\Interfaces\BranchInterface;

/**
 * Class BranchMatcher.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class BranchMatcher extends AbstractMatcher
{
    /**
     * {@inheritdoc}
     */
    public function getRelatedIssues($branch)
    {
        if (!$branch instanceof BranchInterface) {
            return [];
        }

        return $this->findRelatedIssues($branch->getRepository(), $branch->getName());
    }
}
