<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller {
	public function index() {
		$this->load->view('form');
	}
	public function add() {
		$this->load->model('todo_model');
		$name = $this->input->post("name");
		$content = $this->input->post("content");
		if($name){
			echo $this->todo_model->Add($name, $content) ? "Başarılı" : "Hatalı";
		}
	}
	public function delete() {
		$this->load->model('todo_model');
		$id = $this->input->post("id");
		if($id){
			echo $this->todo_model->Del($id) ? "Başarılı" : "Hatalı";
		}
	}
	public function update() {
		$this->load->model('todo_model');
		$id = $this->input->post("id");
		$name = $this->input->post("name");
		$content = $this->input->post("content");
		if($id){
			echo $this->todo_model->Set($name, $content, $id) ? "Başarılı" : "Hatalı";
		}
	}
	public function get() {
		$this->load->model('todo_model');
		header("content-type: application/json; charset=utf-8");
		echo json_encode((array)$this->todo_model->GetAll());
	}
}
