<?php
include "conexao.class.php";
class Main_class {
    private $tarefa, $data, $hora, $tarefaA, $dataA, $horaA;
    private $id_tarefa, $id_tarefa2;
    public function setTarefa($tarefa) { $this->tarefa = $tarefa; }
    public function getTarefa() { return $this->tarefa; }  
    public function setData($data) { $this->data = $data; }
    public function getData() { return $this->data; }  
    public function setHora($hora) { $this->hora = $hora; }
    public function getHora() { return $this->hora; }  
    public function setIdTarefa($id_tarefa) { $this->id_tarefa = $id_tarefa; }
    public function getId_Tarefa() { return $this->id_tarefa; }

    public function setIdTarefa2($id_tarefa2) { $this->id_tarefa2 = $id_tarefa2; }
    public function getIdTarefa2() { return $this->id_tarefa2; } 
    
    public function setTarefaA($tarefaA) { $this->tarefaA = $tarefaA; }
    public function getTarefaA() { return $this->tarefaA; }  
    public function setDataA($dataA) { $this->dataA = $dataA; }
    public function getDataA() { return $this->dataA; }  
    public function setHoraA($horaA) { $this->horaA = $horaA; }
    public function getHoraA() { return $this->horaA; } 

    function getIdTarefa($id) {
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "SELECT * FROM tarefa WHERE id_tarefa = :id";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            echo 'Erro ao buscar tarefa por ID: ' . $e->getMessage(); 
            return false;
        }   
    }

    function listaTarefa() {
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "SELECT * FROM tarefa";
        try {
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo 'Erro ao listar tarefa: ' . $e->getMessage(); 
        }   
    }
    function inserirTarefa(){
		$database = new Conexao();
		$db = $database->getConnection();
        $tarefa = $this->getTarefa();
        $data = $this->getData(); 
        $hora = $this->getHora();
		$sql = "INSERT INTO tarefa 
        (tarefa, data, hora) 
        VALUES 
        (:tarefa, :data, :hora)";
		try {
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':tarefa', $tarefa);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':hora', $hora);
			$stmt->execute();
			return true;
		} catch(PDOException $e) { 
			echo "Erro ao inserir tarefa: " . $e->getMessage();
			return false;
		}
	}

    function deletarTarefa(){
        $database = new Conexao(); 
        $db = $database->getConnection();
    
        try{
            $sql = "DELETE FROM tarefa WHERE id_tarefa = :id_tarefa";
            $stmt = $db->prepare($sql);
            
            $id_tarefa = $this->getIdTarefa2();
            
            $stmt->bindParam(':id_tarefa', $id_tarefa, PDO::PARAM_INT);
            
            $stmt->execute();
    
            return true;
        
        } catch(PDOException $e){
            echo "Erro ao deletar tarefa: " . $e->getMessage();
            return false;
        }
    }
    function update(){
        $database = new Conexao();
        $db = $database->getConnection();
        
        $id = $this->getId_Tarefa();
        $tarefa = $this->getTarefaA();
        $data = $this->getDataA();
        $hora = $this->getHoraA();
        
        $sql = "UPDATE tarefa SET tarefa=:tarefa, data=:data, hora=:hora WHERE id_tarefa=:id";
    
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':tarefa', $tarefa);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':hora', $hora);
            $stmt->execute();
            return true;
        } catch(PDOException $e) { 
            echo "Erro ao atualizar tarefa: " . $e->getMessage();
            return false;
        }
    }
}
?>

