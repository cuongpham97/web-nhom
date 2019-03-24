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
                                <strong class="card-title text-light"><i class="fa fa-plus-circle"></i> Thêm khóa học</strong>
                            </div>
                            <div class="card-body row">

                                <form class="col-md-10 offset-md-1" action="<?= WEB_FOLDER ?>/admin/courses/new" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tên khóa học</label>
                                        <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" placeholder="Hypertext Makup Language">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tên ngắn</label>
                                        <div class="col-sm-9">
                                        <input type="text" name="alias" class="form-control" placeholder="HTML">
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
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Xác nhận</button>
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