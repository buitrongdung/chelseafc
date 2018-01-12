<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm đội bóng</h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form  method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hình ảnh</label>
                            <div class="col-sm-3">
                                <input type="file" name="image" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tên đội </label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group" style="margin-left: 136px;">
                            <button type="submit" value="addTeams" name="addTeams" class="btn btn-primary" ><strong>Thêm</strong></button>
                            <button type="reset" value="reset" name="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>