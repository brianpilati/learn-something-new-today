<?php

    class EbayAds {
        public function __construct() {
        }

        public function get300by250Ad() {
            if (ISSET($GLOBALS['IS_TEST'])) {
                return "Fake 300 by 250 - Ebay Ad";
            } else {
return <<<HTML
    <div class="align-left">  
        <script type="text/javascript" src='http://adn.ebay.com/files/js/min/jquery-1.6.2-min.js'></script>
        <script type="text/javascript" src='http://adn.ebay.com/files/js/min/ebay_activeContent-min.js'></script>
        <script>
            document.write('\x3Cscript type="text/javascript" charset="utf-8" src="http://adn.ebay.com/cb?programId=1&campId=5337710521&toolId=10026&customId=2015-06-18&keyword=%28LEGO%2CStar+Wars%29&width=300&height=250&font=1&textColor=333366&linkColor=333333&arrowColor=FFAF5E&color1=63769A&color2=[COLORTWO]&format=ImageLink&contentType=TEXT_AND_IMAGE&enableSearch=y&usePopularSearches=n&freeShipping=n&topRatedSeller=n&itemsWithPayPal=n&descriptionSearch=n&showKwCatLink=n&excludeCatId=&excludeKeyword=&catId=19006&disWithin=200&ctx=n&autoscroll=n&title=LEGO&flashEnabled=' + isFlashEnabled + '&pageTitle=' + _epn__pageTitle + '&cachebuster=' + (Math.floor(Math.random() * 10000000 )) + '">\x3C/script>' );
        </script>
    </div>
HTML;
            }
        }
    }
?>
