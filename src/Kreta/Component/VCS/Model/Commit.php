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

namespace Kreta\Component\VCS\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Kreta\Component\VCS\Model\Interfaces\BranchInterface;
use Kreta\Component\VCS\Model\Interfaces\CommitInterface;

/**
 * Class Commit.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class Commit implements CommitInterface
{
    /**
     * The id.
     *
     * @var string
     */
    protected $id;

    /**
     * The author.
     *
     * @var string
     */
    protected $author;

    /**
     * The branch.
     *
     * @var \Kreta\Component\VCS\Model\Interfaces\BranchInterface
     */
    protected $branch;

    /**
     * Collection of issues related.
     *
     * @var \Kreta\Component\Issue\Model\Interfaces\IssueInterface[]
     */
    protected $issuesRelated;

    /**
     * The message.
     *
     * @var string
     */
    protected $message;

    /**
     * The sha.
     *
     * @var string
     */
    protected $sha;

    /**
     * The url.
     *
     * @var string
     */
    protected $url;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->issuesRelated = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * {@inheritdoc}
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * {@inheritdoc}
     */
    public function setBranch(BranchInterface $branch)
    {
        $this->branch = $branch;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIssuesRelated()
    {
        return $this->issuesRelated;
    }

    /**
     * {@inheritdoc}
     */
    public function setIssuesRelated($issuesRelated)
    {
        $this->issuesRelated = $issuesRelated;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSha()
    {
        return $this->sha;
    }

    /**
     * {@inheritdoc}
     */
    public function setSha($sha)
    {
        $this->sha = $sha;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
}
