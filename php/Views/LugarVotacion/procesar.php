<?php
include_once '../../Models/etc/controller.php';
include_once '../../Models/etc/savefiles.php';
$_POST = Consultas::limpiar($_POST);
$_Mesas = Cargar::cantmesa();
$_Voto = Cargar::cantvoto();

extract($_POST);

switch ($tipo){
    case 1:
		$totmesa=$_Mesas->fetch_assoc();

		$MesaTotal=$totmesa['total']+1;
        $query = Consultas::insert([
			'fields' => '(m_id,m_nombre,fk_lv_id)',
			'values' => "('$MesaTotal','$m_codigo','$id')",
			'table' => 'tb_mesa'
		]);
		header("Location: mesa.php?id=$id");

        break;
		case 2:
			$totvot = $_Voto->fetch_assoc();
			

			for ($i = 0, $l = count($v_cantidad), $values = []; $i < $l; $i++){
				$VotoTotal=$totvot['total']+$i+1;
				$values[] = "('$VotoTotal','$v_tipo','{$v_partido[$i]}', '{$v_cantidad[$i]}', $id)";
			}
        
			$query = Consultas::insert([
				'fields' => '(v_id,v_tipo_voto,v_partido_voto,v_cantidad_voto,fk_m_id)',
				'values' => implode(', ', $values),
				'table' => 'tb_votacion'
			]);
			header("Location: listavotos.php?id=$id");

			break;
   

}



?>