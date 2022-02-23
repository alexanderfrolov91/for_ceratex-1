<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>q98517su.beget.tech/test/1.php</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Возраст</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input id="name" name="name" type="text" value="" />
                </td>
                <td>
                    <input id="surname" name="surname" type="text" value="" />
                </td>
                <td>
                    <input id="age" name="age" type="number" value="" />
                </td>
            </tr>
        </tbody>
    </table>
    <input id="save" name="save" type="button" value="Сохранить" />
    <input id="send" name="send" type="button" value="Выгрузить" />
    <div id="text"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $('#save').click(function() {
            let name = $('#name').val();
            let surname = $('#surname').val();
            let age = $('#age').val();
            $.ajax({
                url: 'save.php',
                method: 'post',
                data: {
                    name : name,
                    surname : surname,
                    age : age,
                },
                success: function(data){
                    $('#text').html(data);
                }
            });
        });
        $('#send').click(function() {
            $.ajax({
                url: 'send.php',
                success: function(){
                    $('#text').html('<a href="https://docs.google.com/spreadsheets/d/1e_3K46IF55mAaInf1-6o1D_2fJPKosZfpcmVWNWMKF8/edit#gid=0" target="_blank">link</a>');
                }
            });
        });
    </script>
</body>
</html>