<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <output></output>
    <input type="text">

    <script>
        const socket = new WebSocket("ws://" + location.host + "/");

        input = document.querySelector('input')
        output = document.querySelector('output')

        socket.addEventListener('open', console.log)
        input.addEventListener('keypress', e => {
            if (e.code == 'Enter') {
                console.log(input.value)
            }
        })
    </script>
</body>
</html>