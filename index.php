<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Calculadora de Juros</title>
        <style>
            
            body {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Roboto", Sans-serif;
                
            }
            main{
                max-width: 100vw;
                height: 100%;
                padding: 60px;
                background-color: #212121;
                color: #fff;
            }
            form{
                display:flex;
                width: 100%;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
            label{
                margin-bottom: 20px; 
            }

        </style>
    </head>
    <body>
        <main class="main"> 
                
            <form method="POST">
                <label>Insira o valor incial:<input type="number" step="0.01" name="value" required/></label>
                <label>Insira a data final:<input type="date" name="date" required/></label>
                <label>Insira a porcentagem de juros:<input type="number" placeholder="10" name="pct" required/></label>
                <input type='submit' value='Calcular' />
            </form>


            <?php

                if (isset($_POST['value']) && isset($_POST['pct']) && isset($_POST['date'])) {

                    $value = $_POST['value'];
                    $juros= $_POST['pct'];
                    $tempo = $_POST['date'];

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
                };
            ?>

        </main>
    </body>
</html>