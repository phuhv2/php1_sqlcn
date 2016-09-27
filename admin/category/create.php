<html>
    <head>
        <meta charset="UTF-8">
        <title>Category</title>
        <script src="../plugins/tinymce/js/tinymce/tinymce.min.js"></script>
    </head>
    <body>
        <?php include '../access.php'; ?>
<form method="post" action="" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Cate_Name: </td>
            <td><input type="text" name="cate_name"></td>
        </tr>
        <tr>
            <td>Description: </td>
            <td>
                <script type="text/javascript">
                  tinymce.init({ 
                    selector: '#noi_dung', 
                    theme: 'modern',
                    width: 800, 
                    height: 300,
                    plugins: [ 
                      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                      'save table contextmenu directionality emoticons template paste textcolor jbimages'
                    ],
                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons jbimages',
                    relative_urls: false
                  });
                </script>
                  <textarea id="noi_dung" name="description" ></textarea>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"></td>
            <td><input type="submit" value="Create" name="post"></td>
        </tr>
    </table>
</form>
<?php
    if (isset($_POST['post'])) {
        $cate_name = $_POST['cate_name'];
        $desc = $_POST['description'];
        $user_id = $_SESSION['user_id'];
                
        include '../../config.php';
        mysql_query("insert into category(cate_name, description, user_id) values('$cate_name','$desc', '$user_id')") or die('loi truy van');
        header('location: index.php');
    }
?>
    </body>
</html>