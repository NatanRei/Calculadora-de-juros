<?php

$dinheiro = $_POST['value'];
$tempo = $_POST['date'];
$pct= $_POST['pct'];

require_once 'interestCalculator.php';

// Instanciando o objeto

$juros = new Main();

$juros->setDataFinal($tempo);
$juros->setDinheiro($dinheiro);
$juros->setPctJuros($pct);

$juros->CalcJurosSimples();
$juros->CalcJurosCompostos();

echo "<h2>Dados Iniciais</h2><br/>";

echo "Valor: R$ " . $juros->getValue() . "</br>Taxa de juros: " . $juros->getPctJuros() * 100 ."% ao mês</br>";
echo "Data Inicial: " . $juros->getInitialDate() . "</br>Data Final: " . $juros->getFinalDate()."</br>";
echo "Meses: " . $juros->getTempo() . "</br>";


echo "<h2>Juros Simples</h2><br/>";

echo "Juros: ". $juros->getJurosSimples() . " reais</br> ";
echo "Valor Total: R$" . $juros->getDividaSimples() . " reais </br>";
echo "Parcelas mensais: R$" . number_format((int)$juros->getJurosSimples() / $juros->getTempo(), 2,',','.') ." reais por mês ao longo de " . $juros->getTempo() . " meses.";


echo "<h2>Juros Compostos</h2></br>";

echo "Juros: ". $juros->getJurosCompostoa() . " reais</br>";
echo "Valor Total: R$" . $juros->getDividaComposta() . " reais </br>";


?>