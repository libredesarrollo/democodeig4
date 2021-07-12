<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPeopleAddImage extends Migration
{
	public function up()
	{
		$fields = [
				'image' => [
					'type' => 'VARCHAR',
					'constraint' => '255'
				]
			];

			$this->forge->addColumn('people',$fields);

	}

	public function down()
	{
		$this->forge->dropColumn('people','image');
	}
}