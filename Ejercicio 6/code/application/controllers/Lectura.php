<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectura extends CI_Controller {

	public function index()
	{
		$datos["Nombre"]="Sarai";
		$datos["Apellido"]="Blanco";
		$this->load->model("Academicosarai_model");

		$filas = $this->Academicosarai_model->personas();
		$datos["filas"]=$filas;
		$this->load->view('view_lectura', $datos);
	}
	public function editar(){
		$datos["CI"]=$_POST["CI"];
		$datos["nombreCompleto"]=$_POST["nombreCompleto"];
		$datos["fechaDeNacimiento"]=$_POST["fechaDeNacimiento"];
		$datos["telefono"]=$_POST["telefono"];
		$datos["departamento"]=$_POST["departamento"];
		$this->load->model("Academicosarai_model");
		$this->Academicosarai_model->personaMod($datos["CI"],$datos["nombreCompleto"],$datos["fechaDeNacimiento"],$datos["telefono"],$datos["departamento"]);
		$this->load->view('view_modify');
	}
	public function modificar(){
		$CI=$_GET["CI"];
		$datos["CI"]=$CI;
		$this->load->model("Academicosarai_model");
		$filas2 = $this->Academicosarai_model->persona($CI);
		$datos["filas"]=$filas2;
		$this->load->view('view_modificar', $datos);
	}
	public function eliminar(){
		$CI=$_GET["CI"];
		$datos["CI"]=$CI;
		$this->load->model("Academicosarai_model");
		$this->Academicosarai_model->personaDel($CI);
		$this->load->view('view_delete', $datos);
	}
	public function agregar(){
		$this->load->model("Academicosarai_model");
		$this->load->view('view_agregar');
	}
	public function adicionar(){
		$datos["CI"]=$_POST["CI"];
		$datos["nombreCompleto"]=$_POST["nombreCompleto"];
		$datos["fechaDeNacimiento"]=$_POST["fechaDeNacimiento"];
		$datos["telefono"]=$_POST["telefono"];
		$datos["departamento"]=$_POST["departamento"];
		$this->load->model("Academicosarai_model");
		try{
			$nro = $this->Academicosarai_model->buscar($datos["CI"]);
		}catch(Exception $e){
			$nro=0;
		}
		if($nro == 0){
			$this->Academicosarai_model->personaAdd($datos["CI"],$datos["nombreCompleto"],$datos["fechaDeNacimiento"],$datos["telefono"],$datos["departamento"]);
			$this->load->view('view_insert', $datos);
		}else{
			$this->load->view('view_agregar');
		}
		
	}
}

