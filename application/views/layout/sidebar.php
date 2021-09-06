<?php $urls = $this->uri->segment(1); ?>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="<?= $urls == "welcome" ? "active" : null ?>">
                <a href="<?= site_url('welcome') ?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a>
            </li>
            <li class="<?= $urls == "data" ? "active" : null ?>">
                <a href="<?= site_url('data') ?>"><i class="fa fa-list-alt"></i> <span>Data Labor</span></a>
            </li>
        </ul>
    </section>
</aside>