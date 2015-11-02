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

namespace Kreta\Component\VCS\Factory;

use Kreta\Component\VCS\Model\Interfaces\BranchInterface;

/**
 * Class CommitFactory.
 */
class CommitFactory
{
    /**
     * The class name.
     *
     * @var string
     */
    protected $className;

    /**
     * Constructor.
     *
     * @param string $className The class name
     */
    public function __construct($className)
    {
        $this->className = $className;
    }

    /**
     * Creates a Commit object with the given response by the VCS provider.
     *
     * @param string                                                $sha     The sha
     * @param string                                                $message The message
     * @param \Kreta\Component\VCS\Model\Interfaces\BranchInterface $branch  The branch
     * @param string                                                $author  the author
     * @param string                                                $url     The url
     *
     * @return \Kreta\Component\VCS\Model\Interfaces\CommitInterface
     */
    public function create($sha, $message, BranchInterface $branch, $author, $url)
    {
        $commit = new $this->className();

        return $commit
            ->setSHA($sha)
            ->setMessage($message)
            ->setBranch($branch)
            ->setAuthor($author)
            ->setUrl($url);
    }
}
