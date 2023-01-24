<section id="transactions">
    <h2 class="mb-4">Transactions</h2>
    <?php

        $transactions = getTransacoes(1);

        foreach($transactions as $k => $v) {
            $moeda = array_map('getCoinById', $coins, $transactions);
            $moeda = array_diff($moeda, [null]);

            montaTransacoes($moeda[0]['moeda'],$v->valor, $v->data_transacao, $v->isCompra);
        }


    ?>
</section>