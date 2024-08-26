<?php
require_once __DIR__."../model/QuizModel.php";

class QuizController{
    private $quizModel;

    public function __construct($PDO){
        $this->quizModel = new QuizModel($PDO);
    }

    public function criarPergunta($texto_pergunta, $resposta_correta, $opcao_1,$opcao_2,$opcao_3,$opcao_4){
        $this->quizModel->criarPergunta($texto_pergunta, $resposta_correta, $opcao_1,$opcao_2,$opcao_3,$opcao_4);
    }
    public function criarJogo($total_perguntas,$pergunta_atual_id,$pontuacao_time_1,$pontuacao_time_2,$perguntas_restantes){
        $this->quizModel->criarJogo($total_perguntas,$pergunta_atual_id,$pontuacao_time_1,$pontuacao_time_2,$perguntas_restantes);
    }
    public function criarResultado($vencedor, $pontuacao_final_time_1, $pontuacao_final_time_2){
        $this->quizModel->criarResultado($vencedor, $pontuacao_final_time_1, $pontuacao_final_time_2);
    }

    public function listarPerguntas(){
        return $this->quizModel->listarPerguntas();
    }
}