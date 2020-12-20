<?php namespace App\Database\Migrations;

class KomentarAlterFk extends \CodeIgniter\Database\Migration {

	public function up()
	{
		
		$this->forge->dropForeignKey('komentar','komentar_id_jasa_foreign');
		$this->forge->dropForeignKey('komentar','komentar_id_user_foreign');

		$this->forge->addColumn('komentar', [
    		'CONSTRAINT komentar_id_user_foreign FOREIGN KEY(id_user) REFERENCES user(id) ON DELETE NO ACTION ON UPDATE CASCADE',
		]);

		$this->forge->addColumn('komentar',[
			'CONSTRAINT komentar_id_jasa_foreign FOREIGN KEY(id_jasa) REFERENCES jasa(id) ON DELETE NO ACTION ON UPDATE CASCADE',
		]);
		
	}
	public function down()
	{
		$this->forge->addColumn('komentar', [
    		'CONSTRAINT komentar_id_user_foreign FOREIGN KEY(id_user) REFERENCES user(id)',
		]);

		$this->forge->addColumn('komentar',[
			'CONSTRAINT komentar_id_jasa_foreign FOREIGN KEY(id_jasa) REFERENCES jasa(id)',
		]);

	}
}