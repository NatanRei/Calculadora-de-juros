<?php

class Main
{
    public function calc($value, $juros, $tempo){

$test = explode(".",$value);
if(strlen($test[1]) == 2){
    echo "";
}else{
    return false;
};


    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$tempo)) {
        return false;
};
    

    $jurosForCalc = (int)$juros / 100;
    $soma = 1 + $jurosForCalc;

    $toTimestramp = strtotime($tempo);
    $currentTimestramp = strtotime(date('Y-m-d'));
    $timeDiference = $toTimestramp - $currentTimestramp + 864000;
    $timeDiference = round($timeDiference /60 /60 /24 /30);

    $date = new \DateTime($tempo);
    $datePTBR = $date->format('d/m/Y');
    
    // Calculo juro simples

    $jurosSimples = $value * $jurosForCalc * $timeDiference;
    $totalJurosSimples = $jurosSimples + $value;

    // Calculo juro composto

    $totalJurosCompostos = $value * $soma ** $timeDiference;
    $jurosCompostos = $totalJurosCompostos - $value;

    $data = array(
        'valorPrincipal' => number_format($value, 2,',','.'),
        'txJuros' => $juros,
        'jurosSimples' => number_format($jurosSimples, 2,',','.'),
        'totalJurosSimples' => number_format($totalJurosSimples, 2,',','.'),
        'jurosCompostos' => number_format($jurosCompostos, 2,',','.'),
        'totalJurosCompostos' => number_format($totalJurosCompostos, 2,',','.'),
        'dtAtual' => date('d/m/Y'),
        'dtVenc' => $datePTBR,
        'meses' => $timeDiference
         );

    return $data;

    }
}