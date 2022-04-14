<?php

$value = $_POST['value'];
$juros= $_POST['pct'];
$tempo = $_POST['date'];

echo $value;
require_once 'interestCalculator.php';

// Instanciando o objeto

$handleCalc = new Main();

$data = $handleCalc->calc($value, $juros, $tempo);

if(!$data){
	echo "Dados de entrada inválidos!";
}else{

echo "<h2>Dados Iniciais</h2><br/>";

echo "Valor: R$ " . $data['valorPrincipal'];
echo "</br>Taxa de juros: " . $data['txJuros'] ." % ao mês</br>";
echo "Data Inicial: " .  $data['dtAtual']  . "</br>Data Final: " .  $data['dtVenc']  ."</br>";
echo "Meses: " .  $data['meses']  . "</br>";


echo "<h2>Juros Simples</h2><br/>";

echo "Juros: ". $data['jurosSimples'] . " reais</br> ";
echo "Valor Total: R$" . $data['totalJurosSimples'] . " reais </br>";
echo "Parcelas mensais: R$" . number_format((int)$data['jurosSimples'] / $data['meses'], 2,',','.') ." reais por mês ao longo de " . $data['meses'] . " meses.";


echo "<h2>Juros Compostos</h2></br>";

echo "Juros: ". $data['jurosCompostos'] . " reais</br>";
echo "Valor Total: R$" . $data['totalJurosCompostos'] . " reais </br>";
};

?>