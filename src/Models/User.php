<?php

namespace Phucle\Assignment\Models;

use Phucle\Assignment\Commons\Helper;
use Phucle\Assignment\Commons\Model;

class User extends Model
{
    protected string $tableName = 'taikhoan';

    public function restore()
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('kichHoat = ?')
            ->setParameter(0, 0)
            ->orderBy('idNguoiDung	', 'desc')
            ->fetchAllAssociative();
    }

    public function findBytenDangNhap($tenDangNhap)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('tenDangNhap = ?')
            ->setParameter(0, $tenDangNhap)
            ->fetchAssociative();

    }

    public function findByidNguoiDung($id)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('idNguoiDung = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

}