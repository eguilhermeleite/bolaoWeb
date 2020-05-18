<?php

require './conexao.php';

class Concurso {

    // FUNÇÃO PARA CRIAR NOVO CONCURSO
    function criarConc($dt, $nC, $n1, $n2, $n3, $n4, $n5) {
        include 'conexao.php';

        $insereConc = $conexao->query("insert into concursos(id,data,concNum,n1,n2,n3,n4,n5) values (default,'$dt','$nC','$n1','$n2','$n3','$n4','$n5')");

        if ($insereConc) {
            echo "Ok, concurso cadastrado com sucesso!<br>";
        } else {
            echo "Houve algum erro, por favor, volte e tente novamente.<br>";
        }
    }

    // FUNÇÃO PARA EDITAR CONCURSO
    function editarConc($id, $dt, $nC, $n1, $n2, $n3, $n4, $n5) {
        include 'conexao.php';
        $editarConc = $conexao->query("update concursos set  data = '$dt', concNum = '$nC', n1='$n1', n2='$n2', n3='$n3', n4='$n4', n5='$n5' where id = '$id' ");
        if ($editarConc) {
            echo 'Ok, concurso editado com sucesso!';
        } else {
            echo "Houve algum erro, por favor, volte e tente novamente.";
        }
    }

    // FUNÇÃO PARA EXCLUIR CONCURSO
    function excluirConc($id) {
        include 'conexao.php';
        $excluirConc = $conexao->query("delete from concursos where id = '$id'");
        if ($excluirConc) {
            echo 'Ok, concurso excluído com sucesso!';
        } else {
            echo "Houve algum erro, por favor, volte e tente novamente.";
        }
    }

    //FUNÇÃO PARA EXCLUIR TODOS OS CONCURSOS
    function excluirTodosConc() {
        include 'conexao.php';
        $excluirTodosConc = $conexao->query("truncate table concursos ");
        if ($excluirTodosConc) {
            echo 'Ok, todos os concursos foram excluídos com sucesso!';
        } else {
            echo "Houve algum erro, por favor, volte e tente novamente.";
        }
    }

    // FUNÇÃO PARA PEGAR OS CONCURSOS
    function getConc() {
        include 'conexao.php';

        $sql = $conexao->query("SELECT * FROM concursos");
        $linha = $sql->rowCount();

        if ($linha > 0) {

            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {

                $n1 = intval($row['n1']);
                $n2 = intval($row['n2']);
                $n3 = intval($row['n3']);
                $n4 = intval($row['n4']);
                $n5 = intval($row['n5']);

                $arrayConc[] = array($n1, $n2, $n3, $n4, $n5);
            }
        } else {
            $n1 = 0;
            $n2 = 0;
            $n3 = 0;
            $n4 = 0;
            $n5 = 0;

            $arrayConc[] = array($n1, $n2, $n3, $n4, $n5);
        }

        //JUNTAR AS COLUNAS DO ARRAY DE CONCURSOS
        $a1 = array_column($arrayConc, "0");
        $a2 = array_column($arrayConc, "1");
        $a3 = array_column($arrayConc, "2");
        $a4 = array_column($arrayConc, "3");
        $a5 = array_column($arrayConc, "4");

        //TRANSFORMAR OS ÍNDICES EM UM SÓ ÍNDICE
        $arrayFinal = array_merge($a1, $a2, $a3, $a4, $a5);

        // PEGAR TODOS OS NÚMEROS SEM REPETIÇÕES
        $result = array_unique($arrayFinal);

        return $result;
    }

    //FUNÇÃO PARA MOSTRAR OS CONCURSOS NO MODAL
    function displayConc() {
        include 'conexao.php';
        $sql = $conexao->query("select distinct id,data,concNum,n1,n2,n3,n4,n5 from concursos");
        $linha = $sql->rowCount();
        $cards = "";

        if ($linha > 0) {
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $card = file_get_contents('cardsConc.html');
                $card = str_replace('{id}', $row['id'], $card);
                $card = str_replace('{data}', $row['data'], $card);
                $card = str_replace('{concNum}', $row['concNum'], $card);
                $card = str_replace('{n1}', $row['n1'], $card);
                $card = str_replace('{n2}', $row['n2'], $card);
                $card = str_replace('{n3}', $row['n3'], $card);
                $card = str_replace('{n4}', $row['n4'], $card);
                $card = str_replace('{n5}', $row['n5'], $card);
                $cards .= $card;
            }
            $display = file_get_contents('containerCards.html');
            $display = str_replace('{concursos}', $cards, $display);
            $display2 = file_get_contents('containerClassificacao.html');
            $display2 = str_replace('{concursos}', $cards, $display2);
            return $display;
            return $display2;
        } else {
            $display = file_get_contents('containerCards.html');
            $display = str_replace('{concursos}', "...", $display);
            $display2 = file_get_contents('containerClassificacao.html');
            $display2 = str_replace('{concursos}', "...", $display2);
            return $display;
            return $display2;
        }
    }

}
