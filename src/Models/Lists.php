<?php

namespace Phucle\Assignment\Models;

use Phucle\Assignment\Commons\Model;

class Lists extends Model
{
    protected string $tableName = 'danhmuctintuc';

    public function paginate($page = 1, $perPage = 5)
    {
        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->where('kichHoat = 1')
            ->orderBy('idDanhMuc', 'desc')
            ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    public function findByidDanhMuc($id)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('idDanhMuc = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    public function update($id, array $data)
    {
        if (!empty($data)) {
            $query = $this->queryBuilder->update($this->tableName);

            $index = 0;

            foreach ($data as $key => $value) {
               
                $query->set($key, '?')->setParameter($index, $value);

                ++$index;
            }

            $query->where('idDanhMuc = ?')
                ->setParameter($index, $id)
                ->executeQuery();
            return true;
        }
        return false;
    }

    public function restore()
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('kichHoat = ?')
            ->setParameter(0, 0)
            ->orderBy('idDanhMuc', 'desc')
            ->fetchAllAssociative();
    }
}