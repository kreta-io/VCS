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

namespace Kreta\Component\VCS\Gateway\Interfaces;

use Kreta\Component\VCS\Model\Interfaces\BranchInterface;
use Kreta\Component\VCS\Model\Interfaces\PullRequestInterface;

/**
 * Interface GatewayInterface.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
interface GatewayInterface
{
    /**
     * Creates a branch in the VCS provider.
     *
     * @param \Kreta\Component\VCS\Model\Interfaces\BranchInterface $branch The branch
     *
     * @return mixed
     */
    public function createBranch(BranchInterface $branch);

    /**
     * Creates a pull request in the VCS provider.
     *
     * @param \Kreta\Component\VCS\Model\Interfaces\PullRequestInterface $pullRequest The pull request
     *
     * @return mixed
     */
    public function createPullRequest(PullRequestInterface $pullRequest);
}
