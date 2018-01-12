
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="page-header">Products of list
                <a href="/admin/products/add-product" class="btn btn-primary">+ Add Products </a>
            </h1>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>Numbers Order</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price  (US$)</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0;?>
                <?php foreach ($listProducts as $list) : ?>
                    <?php if ($list['id_categories'] != 0) : ?>
                    <?php $i += 1;?>
                    <tr>
                        <th><?=$i;?></th>
                        <th><?=$list['name'];?></th>
                        <th><img src="<?=BASE_DIR?>/products/<?=$list['image'];?>" style="height: 50px;width: 50px"> </th>
                        <td> <?=$list['price']?></td>
                        <td><?=$list['description']?></td>
                        <td><a href=""></a></td>
                        <form method="POST" action="">
                            <input type="hidden" value="DELETE" name="_method">
                            <td style="text-align: center;" class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <input type="submit" name="delete" onclick="return xacnhanxoa('Bạn có muốn xóa đội bóng này?')" value="Delete" />
                            </td>
                        </form>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
