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

namespace Kreta\Component\VCS\Model\Interfaces;

/**
 * Interface BranchInterface.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
interface BranchInterface
{
    /**
     * Gets id.
     *
     * @return string
     */
    public function getId();

    /**
     * Gets name.
     *
     * @return string
     */
    public function getName();

    /**
     * Sets name.
     *
     * @param string $name The name
     *
     * @return $this self Object
     */
    public function setName($name);

    /**
     * Gets repository.
     *
     * @return \Kreta\Component\VCS\Model\Interfaces\RepositoryInterface
     */
    public function getRepository();

    /**
     * Sets repository.
     *
     * @param \Kreta\Component\VCS\Model\Interfaces\RepositoryInterface $repository The repository
     *
     * @return $this self Object
     */
    public function setRepository(RepositoryInterface $repository);

    /**
     * Gets issues related.
     *
     * @return \Kreta\Component\Issue\Model\Interfaces\IssueInterface[]
     */
    public function getIssuesRelated();

    /**
     * Sets issues related.
     *
     * @param array $issuesRelated The issuesRelated to be set
     *
     * @return $this self Object
     */
    public function setIssuesRelated($issuesRelated);

    /**
     * Gets url pointing the branch in the providers page.
     *
     * @return string
     */
    public function getUrl();
}
