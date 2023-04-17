<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academicosarai_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function personas()
	{
		$this->load->database();
        $query=$this->db->query("select * from persona");
        return $query->result();
	}
	public function persona($CI)
	{
		$this->load->database();
        $query=$this->db->query("select * from persona where CI=$CI");
        return $query->result();
	}
	public function personaAdd($CI,$nombreCompleto,$fechaDeNacimiento,$telefono,$departamento){
		$this->load->database();
        $query=$this->db->query("insert into persona (CI,nombreCompleto,fechaDeNacimiento,telefono,departamento) 
		values ($CI,'$nombreCompleto','$fechaDeNacimiento','$telefono','$departamento')");
        return true;
	}
	public function personaMod($CI,$nombreCompleto,$fechaDeNacimiento,$telefono,$departamento){
		$this->load->database();
        $query=$this->db->query("update persona set CI=$CI ,nombreCompleto='$nombreCompleto',
		fechaDeNacimiento='$fechaDeNacimiento',telefono='$telefono',departamento='$departamento'
		where CI=$CI");
        return true;
	}
	public function personaDel($CI){
		$this->load->database();
        $query=$this->db->query("delete from persona where CI=$CI");
		return true;
	}
}
