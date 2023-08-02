<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'null' => false,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'apepat' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'apemat' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'genero' => [
                'type' => 'VARCHAR',
                'constraint' => '8',
            ],
            'usuario' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type' => 'TEXT',
            ],
            'correo' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'habilitado' => [
                'type' => 'bool',
            ],
            'foto_perfil' => [
                'type' => 'TEXT',
            ],
            'rol_id' => [
                'type' => 'INT',
            ],
            'fecha_creacion' => [
                'type' => 'DATE',
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'eliminado' => [
                'type' => 'BOOL',
            ],
            'fecha_eliminado' => [
                'type' => 'DATE',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('rol_id', 'roles', 'id');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}