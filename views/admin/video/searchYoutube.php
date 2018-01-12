<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm video</h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form method="GET">
                  <div>
                    Search Term: <input type="search" id="q" name="q" placeholder="Enter Search Term">
                  </div>
                  <div>
                    Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="50" step="1" value="25">
                  </div>
                  <input type="submit" value="Search">
                </form>
            </div>
        </div>
    </div>
</div>
<?php if (isset($htmlBody)): ?>
<?=$htmlBody?>
<?php endif ?>


