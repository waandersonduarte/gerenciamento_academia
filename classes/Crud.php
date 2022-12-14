<?php

require 'DB.php';

abstract class Crud extends DB{

	protected $table;

	abstract public function salvar();
//	abstract public function update($id);

	public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function findAll(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}
        
        public function listar(){
		$sqllistar  = "SELECT * FROM $this->table";
		$stmtlistar = DB::prepare($sqllistar);
		$stmtlistar->execute();
		return $stmtlistar->fetchAll(PDO::FETCH_ASSOC);
	}
       
}