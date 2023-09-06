<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'producto';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id', 'codigo_barras', 'sku', 'nombre', 'fecha_caducidad', 'existencia', 'existencia_minima', 'presentacion', 'precio_compra', 'precio_venta', 'precio_venta_mayoreo', 'descuento_venta', 'marca', 'modelo', 'proveedor_id', 'categoria_id', 'imagen', 'creado_por', 'fecha_creacion', 'fecha_eliminado', 'eliminado', 'tiene_caducidad'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function productosExistenciaMinima()
    {
        $db = db_connect();
        return $db->query("select p.id
,p.imagen
,p.nombre
,p.existencia
,p.existencia_minima
,CASE
 when p.existencia = p.existencia_minima then 1
 when p.existencia between 1 and p.existencia_minima then 2
 when p.existencia = 0 then 3
end as estatus
from producto p
where p.existencia <= p.existencia_minima and p.eliminado = 0")->getResult();
    }

    public function productosCaducados()
    {
        $db = db_connect();
        return $db->query("select p.id
,p.imagen
,p.nombre
,p.eliminado,
p.existencia
,fecha_caducidad
,if(datediff(fecha_caducidad, curdate()) <= 0,
		0,
		datediff(fecha_caducidad, curdate())
) as dias
,case
	when datediff(fecha_caducidad, curdate()) <= 0 then 1 -- 1
	when datediff(fecha_caducidad, curdate()) between 5 and 10 then 2 -- 2
	when datediff(fecha_caducidad, curdate()) between 1 and 4 then 3 -- 3
end
as estatus
from producto p
where p.existencia > 0
and datediff(fecha_caducidad, curdate()) <= 10
and p.eliminado = 0")->getResult();
    }
}
