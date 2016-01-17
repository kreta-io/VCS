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

use Kreta\Component\VCS\Event\NewCommitEvent;
use Kreta\Component\VCS\Matcher\CommitMatcher;
use Kreta\Component\VCS\Repository\CommitRepository;

/**
 * Class CommitListener.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class CommitListener
{
    /**
     * The commit matcher.
     *
     * @var \Kreta\Component\VCS\Matcher\CommitMatcher
     */
    protected $matcher;

    /**
     * The commit repository.
     *
     * @var \Kreta\Component\VCS\Repository\CommitRepository
     */
    protected $repository;

    /**
     * Constructor.
     *
     * @param \Kreta\Component\VCS\Matcher\CommitMatcher       $matcher          The commit matcher
     * @param \Kreta\Component\VCS\Repository\CommitRepository $commitRepository The commit repository
     */
    public function __construct(CommitMatcher $matcher, CommitRepository $commitRepository)
    {
        $this->matcher = $matcher;
        $this->repository = $commitRepository;
    }

    /**
     * Fills the commit with related issues matched by CommitMatcher.
     *
     * @param \Kreta\Component\VCS\Event\NewCommitEvent $event The new commit event
     */
    public function newCommit(NewCommitEvent $event)
    {
        $commit = $event->getCommit();

        $related = $this->matcher->getRelatedIssues($commit);
        $commit->setIssuesRelated($related);

        $this->repository->persist($commit);
    }
}
