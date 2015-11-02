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

namespace Kreta\Component\VCS\EventListener;

use Kreta\Component\VCS\Event\NewBranchEvent;
use Kreta\Component\VCS\Matcher\BranchMatcher;
use Kreta\Component\VCS\Repository\BranchRepository;

/**
 * Class BranchListener.
 */
class BranchListener
{
    /**
     * The branch matcher.
     *
     * @var \Kreta\Component\VCS\Matcher\BranchMatcher
     */
    protected $matcher;

    /**
     * The branch repository.
     *
     * @var \Kreta\Component\VCS\Repository\BranchRepository
     */
    protected $repository;

    /**
     * Constructor.
     *
     * @param \Kreta\Component\VCS\Matcher\BranchMatcher       $matcher          The branch matcher
     * @param \Kreta\Component\VCS\Repository\BranchRepository $branchRepository The branch repository
     */
    public function __construct(BranchMatcher $matcher, BranchRepository $branchRepository)
    {
        $this->matcher = $matcher;
        $this->repository = $branchRepository;
    }

    /**
     * Fills the branch with related issues matched by BranchMatcher.
     *
     * @param \Kreta\Component\VCS\Event\NewBranchEvent $event The new branch event
     */
    public function newBranch(NewBranchEvent $event)
    {
        $branch = $event->getBranch();

        $related = $this->matcher->getRelatedIssues($branch);
        $branch->setIssuesRelated($related);

        $this->repository->persist($branch);
    }
}
