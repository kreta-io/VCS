<?php

/**
 * This file belongs to Kreta.
 * The source code of application includes a LICENSE file
 * with all information about license.
 *
 * @author benatespina <benatespina@gmail.com>
 * @author gorkalaucirica <gorka.lauzirika@gmail.com>
 */

namespace Kreta\Component\VCS\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class CommitRepository.
 *
 * @package Kreta\Component\VCS\Repository
 */
class CommitRepository extends EntityRepository
{
    public function findByIssue($issueId)
    {
        $queryBuilder = $this->createQueryBuilder('c');
        $queryBuilder->innerJoin('c.issuesRelated', 'ri', 'WITH', 'ri.id = :issueId')
            ->setParameter('issueId', $issueId);

        return $queryBuilder->getQuery()->getResult();
    }
}
