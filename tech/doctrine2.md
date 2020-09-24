```php

// IDENTITY param on select permit to get a specific foreign key of the requested table
$query = $this->entityManager
    ->createQueryBuilder()
    ->select('IDENTITY(u.title)')
    ->from(User::class, 'u')
    ->getQuery();
$result = $query->getArrayResult();
return $result;

//  The setHint option permit to get all the foreign keys of the requested table
$query = $this->entityManager
    ->createQueryBuilder()
    ->select('c.company, IDENTITY(c.iduser)')
    ->from(Company::class, 'c')
    ->getQuery()
    ->setHint(\Doctrine\ORM\Query::HINT_INCLUDE_META_COLUMNS, true);
$result = $query->getArrayResult();
return $result;

// Retrieve only some fields of a table. Result will be a flat array
$query = $this->entityManager
    ->createQueryBuilder()
    ->select('partial u.{iduser, name}')
    ->from(User::class, 'u')
    ->getQuery();
$result = $query->getArrayResult();
return $result;

// Use a dql request without using QueryBuilder
$dql = "SELECT (:selection) FROM case";
$result = $em->createQuery($dql)
   ->setParameter('selection', $selection)
   ->getSingleResult();

// Complex joined request from ANOTHER table
$query = $this->entityManager
    ->createQueryBuilder()
    ->select('c.name, u.user')
    ->from(Company::class, 'c')
    ->leftJoin('c.user', 'u')
    ->where('u.id IN (:userIds)')
    ->andWhere('c.id IN (:companyIds)')
    ->setParameters([
        'userIds' => $userIds,
        'companyIds' => $companyIds,
    ]);
$result = $query->getQuery();
return $result->getScalarResult();

// Get every fileds on a repository of his linked table
$query = $this->entityManager
    ->createQueryBuilder('c')
    ->getQuery();
return $query->getArrayResult();


// To test
return $this->entityManager
  ->getRepository(CaseMedicalImage::class)
  ->findOneBy([$field => $id]);

// Apply it on a query from the QueryBuilder to disable auto array cache
$query->useResultCache(true);
$query->useQueryCache(true);

// Clear the entity manager cache
$this->entityManager->clear();

// Update Doctrine 2 object
$export = $exportRepo->find($idExport);
if ($export) {
    $export->setStatus(EXPORT_STATUS_DONE)
        ->setDatedone(new \DateTime('now'))
        ->setPath('path')
        ->setFile('file');
    $exportRepo->save($export);
}
