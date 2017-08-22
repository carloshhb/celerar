<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Last_view extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field([
            'userid' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ],
            'proid' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ],
            'last_view' => [
                'type' => "datetime",
                'null' => false
            ],
        ]);

        $this->dbforge->add_key("userid");
        $this->dbforge->add_key("proid");

        $this->dbforge->create_table('last_view');
    }

    public function down()
    {
        $this->dbforge->drop_table('last_view');
    }
}