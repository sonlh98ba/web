<?php $this->load->view('admin/product/head', $this->data); ?>

<div class="line"></div>

<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
    <div class="widget">

        <div class="title">
            <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
            <h6>
                Danh sách sản phẩm </h6>
            <div class="num f12">Số lượng: <b>0</b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

            <thead class="filter">
                <tr>
                    <td colspan="6">
                        <form class="list_filter form" action="index.php/admin/product.html" method="get">
                            <table cellpadding="0" cellspacing="0" width="80%">
                                <tbody>

                                    <tr>
                                        <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                        <td class="item"><input name="id" value="" id="filter_id" type="text" style="width:55px;" /></td>

                                        <td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
                                        <td class="item" style="width:155px;"><input name="name" value="" id="filter_iname" type="text" style="width:155px;" /></td>

                                        <td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
                                        <td class="item">
                                            <select name="catalog">
                                                <option value=""></option>
                                                <!-- kiem tra danh muc co danh muc con hay khong -->
                                                <optgroup label="Tivi">
                                                    <option value="18">
                                                        Toshiba </option>
                                                    <option value="17">
                                                        Samsung </option>
                                                    <option value="16">
                                                        Panasonic </option>
                                                    <option value="15">
                                                        LG </option>
                                                    <option value="14">
                                                        JVC </option>
                                                    <option value="13">
                                                        AKAI </option>
                                                </optgroup>

                                                <!-- kiem tra danh muc co danh muc con hay khong -->
                                                <optgroup label="Điện thoại">
                                                    <option value="12">
                                                        HTC </option>
                                                    <option value="11">
                                                        BlackBerry </option>
                                                    <option value="10">
                                                        Asus </option>
                                                    <option value="9">
                                                        Apple </option>
                                                </optgroup>

                                                <!-- kiem tra danh muc co danh muc con hay khong -->
                                                <optgroup label="Laptop">
                                                    <option value="8">
                                                        HP </option>
                                                    <option value="7">
                                                        Dell </option>
                                                    <option value="6">
                                                        Asus </option>
                                                    <option value="5">
                                                        Apple </option>
                                                    <option value="4">
                                                        Acer </option>
                                                </optgroup>

                                            </select>
                                        </td>

                                        <td style='width:150px'>
                                            <input type="submit" class="button blueB" value="Lọc" />
                                            <input type="reset" class="basic" value="Reset" onclick="window.location.href = 'index.php/admin/product.html'; ">
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </td>
                </tr>
            </thead>

            <thead>
                <tr>
                    <td style="width:21px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png" /></td>
                    <td style="width:60px;">Mã số</td>
                    <td>Tên</td>
                    <td>Giá</td>
                    <td style="width:75px;">Ngày tạo</td>
                    <td style="width:120px;">Hành động</td>
                </tr>
            </thead>

            <tfoot class="auto_check_pages">
                <tr>
                    <td colspan="6">
                        <div class="list_action itemActions">
                            <a href="#submit" id="submit" class="button blueB" url="admin/product/del_all.html">
                                <span style='color:white;'>Xóa hết</span>
                            </a>
                        </div>

                        <div class='pagination'>
                        </div>
                    </td>
                </tr>
            </tfoot>

            <tbody class="list_item">
                <tr class='row_9'>
                    <td><input type="checkbox" name="id[]" value="9" /></td>

                    <td class="textC">9</td>

                    <td>
                        <div class="image_thumb">
                            <img src="../upload/product/product13.jpg" height="50">
                            <div class="clear"></div>
                        </div>

                        <a href="product/view/9.html" class="tipS" title="" target="_blank">
                            <b>Tivi LG 520</b>
                        </a>

                        <div class="f11">
                            Đã bán: 0 | Xem: 20 </div>

                    </td>

                    <td class="textR">
                        5,400,000 đ
                    </td>


                    <td class="textC">01-01-1970</td>

                    <td class="option textC">
                        <a href="" title="Gán là nhạc tiêu biểu" class="tipE">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/star.png" />
                        </a>
                        <a href="product/view/9.html" target='_blank' class='tipS' title="Xem chi tiết sản phẩm">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
                        </a>
                        <a href="admin/product/edit/9.html" title="Chỉnh sửa" class="tipS">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png" />
                        </a>

                        <a href="admin/product/del/9.html" title="Xóa" class="tipS verify_action">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
                        </a>
                    </td>
                </tr>

            </tbody>

        </table>
    </div>

</div>
<div class="clear mt30"></div>