<!DOCTYPE html>
<?php include PATH_VIEW . '/Admin/Share/Header.php' ?>

<body>
    <!-- Left Panel -->
    <?php include PATH_VIEW . '/Admin/Share/Sidebar.php' ?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include PATH_VIEW . '/Admin/Share/Topbar.php' ?>

        <!--Content-->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <strong class="card-title text-light"><i class="fa fa-list"></i> Danh sách khóa học</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Tên ngắn</th>
                                            <th>Hình ảnh</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color:black">
                                        <?php foreach($courses as $course): ?>
                                        <tr>
                                            <td class="text-center"><?= $course->course_id ?></td>
                                            <td><?= $course->course_name ?></td>
                                            <td><?= $course->course_alias ?></td>
                                            <td><?= $course->course_image ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-success btn-sm" href="<?= WEB_FOLDER . "/admin/courses/edit/{$course->course_id}" ?>"><i class="fa fa-edit"></i> Sửa</a>
                                                <a class="btn btn-danger btn-sm" href="<?= WEB_FOLDER . "/admin/courses/delete/{$course->course_id}" ?>"><i class="fa fa-trash"></i> Xóa</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td class="text-center"><a class="btn btn-primary btn-sm" href="<?= WEB_FOLDER . '/admin/courses/new' ?>"><i class="fa fa-plus-circle"></i> Thêm</a></td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <div class="clearfix"></div>
    </div>
    <?php include PATH_VIEW . '/Admin/Share/Footer.php' ?>
</body>

</html>