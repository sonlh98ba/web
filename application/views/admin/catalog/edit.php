<?php $this->load->view('admin/catalog/head', $this->data); ?>

<div class="line"></div>

<!-- Main content wrapper -->
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Thêm mới danh mục</h6>
        </div>

        <!-- Form -->
        <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="formRow">
                    <label class="formLeft" for="param_name">Tên danh mục:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="name" id="param_name" value="<?php echo $info->name; ?>" _autocheck="true" type="text" /></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('name') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_sort_order">Thứ tự hiển thị:</label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="sort_order" id="param_sort_order" value="<?php echo $info->sort_order; ?>" _autocheck="true" type="text" /></span>
                        <span name="sort_order_autocheck" class="autocheck"></span>
                        <div name="sort_order_error" class="clear error"><?php echo form_error('sort_order') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_parent_id">Danh mục cha:</label>
                    <div class="formRight">
                        <span class="oneTwo">
                            <select name="parent_id" id="param_parent_id" _autocheck="true">
                                <option value="0">Là danh mục cha</option>
                                <?php foreach ($list as $row) : ?>
                                    <option value="<?php echo $row->id ?>" <?php echo ($row->id == $info->parent_id) ? 'selected' : '' ?>><?php echo $row->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </span>
                        <span name="parent_id_autocheck" class="autocheck"></span>
                        <div name="parent_id_error" class="clear error"><?php echo form_error('parent_id') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formSubmit">
                    <input type="submit" value="Cập nhật" class="redB" />
                </div>
            </fieldset>
        </form>
    </div>
</div>