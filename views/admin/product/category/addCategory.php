<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add categories
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form id="formAddCategory"  method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <?php echo (isset($error)) ? $error : ''; ?>
                            <label class="col-sm-3 control-label">Categories </label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group" style="margin-left: 136px;">
                            <button type="submit" value="addCategory" name="addCategory" class="btn btn-primary" ><strong>Add</strong></button>
                            <button type="reset" value="reset" name="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>