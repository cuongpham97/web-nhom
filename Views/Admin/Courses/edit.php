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
                    <div class="col-md-10 offset-md-1 p-0">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <strong class="card-title text-light">Sửa khóa học</strong>
                            </div>
                            <div class="card-body row">

                                <form class="col-md-10 offset-md-1" action="<?= WEB_FOLDER . "/admin/courses/edit/{$course->course_id}" ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">ID</label>
                                        <div class="col-sm-9">
                                        <input type="text" name="name" readonly class="form-control" value="<?= $course->course_id ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tên khóa học</label>
                                        <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" value="<?= $course->course_name ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tên ngắn</label>
                                        <div class="col-sm-9">
                                        <input type="text" name="alias" class="form-control" value="<?= $course->course_alias ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Hình ảnh</label>
                                        <div class="col-sm-9">
                                        <input type="file" name="image">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3 offset-9">
                                        <input type="submit" class="btn btn-success" value="Xác nhận">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div><div class="clearfix"></div></div>
    <?php include PATH_VIEW . '/Admin/Share/Footer.php' ?>
</body>

</html>