<?php

namespace App;

class Aula {


    function extrairDadosDeUmaAula($nomeAula) {
        $data = file_get_contents(__DIR__ . "/../aulas/$nomeAula/aula.js");
        $teste = str_replace("var \$configuracao=", "", $data);
        $decoded = (object) json_decode($teste);
        $content = $decoded->imports;

        $dadosQuestao = [];

        foreach($content as $idAula) {
            $questoes = file_get_contents(__DIR__ . "/../aulas/$nomeAula/$idAula");
            $questoesSemJs = str_replace("questoes.push(", "", $questoes);
            $questaoSemUltimoCaractere = rtrim($questoesSemJs, ")");

            $metadadosQuestao = json_decode($questaoSemUltimoCaractere);
            array_push(
                $dadosQuestao,
                [
                    "id" => $idAula,
                    "tipo" => $metadadosQuestao->tipo,
                ]
            );
            echo $idAula . " - " . $metadadosQuestao->tipo;
            echo "<br>";
        }
        return json_encode($dadosQuestao);
    }

    public function extrairInformacoes() {
        return $this->extrairDadosDeUmaAula("aula");
    }
}