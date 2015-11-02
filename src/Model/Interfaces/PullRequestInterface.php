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
 * Interface PullRequestInterface.
 */
interface PullRequestInterface
{
    /**
     * Gets id.
     *
     * @return string
     */
    public function getId();

    /**
     * Gets the number given to the pull request by the provider.
     *
     * @return int
     */
    public function getNumber();

    /**
     * Sets the number given to the pull request by the provider.
     *
     * @param int $number The number
     *
     * @return $this self Object
     */
    public function setNumber($number);

    /**
     * Gets the title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Sets the title.
     *
     * @param string $title The title
     *
     * @return $this self Object
     */
    public function setTitle($title);

    /**
     * Gets the message.
     *
     * @return string
     */
    public function getMessage();

    /**
     * Sets the message.
     *
     * @param string $message The message
     *
     * @return $this self Object
     */
    public function setMessage($message);

    /**
     * Gets the author.
     *
     * @return string
     */
    public function getAuthor();

    /**
     * Sets the author.
     *
     * @param string $author The author
     *
     * @return $this self Object
     */
    public function setAuthor($author);

    /**
     * Gets issues related.
     *
     * @return \Kreta\Component\Issue\Model\Interfaces\IssueInterface[]
     */
    public function getIssuesRelated();
}
