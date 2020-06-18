<?php

#include "C:/xampp/htdocs/calendar/formclass.php";
class api{
	public $table='accs';
	public function get_pdo(){
        if (empty($this->_pdo)){
            $this->_pdo = new PDO('mysql:host=localhost;dbname=test','root',''); 
        }
        return $this->_pdo;
    }
	 public function alljson(){
	 	$data = array();
	    $sql = $this->get_pdo()->prepare('SELECT * FROM `'.$this->table.'`;');
	    $sql->execute();
	    while ($object = $sql->fetchObject(static::class)){
				 $data[] = $object; 
			}
		echo json_encode($data); 
	}
    public function balancejf($bal){
	    $data = array();
		if($bal==1){
			$sql = $this->get_pdo()->prepare('SELECT * FROM `'.$this->table.'` WHERE `balance`>=0;');
			$sql->execute();
		}
		if($bal==0){
			$sql = $this->get_pdo()->prepare('SELECT * FROM `'.$this->table.'` WHERE `balance`<=0;');
			$sql->execute();
		}
    while ($object = $sql->fetchObject(static::class)){
   		  $data[] = $object; 
		}
		echo json_encode($data); 
	}
	public function getjs_by_id($id){
	    $data = array();
		$sql = $this->get_pdo()->prepare('SELECT * FROM `'.$this->table.'` WHERE `id` ='.$id.';');
		$sql->execute();
	    while ($object = $sql->fetchObject(static::class)){
	   		  $data[] = $object; 
			}
			echo json_encode($data); 
		}
	public function deljs_by_id($id){
		$sql = $this->get_pdo()->prepare('DELETE FROM `'.$this->table.'`WHERE `id`='.$id.';');
		$sql->execute();
		echo "OK";
	}
	public function jssave($num,$acc,$bal){
           	$sql = $this->get_pdo()->prepare('INSERT INTO `'.$this->table.'` (`number`,`account`,`balance`) VALUES (?,?,?);');
            $sql->execute(array($num,$acc,$bal));
            return $sql->rowCount() === 1;
    }

    public function jsupd($id, $num, $acc, $bal){
            $sql = $this->get_pdo()->prepare('UPDATE `'.$this->table.'` set `number`=?, `account`=?, `balance`=? WHERE `id`=? limit 1;');
            $sql->execute(array($num,$acc,$bal,$id));
    }
}



