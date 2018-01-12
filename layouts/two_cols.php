<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) :?>
    <?php include( __DIR__ . "/admin/header.php"); ?>
    <?php include_once $pageViewFile; ?>
    <?php include( __DIR__ . "/admin/footer.php"); ?>
<?php else : ?>
    <?php include( __DIR__ . "/header.php"); ?>
    <?php include_once $pageViewFile; ?>
    <?php include( __DIR__ . "/footer.php"); ?>
<?php endif; ?>