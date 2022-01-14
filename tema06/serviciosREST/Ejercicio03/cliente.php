<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03 Cambio Monedas</title>
</head>

<body>
    <div id="principal">
        <h1>Calcula tu Cambio de Divisas</h1>
        <form action="." method="get">
            <label for="monedaPrincipal">Moneda Principal: </label>
            <input type="number" name="monedaPrincipal" id="monedaPrincipal">
            <select name="tipoPrincipal" id="tipoPrincipal">
                <option value="libra">Libras</option>
                <option value="euro" selected>Euros</option>
                <option value="dolar">Dolares</option>
            </select>
            <br>
            <label for="nuevaMoneda">Cambiar moneda a:</label>
            <select name="nuevaMoneda" id="nuevaMoneda">
                <option value="libra">Libras</option>
                <option value="euro">Euros</option>
                <option value="dolar" selected>Dolares</option>
            </select>
            <input type="submit" value="Enviar">
        </form>


    </div>
</body>

</html>