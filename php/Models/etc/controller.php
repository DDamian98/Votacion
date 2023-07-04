<?php
include_once '../../Models/mysql/query.php';

class Cargar{

	//BUSCAR

	public static function buscar($options){
		return Consultas::select($options);
	}



	//USUARIOS

	public static function usuario($id){
		$results = Consultas::select([
			'fields' => '*',
			'table' => 'tbl_usuarios',
			'conditions' => "WHERE usu_id = $id"
		]);
		return $results->num_rows ? $results->fetch_assoc() : null;
	}	


	public static function lugarvotacion(){
		$query = 'SELECT * FROM tb_lugarvotacion';
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}
	public static function lugarid($id){
		$query = "SELECT * FROM tb_lugarvotacion WHERE lv_id = $id";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}

	public static function partidos(){
		$query = 'SELECT * FROM tb_partido order by id asc';
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}

	public static function mesas($id){
		$query = "SELECT lv.lv_distrito as Distrito ,m_id,m_nombre as Codigo FROM tb_mesa INNER JOIN tb_lugarvotacion AS lv ON 
		lv.lv_id = fk_lv_id WHERE fk_lv_id =$id";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}

	public static function mesass($id){
		$query = "SELECT lv.lv_distrito as Distrito ,m_id,m_nombre as Codigo FROM tb_mesa INNER JOIN tb_lugarvotacion AS lv ON 
		lv.lv_id = fk_lv_id WHERE m_id =$id";
		$results = Consultas::consulta($query);
		$mesas = [];

		if ($results->num_rows){
			while ($rows = $results->fetch_assoc()){
				$mesas[] = [
					'Distrito' => $rows['Distrito'],
					'm_id' => $rows['m_id'],
					'Codigo' => $rows['Codigo']
				];
			}
		}
		
		return $mesas;
	}

	public static function mesasvoto($id){
		$query = "SELECT v_tipo_voto AS Tipo, v_partido_voto AS partido, SUM(v_cantidad_voto) AS Cantidad FROM tb_votacion
		WHERE fk_m_id = $id GROUP BY v_partido_voto ORDER BY Cantidad DESC ";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}

	public static function listvotacion($id){
		$query = "SELECT * FROM tb_votacion WHERE fk_m_id = $id ORDER BY v_tipo_voto asc";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}

	public static function reporttotal($tipo){
		$query = "SELECT v_tipo_voto AS Tipo, SUM(v_cantidad_voto) AS Cantidad 
		FROM tb_votacion WHERE v_tipo_voto='$tipo' GROUP BY v_tipo_voto";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}

	public static function reporttipo($tipo){
		$query = "SELECT v_tipo_voto AS Tipo, v_partido_voto AS partido, SUM(v_cantidad_voto) AS Cantidad FROM tb_votacion
		WHERE v_tipo_voto ='$tipo' GROUP BY v_partido_voto ORDER BY Cantidad DESC";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}

	public static function reportganador($tipo){
		$query = "SELECT v_tipo_voto AS Tipo, v_partido_voto AS partido, MAX(p.logo) AS Logo , SUM(v_cantidad_voto) AS Cantidad FROM tb_votacion INNER JOIN
		tb_partido AS p ON p.nombre = v_partido_voto WHERE v_tipo_voto ='$tipo' GROUP BY v_partido_voto ORDER BY Cantidad DESC LIMIT 1";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}

	public static function votototalmesa($id){
		$query = "SELECT SUM(v_cantidad_voto) AS Cantidad FROM tb_votacion WHERE fk_m_id = $id";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}
	public static function votototalmesacategoria($id,$categoria){
		$query = "SELECT SUM(v_cantidad_voto) AS Cantidad FROM tb_votacion WHERE fk_m_id = $id AND v_tipo_voto ='$categoria'";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}

	public static function cantmesa(){
		$query = "SELECT COUNT(*) AS total From tb_mesa";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}

	public static function cantvoto(){
		$query = "SELECT COUNT(*) AS total From tb_votacion";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}
	public static function cantpartido(){
		$query = "SELECT COUNT(*) AS total From tb_partido";
		$results = Consultas::consulta($query);
		return $results->num_rows ? $results : null;
	}



	

	public static function tildes($text){
		return str_replace(['Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú', 'Ñ', 'ñ', 'Ü', 'ü'], 
						   ['A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u', 'N', 'n', 'U', 'u'], 
						   $text);
	}

	public static function noNull($data){
		return array_map(function($val){
			if (is_null($val)) return '';
			else $val;
		}, $data);
	}


	public static function check($table){
		$results = Consultas::select([
			'fields' => '*',
			'table' => $table
		]);
		return $results->num_rows ? 'show' : 'hide';
	}



}
?>