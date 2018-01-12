
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách khách hàng thành viên</h1>
        </div>
		    <span style="margin-left: 13px"><b>Số khách hàng: </b>

		    </span>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th style="width: 0px;">STT</th>
                    <th>Họ và tên</th>
                    <th>Tên đăng nhập</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Xem chi tiết</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                <?php
                    foreach ($listUser as $list) {
                        if ($list['is_admin'] != 1) {
                    $i += 1; ?>
                <tr>
                    <th><?=$i?></th>
                    <td><?=$list['name']?></td>
                    <td><?=$list['username']?></td>
                    <td><?='0'.$list['phone']?></td>
                    <td><?=$list['email']?></td>
                    <td style="width: 0px;text-align: center;">
                        <a style="color: blue;font-size: 16px" href="<?=BASE_URL?>admin/users/detail/<?=$list['id_user']?>"><i class="fa fa-search-plus" aria-hidden="true"> Xem chi tiết	</i>
                        </a>
                    </td>
                        <td style="text-align: center;" class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a href="<?=BASE_URL?>admin/users/delete/<?=$list['id_user']?>">
                            <input  type="submit" name="delete" onclick="return xacnhanxoa('Bạn có muốn xóa đơn hàng này?')" value="Delete" />
                            </a>
                        </td>
                </tr>
                <?php }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
