<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin nhân viên</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <div class="col-xs-12" >
                    <div class="form-group">
                        <strong>Họ và tên: </strong>
                        <?=$list['name']?>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <strong>Ngày sinh: </strong>

                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <strong>Giới tính: </strong>
                            <?=$list['gender']?>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <strong>Số điện thoại: </strong>
                            <?="0".$list['phone']?>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <strong>Email: </strong>
                            <?=$list['email']?>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <strong>Địa chỉ: </strong>
                            <?=$list['address']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>