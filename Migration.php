<?php

namespace denis303\codeigniter4;

abstract class Migration extends \CodeIgniter\Database\Migration
{

    public function tableOptions(array $return = [])
    {
        $collate = ;

        $driver = $this->forge->getConnection()->getPlatform();

        switch($driver)
        {
            case 'MySQLi':
                return array_merge([
                    'ENGINE' => 'InnoDb',
                    'CHARACTER SET' => $this->db->charset ? $this->db->charset : 'utf8',
                    'COLLATE' => $this->db->DBCollat ? $this->db->DBCollat : 'utf8_general_ci'
                ], $return);
        }

        return $return;
    }

}