<section id="section-moedas">
    <?php

        $coins = getCoins();

        foreach($coins as $k => $value) {
            $lastValue = $value->lastValue;
            $v = $value->value;

            $format = ((is_int($v) || is_int($lastValue)) ? 0 : 3);
            $format = number_format($value->value, $format, '.', ',');
            
            $percentage = coinPercentage($v, $lastValue);

            montaCardMoeda($value->image,"#".$value->color,(str_contains($percentage, "-") ? false : true),$percentage,$format,$value->name." - ".$value->abbreviation, $value->id);
        }



    ?>
</section>