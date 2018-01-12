<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm video</h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form  method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Video</label>
                            <div class="col-sm-3">
                                <input type="file" name="file" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tên video </label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group" style="margin-left: 136px;">
                            <button type="submit" value="addVideo" name="addVideo" class="btn btn-primary" ><strong>Thêm</strong></button>
                            <button type="reset" value="reset" name="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>