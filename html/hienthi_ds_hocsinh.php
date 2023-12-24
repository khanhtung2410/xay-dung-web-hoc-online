<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <link rel="stylesheet" type="text/css" href="../css/add-test.css">
</head>
<?php
include("./config.php");

?>
<style>
    a {
        text-decoration: none;
        position: relative;
        color: rgb(85, 83, 83);
        font-size: 14px;
        display: table;
        padding: 10px;
    }
    .action{
        display: flex;
        text-decoration: none;
    }
    .fix{
        color: #fdbc24;
    }
    .delete{
        color: red;
    }
</style>

<body>
    <button class="nextpage"><a href="/html/admin.php">HOME</a></button>
    <div class="listing">
        <h1>Danh sách học sinh</h1>
        <div class="container">
            <table>
                <thead>
                    <tr class="table_header">
                        <th class="hd"><a href="#" class="filter__link filter__link--number" id="id">ID</a></th>
                        <th class="hd"><a href="#" class="filter__link filter__link--number">Họ tên</a></th>
                        <th class="hd"><a href="#" class="filter__link filter__link--number">CCCD</a></th>
                        <th class="hd"><a href="#" class="filter__link filter__link--number">Giới tính</a></th>
                        <th class="hd"><a href="#" class="filter__link filter__link--number">Gmail</a></th>
                        <th class="hd"><a href="#" class="filter__link filter__link--number">Active</a></th>
                        <th class="hd"><a href="#" class="filter__link filter__link--number">Thao tác</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM user ";
                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><?php echo $row['CCCD']; ?></td>
                            <td><?php echo $row['Gender']; ?></td>
                            <td><?php echo $row['Gmail']; ?></td>
                            <td><?php echo $row['Active']; ?></td>
                            <td class="action">
                                <a class="delete" onclick="return confirm('Bạn có muốn xóa không?');" href="delete_student.php?id=<?php echo $row['ID']; ?>" class="btn">Xóa</a>
                            </td>
                        </tr>
                    <?php
                    }

                    $db->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
    var properties = [
        'ID',
    ];

    $.each(properties, function(i, val) {

        var orderClass = '';

        $("#" + val).click(function(e) {
            e.preventDefault();
            $('.filter__link.filter__link--active').not(this).removeClass('filter__link--active');
            $(this).toggleClass('filter__link--active');
            $('.filter__link').removeClass('asc desc');

            if (orderClass == 'desc' || orderClass == '') {
                $(this).addClass('asc');
                orderClass = 'asc';
            } else {
                $(this).addClass('desc');
                orderClass = 'desc';
            }

            var parent = $(this).closest('.hd');
            var index = $(".hd").index(parent);
            var $table = $('tbody');
            var rows = $table.find('tr').get();
            var isSelected = $(this).hasClass('filter__link--active');
            var isNumber = $(this).hasClass('filter__link--number');

            rows.sort(function(a, b) {

                var x = $(a).find('td').eq(index).text();
                var y = $(b).find('td').eq(index).text();

                if (isNumber == true) {

                    if (isSelected) {
                        return x - y;
                    } else {
                        return y - x;
                    }

                } else {

                    if (isSelected) {
                        if (x < y) return -1;
                        if (x > y) return 1;
                        return 0;
                    } else {
                        if (x > y) return -1;
                        if (x < y) return 1;
                        return 0;
                    }
                }
            });

            $.each(rows, function(index, row) {
                $table.append(row);
            });

            return false;
        });

    });
</script>

</html>