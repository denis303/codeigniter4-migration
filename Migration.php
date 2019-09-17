<?php

namespace denis303\codeigniter4;

abstract class Migration extends \CodeIgniter\Database\Migration
{

    protected $charset = 'utf8';

    protected $collate = 'utf8_general_ci';

    public function tableOptions(array $return = [])
    {
        $driver = $this->forge->getConnection()->getPlatform();

        switch($driver)
        {
            case 'MySQLi':
                return array_merge([
                    'ENGINE' => 'InnoDb',
                    'CHARSET' => $this->db->charset ? $this->db->charset : $this->charset,
                    'COLLATE' => $this->db->DBCollat ? $this->db->DBCollat : $this->collate
                ], $return);
        }

        return $return;
    }

}