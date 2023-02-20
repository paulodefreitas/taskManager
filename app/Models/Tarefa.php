<?php

class Tarefa
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function lerTarefas()
    {
        //consulta com associações de tabelas
        //INNER JOIN permite usar um operador de comparação para comparar os valores
        //de colunas provenientes de tabelas associadas.
        $this->db->query("SELECT *,
        tarefas.id as tarefaId,
        tarefas.criado_em as tarefaDataCadastro,
        usuarios.id as usuarioId,
        usuarios.criado_em as usuarioDataCadastro
         FROM tarefas
         INNER JOIN usuarios ON
         tarefas.usuario_id = usuarios.id
         ORDER BY tarefas.id DESC
         ");
        return $this->db->resultados();
    }

    public function armazenar($dados)
    {
        $this
            ->db->query("INSERT INTO tarefas(usuario_id, tarefa, prioridade, estado, texto) 
        VALUES (:usuario_id, :tarefa, :prioridade, :estado, :texto)");

        $this->db->bind("usuario_id", $dados["usuario_id"]);
        $this->db->bind("tarefa", $dados["tarefa"]);
        $this->db->bind("prioridade", $dados["prioridade"]);
        $this->db->bind("estado", $dados["estado"]);
        $this->db->bind("texto", $dados["texto"]);

        if ($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }

    //atualiza a tarefa no banco de dados
    public function atualizar($dados)
    {
        $this->db->query("UPDATE tarefas SET tarefa = :tarefa, prioridade = :prioridade,
        estado = :estado, texto = :texto 
        WHERE id = :id");

        $this->db->bind("id", $dados["id"]);
        $this->db->bind("tarefa", $dados["tarefa"]);
        $this->db->bind("prioridade", $dados["prioridade"]);
        $this->db->bind("estado", $dados["estado"]);
        $this->db->bind("texto", $dados["texto"]);

        if ($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }

    //lê a tarefa no banco de dados por seu ID
    public function lerTarefaPorId($id)
    {
        $this->db->query("SELECT * FROM tarefas WHERE id = :id");
        $this->db->bind("id", $id);

        return $this->db->resultado();
    }

    //deleta a tarefa no banco de dados por seu ID
    public function destruir($id)
    {
        $this->db->query("DELETE FROM tarefas  WHERE id = :id");
        $this->db->bind("id", $id);

        if ($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }
}
