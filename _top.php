<!DOCTYPE html>
<html>
    <head>
        <title>Test page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            h1 {
                font-size: 120%;
                font-family: Verdana, Arial, Helvetica, sans-serif;
                color: #333366;
            }
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px dotted black;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            .preview{
                max-height: 100px;
            }
            a {
                text-decoration: none;
            }
            a:hover, h1:hover{
                opacity: 0.7;
            }
            .btn {
                display: inline-block;
                background: #8C959D;
                color: #fff;
                padding: 0.7rem 1.2rem;
                text-decoration: none;
                border-radius: 3px;
                margin-bottom: 5px;
                cursor:pointer;
            }
            .input{
                width:200px;
                height: 40px;
            }

            .row {
                overflow: hidden; /* Отменяем обтекание */
            }
            .sidebar, .content {
                float: left; /* Формируем колонки */
                box-sizing: border-box; /* padding не влияет на ширину */
                padding: 10px; /* Поля вокруг текста */
                min-height: 100px; /* Минимальная высота */
            }
            .sidebar {
                width: 30%; /* Ширина колонки */
                min-width: 200px;
            }
            .content {
                width: 70%; /* Ширина колонки */
            }

            .big-img{
                max-width: 200px;
            }
        </style>
    </head>
    <body>
