<?php

namespace Phucle\Assignment\Commons;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

class Model
{
    protected Connection|null $conn;
    protected QueryBuilder $queryBuilder;
    protected string $tableName;

    public function __construct()
    {
        $connectionParams = [
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'driver' => $_ENV['DB_DRIVER'],
        ];

        $this->conn = DriverManager::getConnection($connectionParams);

        $this->queryBuilder = $this->conn->createQueryBuilder();
    }

    // CRUD
    public function all()
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)          
            ->orderBy('idNguoiDung	', 'desc')
            ->fetchAllAssociative();
    }

    public function count()
    {
        return $this->queryBuilder
            ->select("COUNT(*) as $this->tableName")
            ->from($this->tableName)
            ->fetchOne();
    }


    public function paginate($page = 1, $perPage = 3)
    {
        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->where('kichHoat = 1')
            ->orderBy('idNguoiDung	', 'desc')
            ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    public function findByidNguoiDung($idNguoiDung)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('idNguoiDung = ?')
            ->setParameter(0, $idNguoiDung)
            ->fetchAssociative();
    }

    public function insert(array $data)
    {
        
        if (!empty($data)) {
            $query = $this->queryBuilder->insert($this->tableName);
            $index = 0;
            foreach ($data as $key => $value) {
                $query->setValue($key, '?')->setParameter($index, $value);

                ++$index;
            }

            $query->executeQuery();

            return true;
        }

        return false;
    }

    public function update($idNguoiDung, array $data)
    {
        if (!empty($data)) {
            $query = $this->queryBuilder->update($this->tableName);

            $index = 0;

            foreach ($data as $key => $value) {
                $query->set($key, '?')->setParameter($index, $value);

                ++$index;
            }

            $query->where('idNguoiDung = ?')
                ->setParameter(count($data), $idNguoiDung)
                ->executeQuery();
            return true;
        }

        return false;
    }

    public function delete($idNguoiDung)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('idNguoiDung = ?')
            ->setParameter(0, $idNguoiDung)
            ->executeQuery();
    }


    public function __destruct()
    {
        $this->conn = null;
    }
}
