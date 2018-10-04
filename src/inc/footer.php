<footer class="footer container">
    <nav class="nav-secondary">
        <a href="/<?php echo $lang;?>"><?php echo $translation->$lang->nav->home; ?></a>
        <a href="/<?php echo $lang;?>/<?php echo $translation->$lang->pageLink->about; ?>"><?php echo $translation->$lang->nav->about; ?></a>
        <a href="https://www.facebook.com/2francaisauquebec">Facebook</a>
        <a href="https://twitter.com/2FRauQC">Twitter</a>
        <a href=""><?php echo $translation->$lang->nav->rss; ?></a>
        <a href="mailto:axelbaron@outlook.fr"> Email</a>
    </nav>
    <div class="footer__copyright">
        <?php echo $translation->$lang->nav->copyright; ?>
    </div>

    <a id="up" href="#top">
        <img src="/img/leaf.svg" alt="up btn">
        <span>Up</span>
    </a>
</footer>