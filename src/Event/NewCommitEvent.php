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

namespace Kreta\Component\VCS\Event;

use Kreta\Component\VCS\Model\Interfaces\CommitInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class NewCommitEvent.
 */
class NewCommitEvent extends Event
{
    const NAME = 'kreta_vcs.event.commit.new';

    /**
     * The commit.
     *
     * @var \Kreta\Component\VCS\Model\Interfaces\CommitInterface
     */
    protected $commit;

    /**
     * Constructor.
     *
     * @param \Kreta\Component\VCS\Model\Interfaces\CommitInterface $commit The commit
     */
    public function __construct(CommitInterface $commit)
    {
        $this->commit = $commit;
    }

    /**
     * Gets just created commit.
     *
     * @return \Kreta\Component\VCS\Model\Interfaces\CommitInterface
     */
    public function getCommit()
    {
        return $this->commit;
    }
}
