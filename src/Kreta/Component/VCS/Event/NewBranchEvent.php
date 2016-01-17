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

use Kreta\Component\VCS\Model\Interfaces\BranchInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class NewBranchEvent.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class NewBranchEvent extends Event
{
    const NAME = 'kreta_vcs.event.branch.new';

    /**
     * The branch.
     *
     * @var \Kreta\Component\VCS\Model\Interfaces\BranchInterface
     */
    protected $branch;

    /**
     * Constructor.
     *
     * @param \Kreta\Component\VCS\Model\Interfaces\BranchInterface $branch The branch
     */
    public function __construct(BranchInterface $branch)
    {
        $this->branch = $branch;
    }

    /**
     * Gets just created branch.
     *
     * @return \Kreta\Component\VCS\Model\Interfaces\BranchInterface
     */
    public function getBranch()
    {
        return $this->branch;
    }
}
