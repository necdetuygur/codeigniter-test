<?php
class Todo_model extends CI_Model {
	public function Get($id = 0){
		return $this->db->where("id", $id)->get("todo")->result();
	}
	public function GetAll(){
		return $this->db->get("todo")->result();
	}
	public function Set($name, $content, $id){
		return $this->db->where(array("id" => $id))->update("todo", array("name" => $name, "content" => $content));
	}
	public function Add($name, $content){
		return $this->db->insert("todo", array("name" => $name, "content" => $content));
	}
	public function Del($id){
		return $this->db->where(array("id" => $id))->delete("todo");
	}
}
