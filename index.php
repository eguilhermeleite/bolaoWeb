<?php

require './Concurso.php';
require './Apostador.php';


$concurso = new Concurso();
$apostador = new Apostador();


if (!empty($_GET['action']) and $_GET['action'] == 'apostadores') {
    $apostador->display();
} elseif (isset($_GET['nome'])) {
    $nome = $_GET['nome'];
    $apostador->procurarAps($nome);
} elseif (isset($_GET['nomeClas'])) {
    $nomeClas = $_GET['nomeClas'];
    $apostador->procurarApsClas($nomeClas);
} elseif (!empty($_GET['action']) and $_GET['action'] == 'classificacao') {
    $apostador->getAps();
    $apostador->clas();
} else {
    //$apostador->clas();
    $apostador->display();
}



















//*****************************APOSTADORES***************************************
/*
  $sql2 = $conexao->query("SELECT * FROM apostadores");
  $linha2 = $sql2->rowCount();

  if ($linha2 > 0) {

  while ($row2 = $sql2->fetch(PDO::FETCH_ASSOC)) {
  $id = $row2['id'];
  $n1 = intval($row2['n1']);
  $n2 = intval($row2['n2']);
  $n3 = intval($row2['n3']);
  $n4 = intval($row2['n4']);
  $n5 = intval($row2['n5']);
  $n6 = intval($row2['n6']);
  $n7 = intval($row2['n7']);
  $n8 = intval($row2['n8']);
  $n9 = intval($row2['n9']);
  $n10 = intval($row2['n10']);



  // MONTA UM ARRAY COM OS NÚMEROS DOS APOSTADORES E ÍNDICE = AO ID DE CADA APOSTADOR
  $arrayAps[$id] = array($n1, $n2, $n3, $n4, $n5, $n6, $n7, $n8, $n9, $n10);

  //////////////////////////////////////////////////////////////////////////////////////////////
  // COMPARA O ARRAY DOS APOSTADORES COM O ARRAY DOS CONCURSOS
  $comparar = array_intersect($result, $arrayAps[$id]);

  // CONTA QUANTOS RESULTADOS SEMELHANTES ENTRE OS DOIS ARRAYS
  $conte = count($comparar);


  // ATUALIZA A TABELA APOSTADORES COM O TOTAL DE ACERTOS
  $atualizar = $conexao->query("Update apostadores set total = '$conte'  where id = '$id'");
  }// FIM DO WHILE
  } else {
  $n1 = 0;
  $n2 = 0;
  $n3 = 0;
  $n4 = 0;
  $n5 = 0;
  $n6 = 0;
  $n7 = 0;
  $n8 = 0;
  $n9 = 0;
  $n10 = 0;

  $arrayAps[$id] = array($n1, $n2, $n3, $n4, $n5, $n6, $n7, $n8, $n9, $n10);
  }


  //*************************************
 *
  $pesquisa = $conexao->query("select * from apostadores order by total desc");
  $linha = $pesquisa->rowCount();

  $concQuery = $conexao->query("select * from concursos");
  $rowConc = $concQuery->fetch(PDO::FETCH_ASSOC);
  $cards = '';

  if ($linha > 0) {


  while ($row3 = $pesquisa->fetch(PDO::FETCH_ASSOC)) {
  $id = $row3['id'];
  $card = file_get_contents('cards.html');
  $card = str_replace('{id}', $row3['id'], $card);
  $card = str_replace('{nome}', strtoupper($row3['nome']), $card);
  $card = str_replace('{n1}', $row3['n1'], $card);
  $card = str_replace('{n2}', $row3['n2'], $card);
  $card = str_replace('{n3}', $row3['n3'], $card);
  $card = str_replace('{n4}', $row3['n4'], $card);
  $card = str_replace('{n5}', $row3['n5'], $card);
  $card = str_replace('{n6}', $row3['n6'], $card);
  $card = str_replace('{n7}', $row3['n7'], $card);
  $card = str_replace('{n8}', $row3['n8'], $card);
  $card = str_replace('{n9}', $row3['n9'], $card);
  $card = str_replace('{n10}', $row3['n10'], $card);
  $card = str_replace('{total}', $row3['total'], $card);
  if (in_array($row3['n1'], $result)) {
  $card = str_replace('{bg1}', "bg-success text-light", $card);
  }
  if (in_array($row3['n2'], $result)) {
  $card = str_replace('{bg2}', "bg-success text-light", $card);
  }
  if (in_array($row3['n3'], $result)) {
  $card = str_replace('{bg3}', "bg-success text-light", $card);
  }
  if (in_array($row3['n4'], $result)) {
  $card = str_replace('{bg4}', "bg-success text-light", $card);
  }
  if (in_array($row3['n5'], $result)) {
  $card = str_replace('{bg5}', "bg-success text-light", $card);
  }
  if (in_array($row3['n6'], $result)) {
  $card = str_replace('{bg6}', "bg-success text-light", $card);
  }
  if (in_array($row3['n7'], $result)) {
  $card = str_replace('{bg7}', "bg-success text-light", $card);
  }
  if (in_array($row3['n8'], $result)) {
  $card = str_replace('{bg8}', "bg-success text-light", $card);
  }
  if (in_array($row3['n9'], $result)) {
  $card = str_replace('{bg9}', "bg-success text-light", $card);
  }
  if (in_array($row3['n10'], $result)) {
  $card = str_replace('{bg10}', "bg-success text-light", $card);
  }


  $cards .= $card;
  }


  $display = file_get_contents('containerCards.html');
  $display = str_replace('{cards}', $cards, $display);
  print $display;
  } else {
  $display = file_get_contents('containerCards.html');
  $display = str_replace('{cards}', "Nada Por Aqui...", $display);
  print $display;
  }

 */


