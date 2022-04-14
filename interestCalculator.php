<?php

class Main
{
    private $dinheiro;
    private $tempo;
    private $now;
    private $porcentagemjuros;
    private $jurosSimples;
    private $jurosCompostos;
    private $months;

    function __construct(){

        $this->dinheiro = 0;
        $this->tempo = 0;
        $this->months = 0;
        $this->now = 0;
        $this->porcentagemjuros = 0;
        $this->jurosSimples = 0;
        $this->jurosCompostos = 0;
        
    }

    public function setDinheiro($dinheiro){
        $this->dinheiro = $dinheiro;
    }
    
    public function setDataFinal($tempo){
        $toTimestramp = strtotime($tempo);
        $currentTimestramp = strtotime(date('Y-m-d'));
        $timeDiference = $toTimestramp - $currentTimestramp + 864000;
        $timeDiference = round($timeDiference /60 /60 /24 /30);
        $this->months = $timeDiference;
        $this->tempo = $tempo;
    }

    public function setPctJuros($pct){
        $this->porcentagemjuros = $pct / 100;
    }

    // Getters


//     public function calc($value, $juros, $tempo){
    
//     $this->dinheiro = $value;

//     $this->porcentagemjuros = $juros / 100;

//     $toTimestramp = strtotime($tempo);
//     $currentTimestramp = strtotime(date('Y-m-d'));
//     $timeDiference = $toTimestramp - $currentTimestramp + 864000;
//     $timeDiference = round($timeDiference /60 /60 /24 /30);
//     $this->months = $timeDiference;
//     $this->tempo = $tempo;

//     $data = array(
//         'valorPrincipal' => $dinheiro,
//         'txJuros' => $juros / 100,
//         '' => '',
//         '' => '',
//         '' => '',
//         '' => '',
//         'dtAtual' => getInitialDate(),
//         'dtVenc' => getFinalDate(),


//          );
//     return $data;

// }


    public function getTempo(){
        return $this->months;
    }

    public function getInitialDate(){
        return $this->now = date('d/m/Y');
    }

    public function getFinalDate(){
        $date = new \DateTime($this->tempo);
        $datePTBR = $date->format('d/m/Y');
        return $this->tempo = $datePTBR;
    }
    public function getValue(){
        return number_format($this->dinheiro, 2,',','.');
    }
    
    public function getPctJuros(){
        return $this->porcentagemjuros;
    }

    public function getJurosSimples(){
        return number_format($this->jurosSimples, 2,',','.');
    }

    public function getJurosCompostoa(){
        $somenteJuros = $this->jurosCompostos - $this->dinheiro;
        return number_format($somenteJuros, 2,',','.');
    }

    public function getDividaSimples(){
        return number_format($this->jurosSimples + $this->dinheiro, 2,',','.');
    }

     public function getDividaComposta(){
        return number_format($this->jurosCompostos, 2,',','.');
    }
  

    // Methods

    public function CalcJurosSimples(){
        $this->jurosSimples = $this->dinheiro * $this->porcentagemjuros * $this->months;

    }

    public function CalcJurosCompostos(){
        $soma = 1 + $this->porcentagemjuros;
        $this->jurosCompostos = $this->dinheiro * $soma ** $this->months;
    }



}