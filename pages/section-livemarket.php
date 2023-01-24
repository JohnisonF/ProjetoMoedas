<section id="live-market">
    <h2 class="mb-4">Live Market</h2>
    <div class="row-coin r-style">
        <?php
            foreach(getMarket() as $k => $v){

                $format = ((is_int($v->coin->value) || is_int($v->coin->lastValue)) ? 0 : 3);
                $format = number_format($v->coin->value, $format, '.', ',');

                $percentage = coinPercentage($v->coin->value, $v->coin->lastValue);

                echo '<div class="marketTransaction"><div style="display:flex;">
                        <div class="img-coin">
                            <img src="'.$v->coin->image.'" alt="">
                        </div>
                        <div class="coin-name">
                            <p>'.$v->coin->name.'</p>
                            <p class="c-gray">'.$v->coin->abbreviation.' / USDT</p>
                        </div>
                    </div>
                    <div class="change">
                        <p class="c-gray">Change</p>
                        <p style="color: '.(str_contains($percentage, "-") ? '#FF9D67' : '#69DC89').'">'.(str_contains($percentage, "-") ? '' : '+').$percentage.'%</p>
                    </div>
                    <div class="price-coin">
                        <p class="c-gray">Price</p>
                        <p>'.$format.' USD</p>
                    </div>
                    </div>';
            }
        ?>
    </div>
</section>