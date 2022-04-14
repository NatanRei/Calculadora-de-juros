<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Calculadora de Juros</title>
</head>
<body>
    <form action="resultado.php" method="POST">
        <p>Insira o valor incial:<input type="number" name="value" /></p>
        <p>Insira a data final:<input type="date" name="date" /></p>
        <p>Insira a porcentagem de juros:<input type="number" placeholder="Porcentagem Juros" name="pct" /></p>
        <input type='submit' value='Calcular' />
    </form>
</body>
</html>