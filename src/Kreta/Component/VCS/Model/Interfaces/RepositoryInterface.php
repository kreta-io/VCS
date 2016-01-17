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

use Kreta\Component\Project\Model\Interfaces\ProjectInterface;

/**
 * Interface RepositoryInterface.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
interface RepositoryInterface
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
     * @param string $name
     *
     * @return $this self Object
     */
    public function setName($name);

    /**
     * Gets projects associated to the repository.
     *
     * @return \Kreta\Component\Project\Model\Interfaces\ProjectInterface[]
     */
    public function getProjects();

    /**
     * Adds project to repository.
     *
     * @param \Kreta\Component\Project\Model\Interfaces\ProjectInterface $project The project
     *
     * @return $this self Object
     */
    public function addProject(ProjectInterface $project);

    /**
     * Removes association to project.
     *
     * @param \Kreta\Component\Project\Model\Interfaces\ProjectInterface $project The project
     *
     * @return $this self Object
     */
    public function removeProject(ProjectInterface $project);

    /**
     * Gets provider. For example 'github'.
     *
     * @return string
     */
    public function getProvider();

    /**
     * Sets provider.
     *
     * @param string $provider The provider
     *
     * @return $this self Object
     */
    public function setProvider($provider);

    /**
     * Gets the url that points to the repository in providers page.
     *
     * @return string
     */
    public function getUrl();

    /**
     * Set the url that points to the repository in providers page.
     *
     * @param string $url The url
     *
     * @return $this self Object
     */
    public function setUrl($url);
}
