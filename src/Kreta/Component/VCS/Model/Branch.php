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
use Kreta\Component\VCS\Model\Interfaces\RepositoryInterface;

/**
 * Class Branch.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class Branch implements BranchInterface
{
    /**
     * The id.
     *
     * @var string
     */
    protected $id;

    /**
     * The name.
     *
     * @var string
     */
    protected $name;

    /**
     * The repository.
     *
     * @var \Kreta\Component\VCS\Model\Interfaces\RepositoryInterface
     */
    protected $repository;

    /**
     * Collection of issues related.
     *
     * @var \Kreta\Component\Issue\Model\Interfaces\IssueInterface[]
     */
    protected $issuesRelated;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * {@inheritdoc}
     */
    public function setRepository(RepositoryInterface $repository)
    {
        $this->repository = $repository;

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
    public function getUrl()
    {
        switch ($this->repository->getProvider()) {
            case 'github':
                return 'https://github.com/' . $this->repository->getName() . '/tree/' . $this->name;
            default:
                return '';
        }
    }
}
