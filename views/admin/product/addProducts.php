<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Products</h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form  method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <?php if (isset($error['image']))
                                    echo "<span class='error'>" . $error['image'] . "</span>";
                                else
                                    echo '';
                            ?>
                            <label class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-3">
                                <input type="file" name="image" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Categories </label>
                            <div class="col-sm-6">
                                <select name="categories" id="categories" class="form-control">
                                    <?php if (!empty($selectCategory)) : ?>
                                    <?php foreach ($selectCategory as $itemCategory) : ?>
                                        <?php if ($itemCategory['id_categories'] == 0) : ?>
                                            <option value="<?=$itemCategory['id']?>"> <?=$itemCategory['name']?> </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                        <?php else: ?>
                                            <input placeholder="No infomation"/>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php if (isset($error['name']))
                                echo "<span class='error'>" . $error['name'] . "</span>";
                            else
                                echo '';
                            ?>
                            <label class="col-sm-3 control-label">Name </label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <?php if (isset($error['price'])) echo "<span class='error'>" . $error['price'] . "</span>"; ?>
                            <label class="col-sm-3 control-label">Price </label>
                            <div class="col-sm-6">
                                <input type="text" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <?php if (isset($error['description'])) echo "<span class='error'>" . $error['description'] . "</span>"; ?>
                            <label class="col-sm-3 control-label">Description </label>
                            <div class="col-sm-8">
                                <textarea type="text" name="description" class="form-control" rows="5">
                                </textarea>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group" style="margin-left: 136px;">
                            <button type="submit" value="addProduct" name="addProduct" class="btn btn-primary" ><strong>Add</strong></button>
                            <button type="reset" value="reset" name="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .error {
        margin-left: 14px;
        color: red;
    }
</style>