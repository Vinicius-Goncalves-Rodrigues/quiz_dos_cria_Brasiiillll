<?php

class QuizModel{
    
    private $PDO;

    public function __construct($PDO){
        $this->PDO = $PDO;
    }
    
    public function criarPergunta($texto_pergunta, $resposta_correta, $opcao_1,$opcao_2,$opcao_3,$opcao_4){
        $sql = "INSERT INTO quiz(tipo,texto_pergunta, resposta_certa, opcao_1,opcao_2,opcao_3,opcao_4) VALUES ('pergunta',?,?,?,?,?,?)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute([$texto_pergunta, $resposta_correta, $opcao_1,$opcao_2,$opcao_3,$opcao_4]);
    }
    public function listarPerguntasId(){
        $sql = "SELECT id FROM quiz WHERE tipo = 'pergunta'";
        $stmt = $this->PDO->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listarPerguntaPorId($id){
        $sql = "SELECT * FROM quiz WHERE id = $id AND tipo = 'pergunta'";
        $stmt = $this->PDO->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    public function criarJogo($total_perguntas,$pergunta_atual_id,$pontuacao_time_1,$pontuacao_time_2,$perguntas_restantes){
        $sql = "INSERT INTO quiz(tipo,total_perguntas,pergunta_atual_id,pontuacao_time_1,pontuacao_time_2,perguntas_restantes) VALUES ('jogo',?,?,?,?,?)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute([$total_perguntas,$pergunta_atual_id,$pontuacao_time_1,$pontuacao_time_2,$perguntas_restantes]);
        $sql = "SELECT * FROM quiz WHERE tipo = 'jogo' ORDER BY id DESC";
        $stmt = $this->PDO->query($sql);
        $selected = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id = $selected[0]['id'];
        return $id;
    }
    public function atualizarJogo($id, $pergunta_atual_id, $pontuacao_time_1, $pontuacao_time_2, $perguntas_restantes){
        $sql = "UPDATE quiz SET pergunta_atual_id = ?, pontuacao_time_1 = ?, pontuacao_time_2 = ?, perguntas_restantes = ? WHERE id = ?";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute([$pergunta_atual_id, $pontuacao_time_1, $pontuacao_time_2, $perguntas_restantes, $id]);
    }
    public function listarJogoPorId($id){
        $sql = "SELECT * FROM quiz WHERE id = $id AND tipo = 'jogo'";
        $stmt = $this->PDO->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function criarResultado($vencedor, $pontuacao_final_time_1, $pontuacao_final_time_2){
        $sql = "INSERT INTO quiz(tipo,vencedor, pontuacao_final_time_1, pontuacao_final_time_2) VALUES ('resultado',?,?,?)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute([$vencedor,$pontuacao_final_time_1,$pontuacao_final_time_2]);
    }
    public function getLatestResultadoId(){
        $sql = "SELECT * FROM quiz WHERE tipo = 'resultado' ORDER BY id DESC";
        $stmt = $this->PDO->query($sql);
        $selected = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id = $selected[0]['id'];
        return $id;
    }
    public function listarResultadoPorId($id){
        $sql = "SELECT * FROM quiz WHERE id = $id AND tipo = 'resultado'";
        $stmt = $this->PDO->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}