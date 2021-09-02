<html>
    <head>
        <title>Drop Down</title>
        <style>
            *{
                padding: 0;margin: :0;
            }
            ul{
                list-style: none;
            }
            ul li{
                float: left;padding-right: 1px;position: relative;text-align: center;
            }
            ul a{
                display: table-cell;vertical-align: middle;width: 100px;height: :50px;text-align: :center;background-color:darkslategrey;color: #yyy;text-decoration: none;
            }
            ul a:hover{
                background: #09c;
            }
            li > ul{
                display: none;position: absolute;left: 0;top: 100%;
            }
            li:hover > ul{
                display: block;
            }
            li > ul li{
                padding: 0;padding-top: 1px;
            }
            li > ul li >ul {
                left:100%;top:0;padding-left: 1px;
            }
            li > ul li > ul li{
                width: 100px;
            }
            li:hover > a{
                background: #09c;
            } 
        </style>
    </head>
    <body>
        <div class="fil">
        <ul><li><a href="">0</a>
        <ul>
            <li><a href="">1</a></li>
            <li><a href="">2</a>
                <ul>
                    <li><a href="">4</a></li>
                    <li><a href="">5</a>
                        <ul>
                            <li><a href="">6</a></li>
                            <li><a href="">7</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="">3</a></li>
        </ul>
            </li>
        </ul>
        </div>
    </body>
</html>