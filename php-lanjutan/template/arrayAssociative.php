<?php
$assocArray = [
    [
        "nama" => "Dwi julianto",
        "nohp" => "08999999999",
        "email" => "dwigesoz@gmail.com",
        "img" => "man.png",
        "nilai" => [8,9,8,8]
    ],
    [
        "nama" => "Tyas arumdani",
        "nohp" => "08999988888",
        "email" => "tyas@gmail.com",
        "img" => "boy.png",
        "nilai" => [8,9,8,9]
    ],
    [
        "nama" => "Yudhistira",
        "nohp" => "0899997777",
        "email" => "Yudhistira@gmail.com",
        "img" => "japanese.png",
        "nilai" => [8,9,8,10]
    ],
    [
        "nama" => "Agus kukuh",
        "nohp" => "08999977444",
        "email" => "agus@gmail.com",
        "img" => "chinese.png",
        "nilai" => [7,9,8,10]
    ]
    ];
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Array Associative</title>
        <style>
            *{
                box-sizing:border-box;
            }
            .container{
                margin:100px ;

            }
            img{
                height:100px;
                width:100px;
                border:1px solid black;
                border-radius:50%;
            }
            .item{
                float:left;
                border-radius:5px;
                border:1px solid black;
                margin:2px ;
                text-align: center;
                padding: 20px;
            }
            span{
                margin: 3px;
                padding:10px;
                background-color: orange;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php foreach($assocArray as $item) :?>
            <div class="item">
                <img src=<?= "img/".$item["img"]?> alt="">
                <h3><?=$item["nama"]?></h3>
                <p><?=$item["email"]?></p>
                <p><?=$item["nohp"]?></p>
                <h5>Nilai</h5>
                 
                    <?php foreach($item["nilai"] as $n) :?>
                        <span><?=$n?></span>
                    <?php endforeach;?>
            </div>
            <?php endforeach;?>
        </div>
    </body>
    </html>