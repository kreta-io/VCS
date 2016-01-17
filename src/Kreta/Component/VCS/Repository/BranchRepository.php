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

use Doctrine\ORM\NoResultException;
use Kreta\Component\Core\Repository\EntityRepository;
use Kreta\Component\VCS\Model\Branch;
use Kreta\Component\VCS\Model\Interfaces\RepositoryInterface;

/**
 * Class BranchRepository.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class BranchRepository extends EntityRepository
{
    /**
     * Tries to find a branch by repository and branch name and throws exception if is not able to do so.
     *
     * @param \Kreta\Component\VCS\Model\Interfaces\RepositoryInterface $repository The repository
     * @param string                                                    $branchName The branch name
     *
     * @return \Kreta\Component\VCS\Model\Interfaces\BranchInterface
     */
    public function findOrCreateBranch(RepositoryInterface $repository, $branchName)
    {
        try {
            return $this->findOneBy(['name' => $branchName, 'repository' => $repository], false);
        } catch (NoResultException $e) {
            $branch = new Branch();
            $branch
                ->setName($branchName)
                ->setRepository($repository);

            $this->persist($branch);

            return $branch;
        }
    }

    /**
     * Finds all the branches of issue id given.
     *
     * @param string $issueId The issue id
     *
     * @return \Kreta\Component\VCS\Model\Interfaces\BranchInterface[]
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
            ->addSelect(['ir', 'r'])
            ->innerJoin('b.issuesRelated', 'ir')
            ->innerJoin('b.repository', 'r');
    }

    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'b';
    }
}
