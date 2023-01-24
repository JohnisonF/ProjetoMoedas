<?php

    require_once('./vars.php');

    require_once('pages/aside-menu.php');
    require_once('pages/aside-menu-mobile.php');
    print_r("<div id='site'>");
        require_once('pages/header.php');
        print_r("<main>
                    <div class='row mt-5'>");
                        require_once('pages/section-moedas.php');
                        require_once('pages/section-estatistica.php');
            print_r("</div>");
            print_r("<div class='row mt-4'>");
                require_once('pages/section-livemarket.php');
                require_once('pages/section-transactions.php');
            print_r("</div>");
    print_r("   </main>
            </div>");
?>