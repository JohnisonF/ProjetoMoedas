<?php

    error_reporting(1);
    require_once('./vars.php');

    function montaCardMoeda($img = null, $bgLogoColor, $isPositive, $percentage, $value, $coin, $id) { 
        $color = '';
        $svg = '';

        if($isPositive) {
            $color = '#6BDD8B';
            $svg = '<svg style="width:22px;height:22px" viewBox="0 0 24 24">
                        <path fill="'.$color.'" d="M7,15L12,10L17,15H7Z" />
                    </svg>';
        }
        else {
            $color = '#FF823C';
            $svg = '<svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="'.$color.'" d="M7,10L12,15L17,10H7Z" />
                    </svg>';
        }
        
        echo '
                <div class="card-moedas" data-moeda='.$id.'>
                <div class="logo-porcentagem">
                    <div class="logo-card" style="background-color:'.$bgLogoColor.'">
                        <img src="'.$img.'"/>
                    </div>
                    <div class="label-preco-porcentagem">
                        '.$svg.'
                        <div style="display:flex; margin-top: 2px;font-weight: 700;color: '.$color.'">
                            <span class="simbolo-preco">
                                '. ($isPositive ? '+' : '') .'
                            </span>
                            <p class="porcentagem-preco">
                                '.$percentage.'%
                            </p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="preco">
                        $'.$value.'
                    </div>
                    <div class="tipo-moeda">
                        '.$coin.'
                    </div>
                </div>
            </div>
        ';
    }

    function getCoinById($v, $arrTransactions) {
        if($v->id == $arrTransactions->idCoin) {
            return ['moeda' => $v->name];
        }
    }

    function montaTransacoes($nomeMoeda, $valor, $data, $isCompra) {
        $d = new DateTime($data);

        $txt = '';

        if($d->format('d/m') == date('d/m')) {
            $txt = 'Today';
        }
        else if($d->format('d') - 1 == date('d') - 1 || $d->format('m') == date('m')) {
            $txt = 'Yesterday';
        }
        else {
            $txt = $d->format('d/m');
        }

        if($isCompra) {
            $svg = '<svg style="width:24px;height:24px;transform: rotate(90deg)" viewBox="0 0 24 24">
                    <path fill="#1ECB4F" d="M19,5V19H16V5M14,5V19L3,12" />
                </svg>';
        }
        else {
            $svg = '<svg style="width:24px;height:24px;transform: rotate(-90deg)" viewBox="0 0 24 24">
                        <path fill="#FF8C4B" d="M19,5V19H16V5M14,5V19L3,12" />
                    </svg>';
        }

        echo '<div class="row-transaction r-style">
                <div style="display:flex;">
                    <div class="img-coin">
                        '.$svg.'
                    </div>
                    <div class="coin-name">
                        <p>'.$nomeMoeda.'</p>
                        <p class="c-gray">'.($isCompra ? 'Buy' : 'Recevied').'</p>
                    </div>
                </div>
                <div class="coin-name">
                    <p>$'.$valor.'</p>
                    <p class="c-gray">'.$txt.', '.$d->format('H:i').'</p>
                </div>
            </div>';
    }


    function getCoins() {
        
        $url = "https://localhost:7178/api/Coins";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $exec = curl_exec($ch);
        
        curl_close($ch);
        return json_decode($exec);
    }

    function getMarket() {
        
        $url = "https://localhost:7178/api/Historico/market";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $exec = curl_exec($ch);
        
        curl_close($ch);

        $json = json_decode($exec);

        $arr = [];

        foreach($json as $k => $v) {
            $url = "https://localhost:7178/api/Coins/".$v->idCoin;
            $c = curl_init();

            curl_setopt($c, CURLOPT_URL, $url);
            curl_setopt($c, CURLOPT_HTTPGET, true);
            curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            
            $ex = curl_exec($c);
            
            curl_close($c);
            $result = json_decode($ex);

            $arr[$k] = $v;
            $arr[$k]->coin = (object) $result;
        }

        return $arr;
    }

    function getTransacoes($idCarteira) {

        $url = "https://localhost:7178/api/HistoricoCompras/carteira/".$idCarteira;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $exec = curl_exec($ch);
        
        curl_close($ch);
        return json_decode($exec);
    }

    function coinPercentage($value, $lastValue) {
        return strval((bcsub($value, $lastValue, 3)/ 100));
    }


?>