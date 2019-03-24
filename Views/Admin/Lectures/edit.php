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
                                <strong class="card-title text-light">Viết bài</strong>
                            </div>
                            <div class="card-body">
                                <form class="col-12" action="<?= WEB_FOLDER . "/admin/lectures/edit/{$lecture->lecture_id}" ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">ID</label>
                                        <div class="col-sm-2">
                                        <input type="text" name="name" readonly class="form-control" value="<?= $lecture->lecture_id ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tên bài học</label>
                                        <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" value="<?= $lecture->lecture_name ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <textarea class="col-12" name="data"><?= $lecture->lecture_data ?></textarea>
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
    <script type="text/javascript" src="<?= WEB_FOLDER ?>/public/Lib/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= WEB_FOLDER ?>/public/admin/config-lecture-editor.js"></script>
    <script type="text/javascript">
        (function ($) {
            CKEDITOR.replace('data', config);
        }(jQuery));
    </script>
    <?php include PATH_VIEW . '/Admin/Share/Footer.php' ?>
</body>

</html>