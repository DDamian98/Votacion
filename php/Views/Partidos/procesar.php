<?php
include_once '../../Models/etc/controller.php';
include_once '../../Models/etc/savefiles.php';

$_POST = Consultas::limpiar($_POST);
$_Partido = Cargar::cantpartido();
extract($_POST);

switch ($tipo){
    case 1:
        if ($_FILES){
			$response = Files::upload($_FILES);
			$foto = isset($response['names']['logo']) ? $response['names']['logo'] : '';
		}
		else{
			$foto = 'No_data';
		}
		$totPartido = $_Partido->fetch_assoc();
		$TotalPartido = $totPartido['total']+1;
        $query = Consultas::insert([
			'fields' => '(id,nombre,logo)',
			'values' => "('$TotalPartido','$p_nombre','$foto')",
			'table' => 'tb_partido'
		]);

        break;
   

}

header("Location: index.php");

?>