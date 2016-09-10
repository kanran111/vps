<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <table border=1px>
            <tr><th>ID</th><th>Tên</th></tr>
            <?php foreach($row as $hoa){ ?>
                <tr>
                    <td><?=$hoa['idSP']?></td>
                    <td><?=$hoa['TenSP']?></td>
                </tr>
            <?php } ?>
            <?php 
                echo $page_list;
            ?>
        </table>
        
    </body>
</html>