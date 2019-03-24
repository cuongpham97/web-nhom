<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title><?php if(isset($title)) echo $title ?></title>
    
    <link rel="stylesheet" href="<?= WEB_FOLDER ?>/public/admin/normalize.min.css">
    <link rel="stylesheet" href="<?= WEB_FOLDER ?>/public/lib/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= WEB_FOLDER ?>/public/admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= WEB_FOLDER ?>/public/admin/assets/css/style.css">
    <script type="text/javascript" src="<?= WEB_FOLDER ?>/public/lib/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?= WEB_FOLDER ?>/public/Lib/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?= WEB_FOLDER ?>/public/js/config-cmt-editor.js"></script>

    <style>
        .form-control:focus {   
            border-color: rgba(229, 103, 23, 0.8);
            box-shadow: 0 1px 1px rgba(229, 103, 23, 0.075) inset, 0 0 8px rgba(229, 103, 23, 0.6);
            outline: 0 none;
        }

        .card, .navbar {
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        }
    </style>
</head>