<?php $urls = $this->uri->segment(1); ?>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="<?= $urls == "welcome" ? "active" : null ?>">
                <a href="<?= site_url('welcome') ?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a>
            </li>
        </ul>
    </section>
</aside>