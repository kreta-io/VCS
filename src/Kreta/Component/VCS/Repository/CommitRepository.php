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

namespace Kreta\Component\VCS\Repository;

use Kreta\Component\Core\Repository\EntityRepository;

/**
 * Class CommitRepository.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class CommitRepository extends EntityRepository
{
    /**
     * Finds all the commits of issue id given.
     *
     * @param string $issueId The issue id
     *
     * @return \Kreta\Component\VCS\Model\Interfaces\CommitInterface[]
     */
    public function findByIssue($issueId)
    {
        return $this->findBy(['ir.id' => $issueId]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getQueryBuilder()
    {
        return parent::getQueryBuilder()
            ->addSelect(['b', 'ir'])
            ->innerJoin('c.branch', 'b')
            ->innerJoin('c.issuesRelated', 'ir');
    }

    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'c';
    }
}
