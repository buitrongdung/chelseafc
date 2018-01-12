<!DOCTYPE html>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Form đăng nhập</title>
    <link href="../../public/css/login.css" type="text/css" rel="stylesheet">
    <script type="application/javascript" src="../../public/js/function_login.js"></script>
</head>
<body>
<div style="color: white; border: solid 1px #1269ff;width: 150px;height: 150px">
    <table>
        <tr><?php echo (isset($show['food']) ? $show['food'] : ''); ?></tr>
        <tr><?php echo (isset ($show['price']) ? $show['price'] : ''); ?> </tr>
    </table>
</div>
</body>
</html>