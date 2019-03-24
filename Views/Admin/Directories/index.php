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
                <form action="<?= WEB_FOLDER ?>/admin/directories/index" method="POST">
                    <label>Nhập id khóa học: </label>
                    <input type="number" name="id">
                    <input type="submit">
                <form>
            </div>
        </div>
       
    </div>
    <div class="clearfix"></div>
    </div>
    <?php include PATH_VIEW . '/Admin/Share/Footer.php' ?>
</body>

</html>