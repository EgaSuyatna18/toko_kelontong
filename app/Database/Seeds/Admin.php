<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $password = password_hash('123', PASSWORD_DEFAULT);
        $this->db->query("INSERT INTO admin VALUES (1, 'Admin', 'admin', '$password')");
    }
}
