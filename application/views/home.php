<div class="section section-1" data-menu="0">
<div class="logo" style="background-image: url(<?php echo base_url("assets/icons/logo.png?v=1"); ?>);"></div>
    <div class="jasa-container">
        <span class="jasa">Jasa tt (transfer) RMB</span>
        <span class="jasa-splitter">&#9899;</span>
        <span class="jasa">Jasa Trading (Indonesia - China)</span>
        <span class="jasa-splitter">&#9899;</span>
        <span class="jasa">Top Up Alipay Wechat</span>
    </div>
</div><div class="section section-2" data-menu="1">
    <div class="section-inner what-we-do-inner">
        <pre><?php echo $what->what_text; ?></pre>
    </div>
</div><div class="section section-3" data-menu="2">
    <div class="section-inner">
        <div class="section-title">Cara Transaksi Buy (Beli)</div>
        <div class="buy-text"><pre><?php echo $buy->buy_text; ?></pre></div>
    </div>
</div><div class="section section-4" data-menu="3">
    <div class="section-inner">
        <div class="section-title">Cara Transaksi Sell (Jual)</div>
        <div class="buy-text"><pre><?php echo $sell->sell_text; ?></pre></div>
    </div>
</div><div class="section section-5" data-menu="4">
    <div class="section-inner">
        <div class="testimony-container">
            <?php
            $iLength = sizeof($testimony);
            for ($i = 0; $i < $iLength; $i++) {
                echo '<img class="testimony" src="' . base_url("assets/images/testimony_" . $testimony[$i]->testimony_id . "." . $testimony[$i]->testimony_image_extension . "?d=" . strtotime($testimony[$i]->modified_date)) . '" />';
            }
            ?>
        </div>
    </div>
</div><div class="section section-6" data-menu="5">
    <div class="section-inner">
        <div class="testimony-container">
        <?php
        $iLength = sizeof($trading);
        for ($i = 0; $i < $iLength; $i++) {
            echo '<img class="testimony" src="' . base_url("assets/images/trading_" . $trading[$i]->trading_id . "." . $trading[$i]->trading_image_extension . "?d=" . strtotime($trading[$i]->modified_date)) . '" />';
        }
        ?>
        </div>
    </div>
</div><div class="section section-7" data-menu="6">
    <div class="section-inner faq-inner">
        <pre class="faq"><?php echo $faq->faq_text; ?></pre>
    <div class="bottom-shadow"></div></div>
</div><div class="section section-8" data-menu="7">
    <div class="section-inner section-inner-contact">
        <pre class="contact-info"><?php echo $contact->contact_text; ?>
        </pre>
    </div>
</div>