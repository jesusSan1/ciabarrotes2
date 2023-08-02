<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProducto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'null' => false,
            ],
            'codigo_barras' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'sku' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'fecha_caducidad' => [
                'type' => 'DATE',
            ],
            'existencia' => [
                'type' => 'INT',
            ],
            'existencia_minima' => [
                'type' => 'INT',
            ],
            'presentacion' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'precio_compra' => [
                'type' => 'DECIMAL',
                'constraint' => '7,3',
            ],
            'precio_venta' => [
                'type' => 'DECIMAL',
                'constraint' => '7,3',
            ],
            'precio_venta_mayoreo' => [
                'type' => 'DECIMAL',
                'constraint' => '7,3',
            ],
            'descuento_venta' => [
                'type' => 'DECIMAL',
                'constraint' => '7,3',
            ],
            'marca' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'modelo' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'proveedor_id' => [
                'type' => 'INT',
            ],
            'categoria_id' => [
                'type' => 'INT',
            ],
            'imagen' => [
                'type' => 'TEXT',
            ],
            'creado_por' => [
                'type' => 'INT',
            ],
            'fecha_creacion' => [
                'type' => 'DATE',
            ],
            'fecha_eliminado' => [
                'type' => 'DATE',
            ],
            'eliminado' => [
                'type' => 'BOOL',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('proveedor_id', 'proveedor', 'id');
        $this->forge->addForeignKey('categoria_id', 'categoria', 'id');
        $this->forge->addForeignKey('creado_por', 'usuarios', 'id');
        $this->forge->createTable('producto');
    }

    public function down()
    {
        $this->forge->dropTable('producto');
    }
}