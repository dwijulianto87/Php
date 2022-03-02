


<!-- penulisan sintaks php -->
<!-- 1. php didalam html -->
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php didalam html</title>
</head>
<body>
    <h1>Hello <?php echo " nama saya $myname"; ?>, Selamat datang</h1>
    <h1>Hello <?= " nama saya $myname"; ?>, Selamat datang</h1>

</body>
</html>  -->



<!-- 2. html didalam php (tidak disarankan) -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>html didalam php</title>
</head>
<body>
    <?php echo '<h1>html didalam php (tidak disarankan)</h1>'; ?>
</body>
</html> -->



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengulangan</title>
    <style>
        table{
            margin:auto;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php 
            for($i=0; $i < 5; $i++){
               echo "<tr>";
               for($x=0; $x < 5; $x++){
                   echo "<td>$i,$x</td>";
               }
               echo "</tr>";
       } ?>
    </table>
</body>
</html> -->




<!-- templating -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengulangan</title>
    <style>
        table{
            margin:auto;
        }
        .orange{
            background-color: orange;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
    <?php for($i=0; $i < 5; $i++) : ?>
        <tr>
            <?php for($x=0; $x < 5; $x++) : ?>
                <?php if($x % 2 === 0) :?>
                    <td class="orange"><?= $i,$x; ?></td>
                <?php else : ?>
                    <td><?= $i,$x; ?></td>
                <?php endif; ?>
            <?php endfor; ?>
        </tr>
       <?php endfor; ?>
    </table>
</body>
</html>

