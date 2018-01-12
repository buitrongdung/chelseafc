
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách khách hàng thành viên
                <a href="/admin/teams/add-teams" class="btn btn-primary">+ Thêm </a>
            </h1>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>Số đội</th>
                    <th>Tên đội</th>
                    <th>Logo</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0;?>
                <?php foreach ($listTeams as $list) : ?>
                    <?php $i += 1;?>
                <tr>
                    <th><?=$i;?></th>
                    <th><?=$list['name'];?></th>
                    <th><img src="<?=BASE_DIR?><?=$list['image'];?>" style="height: 50px;width: 50px"> </th>
                    <form method="POST" action="">
                        <input type="hidden" value="DELETE" name="_method">
                        <td style="text-align: center;" class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <input type="submit" name="delete" onclick="return xacnhanxoa('Bạn có muốn xóa đội bóng này?')" value="Delete" />
                        </td>
                    </form>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
