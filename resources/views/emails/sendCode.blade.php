<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <style>
        .principal {
            margin-top: 10%;
            width: 100%;
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .caja {
            padding: 2%;
            display: table;
            background-color: #0284c7;
            border-radius: 5px;
            box-shadow: 1px 1px 2px rgb(22, 22, 22);
        }

        .titulo {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 60px;
            font-weight: 500;
            color: white;
            text-shadow: 3px 1px 4px black;
        }

        .caja2 {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .input {
            margin-top: 2%;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 1%;
            text-align: center;
            color: white;
            background-color: #0284c7;
            border: none;
            text-shadow: 3px 1px 4px black;
            font-size: 30px;

        }
    </style>
</head>

<body style="width: fit-content; justify-items: center">
    <div class="principal">
        <div class="caja">
            <h1 class="titulo">
                Código de Restablecimiento
            </h1>
            <div class="caja2">
                <input class="input" type="text" value="{{ $resetCode }}" name="codigo" disabled />
            </div>
        </div>
    </div>
</body>

</html>
