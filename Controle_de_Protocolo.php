<?php
include 'conexao.php';

class Controle_de_Protocolo {
    public function cadastrarProtocolo($descricao, $data_abertura, $prazo, $contribuinte_id) {
        global $conn;
        $query = "INSERT INTO protocolos (descricao, data_abertura, prazo, contribuinte_id) 
                  VALUES (:descricao, :data_abertura, :prazo, :contribuinte_id)";
        
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':data_abertura', $data_abertura);
        $stmt->bindParam(':prazo', $prazo);
        $stmt->bindParam(':contribuinte_id', $contribuinte_id);

        try {
            $stmt->execute();
            echo "Protocolo cadastrado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar protocolo: " . $e->getMessage();
        }
    }

    
    public function atualizarProtocolo($id, $descricao, $data_abertura, $prazo, $contribuinte_id) {
        global $conn;
        $query = "UPDATE protocolos 
                  SET descricao = :descricao, data_abertura = :data_abertura, prazo = :prazo, 
                      contribuinte_id = :contribuinte_id 
                  WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':descricao', $descricao);
        

        try {
            $stmt->execute();
            echo "Protocolo atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar protocolo: " . $e->getMessage();
        }
    }

    public function excluirProtocolo($id) {
        global $conn;
        $query = "DELETE FROM protocolos WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            echo "Protocolo excluído com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao excluir protocolo: " . $e->getMessage();
        }
    }
}
?>
