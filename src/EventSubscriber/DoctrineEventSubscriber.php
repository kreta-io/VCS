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

namespace Kreta\Component\VCS\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Kreta\Component\VCS\Event\NewBranchEvent;
use Kreta\Component\VCS\Event\NewCommitEvent;
use Kreta\Component\VCS\Model\Interfaces\BranchInterface;
use Kreta\Component\VCS\Model\Interfaces\CommitInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class DoctrineEventSubscriber.
 */
class DoctrineEventSubscriber implements EventSubscriber
{
    /**
     * The event dispatcher.
     *
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * Constructor.
     *
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $dispatcher The event dispatcher
     */
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubscribedEvents()
    {
        return [Events::postPersist];
    }

    /**
     * Handles postPersist event triggered by doctrine.
     *
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args The arguments
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        if ($args->getObject() instanceof CommitInterface) {
            $this->dispatcher->dispatch(NewCommitEvent::NAME, new NewCommitEvent($args->getObject()));
        } elseif ($args->getObject() instanceof BranchInterface) {
            $this->dispatcher->dispatch(NewBranchEvent::NAME, new NewBranchEvent($args->getObject()));
        }
    }
}
