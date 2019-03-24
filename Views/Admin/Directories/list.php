<!DOCTYPE html>
<?php include PATH_VIEW . '/Admin/Share/Header.php' ?>

<body>
    <!-- Left Panel -->
    <?php include PATH_VIEW . '/Admin/Share/Sidebar.php' ?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include PATH_VIEW . '/Admin/Share/Topbar.php' ?>
        <link rel="stylesheet" href="<?= WEB_FOLDER ?>/public/admin/directory.css">
        <!--Content-->
        <div class="content">
            <div class="animated fadeIn">
         
                <div class="card">
                    <div class="card-header bg-dark">
                        <strong class="card-title text-light"><i class="fa fa-list"></i> Danh sách bài học: <?= $course->course_id ?> - <?= $course->course_name ?></strong>
                    </div>
                    <div class="card-body">
                       <?php foreach($directories as $d): ?>
                            <div class="row">
                            <div class="lession col-md-11 col-12">
                                <h1>
                                    <span class="directory" spellcheck="false"><?= $d->directory_name ?></span>
                                        <a class="my-btn btn-edit-directory" data-did="<?= $d->directory_id ?>" data-cid="<?= $course->course_id ?>" href="#">
                                            <i class="fa fa-check"></i> sửa
                                        </a>
                                        <a class="my-btn btn-delete-directory --color-red" data-did="<?= $d->directory_id ?>" data-cid="<?= $course->course_id ?>" href="#">
                                            <i class="fa fa-trash"></i> xóa
                                        </a>
                                </h1>
                                    <div class="wrap">
                                        <h4>Bạn sẽ học được gì?</h4>

                                        <ol type="1" start="1">
                                            <?php foreach($d->goals as $goal): ?>
                                                <li>
                                                    <span class="goal"><?= $goal->goal_content ?></span>
                                                    <a class="my-btn btn-edit-goal"   data-gid="<?= $goal->goal_id ?>"  data-cid="<?= $course->course_id ?>" href="#"><i class="fa fa-check"></i> sửa</a>
                                                    <a class="my-btn btn-delete-goal --color-red" data-gid="<?= $goal->goal_id ?>" data-did="<?= $d->directory_id ?>" href="#"><i class="fa fa-trash"></i> xóa</a>
                                                </li>
                                            <?php endforeach ?>
                                            <li> 
                                                <input type="text" class="w-50" name="name" style="color:#50505e;font-size:1em" autocomplete="off">
                                                <a class="btn-new-goal my-btn --color-green" href="#" data-did="<?= $d->directory_id ?>" data-cid="<?= $course->course_id ?>"><i class="fa fa-plus-circle"></i> thêm</a>
                                            </li> 
                                        </ol>
                                        <h4>Bắt đầu các bài học ngay bây giờ</h4>

                                        <ul type="none">
                                            <?php foreach($d->lectures as $lecture): ?>
                                                <li>
                                                    <a target="_blank" href="<?= Link::lecture($d->course_name, $lecture->lecture_name, $lecture->lecture_id) ?>"><?= $lecture->lecture_name ?></a>
                                                    <a class="my-btn" href="<?= WEB_FOLDER . "/admin/lectures/edit/{$lecture->lecture_id}" ?>"><i class="fa fa-edit"></i> viết bài</a>
                                                    <a class="my-btn --color-red" href="<?= WEB_FOLDER . "/admin/lectures/delete/{$lecture->lecture_id}" ?>"><i class="fa fa-trash"></i> xóa</a>
                                                </li>
                                            <?php endforeach ?> 
                                            <li>
                                                <input type="text" class="w-50" name="name" style="font-size:1.44em;color:#9a0e14;font-weight:bold;" autocomplete="off">
                                                <a class="btn-new-lecture my-btn --color-green" href="#" data-did="<?= $d->directory_id ?>" data-cid="<?= $course->course_id ?>"><i class="fa fa-plus-circle"></i> thêm</a>
                                            </li>    
                                        </ul>
                                    </div>
                                 </div>
                            </div>
                        <?php endforeach ?>
                        <div class="row">
                            <div class="lession col-md-11 col-12">
                                <h1>
                                    <input type="text" class="w-50" name="name" style="color:green;font-weight:bold;font-size:1.75rem" autocomplete="off">
                                    <a class="btn-new-directory my-btn --color-green" href="#" data-cid="<?= $course->course_id ?>"><i class="fa fa-plus-circle"></i> thêm</a>
                                </h1>
                            </div>
                        </div>
                    </div>
                 </div><!--/Card-->
            </div>
        </div>
        <script type="text/javascript">
            (function($) {
                var colors = ["red" ,"orange", "lightblue", "green", "pink", "lime", "yellow"]; 
                var lists = $( '.lession ul' ).each( function( index, ul ) {
                    $(this).find('li').each( function(index, li) {
                        $(this).css("border-left-color", colors[index%colors.length]);
                    });
                });

                function request(path, params, method) {
                    method = method || "post";
                    var form = document.createElement("form");
                    form.setAttribute("method", method);
                    form.setAttribute("action", path);

                    for(var key in params) {
                        if(params.hasOwnProperty(key)) {
                            var hiddenField = document.createElement("input");
                            hiddenField.setAttribute("type", "hidden");
                            hiddenField.setAttribute("name", key);
                            hiddenField.setAttribute("value", params[key]);

                            form.appendChild(hiddenField);
                        }
                    }
                    document.body.appendChild(form);
                    form.submit();
                }

                $(document).ready(function() {
                    $('.directory').click(function(){
                        $(this).attr('contenteditable', true);
                    });

                    $('.goal').click(function(){
                        $(this).attr('contenteditable', true);
                    });

                    //Sửa tên mục lục
                    $('.btn-edit-directory').click(function() {
                        //id của mục lục
                        did  = $(this).data('did');
                        //id khóa học
                        cid  = $(this).data('cid');
                        //tên mục lục khi sửa
                        name = $(this).parent().find('span').html();
                        //tạo request
                        request('<?= WEB_FOLDER ?>/admin/directories/edit', {did: did, name: name, cid: cid});
                        //Ngăn cản sự kiện của link
                        return false;
                    });

                    $('.btn-delete-directory').click(function() {
                        //id của mục lục
                        if (confirm("Bạn chắc chắn muốn xóa?")) {
                            did = $(this).data('did');
                            cid  = $(this).data('cid');
                            //tạo request
                            request('<?= WEB_FOLDER ?>/admin/directories/delete', {did: did, cid: cid});
                        }
                        return false;
                    });

                    $('.btn-new-directory').click(function() {
                        //id của mục lục
                        name = $(this).parent().find('input').val();
                        cid  = $(this).data('cid');
                        request('<?= WEB_FOLDER ?>/admin/directories/new', {cid: cid, name: name});

                        return false;
                    });

                    $('.btn-new-lecture').click(function() {
                        name = $(this).parent().find('input').val();
                        did = $(this).data('did');
                        cid  = $(this).data('cid');
                        request('<?= WEB_FOLDER ?>/admin/lectures/new', {did: did, cid: cid, name: name});

                        return false;
                    });

                    $('.btn-delete-goal').click(function() {
                        if (confirm("Bạn chắc chắn muốn thêm?")) {
                            gid  = $(this).data('gid');
                            did = $(this).data('did');
                            //tạo request
                            request('<?= WEB_FOLDER ?>/admin/goals/delete', {gid: gid, did: did});
                        }
                        return false;
                    });

                    $('.btn-new-goal').click(function() {
                        name = $(this).parent().find('input').val();
                        did = $(this).data('did');
                        cid  = $(this).data('cid');
                        request('<?= WEB_FOLDER ?>/admin/goals/new', {did: did, cid: cid, name: name});

                        return false;
                    });


                    $('.btn-edit-goal').click(function() {
                        cid  = $(this).data('cid');
                        gid  = $(this).data('gid');
                        name = $(this).parent().find('span').html();
                        //tạo request
                        request('<?= WEB_FOLDER ?>/admin/goals/edit', {gid: gid, name: name, cid: cid});
                        //Ngăn cản sự kiện của link
                        return false;
                    });
                });

            }(jQuery));
        </script>    
    </div><div class="clearfix"></div></div>
    <?php include PATH_VIEW . '/Admin/Share/Footer.php' ?>
</body>

</html>