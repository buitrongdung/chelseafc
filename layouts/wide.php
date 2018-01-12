<?php include( __DIR__ . "/header.php"); ?>
<h1 class="serif"><?= $layout_data['page_title'] ?></h1>
<section class="row doc-content questions-list">
    <div class="medium-12 columns"> <?php include_once $pageViewFile; ?></div>
</section>

<?php include( __DIR__ . "/footer.php"); ?>