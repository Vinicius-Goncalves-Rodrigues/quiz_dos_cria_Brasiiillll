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
    public function criarJogo($total_perguntas,$pergunta_atual_id,$pontuacao_time_1,$pontuacao_time_2,$perguntas_restantes){
        $sql = "INSERT INTO quiz(tipo,total_perguntas,pergunta_atual_id,pontuacao_time_1,pontuacao_time_2,perguntas_restantes) VALUES ('jogo',?,?,?,?,?)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute([$total_perguntas,$pergunta_atual_id,$pontuacao_time_1,$pontuacao_time_2,$perguntas_restantes]);
    }
    public function criarResultado($vencedor, $pontuacao_final_time_1, $pontuacao_final_time_2){
        $sql = "INSERT INTO quiz(tipo,vencedor, pontuacao_final_time_1, pontuacao_final_time_2) VALUES ('resultado',?,?,?)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute([$vencedor,$pontuacao_final_time_1,$pontuacao_final_time_2]);
    }

    public function listarPerguntas(){
        $sql = "SELECT * FROM quiz WHERE tipo = 'pergunta'";
        $stmt = $this->PDO->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}