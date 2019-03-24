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
                                <strong class="card-title text-light"><i class="fa fa-list"></i> Danh sách Comments</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Thời gian</th>
                                            <th>Tên bài học</th>
                                            <th>Nội dung</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color:black">
                                        <?php foreach($comments as $cmt): ?>
                                        <tr>
                                            <td class="text-center"><?= $cmt->comment_id ?></td>
                                            <td><?= $cmt->user_name ?></td>
                                            <td><?= $cmt->comment_date ?></td>
                                            <td><?= $cmt->lecture_name ?></td>
                                            <td>
                                                <?= htmlspecialchars(strlen($cmt->comment_content)>100 ? substr($cmt->comment_content, 0, 100) . '...' : $cmt->comment_content) ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-danger btn-sm" href="<?= WEB_FOLDER . "/admin/Comments/delete/{$cmt->comment_id}" ?>"><i class="fa fa-trash"></i> Xóa</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
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