/******************************************************************************
 Genera un número aleatorio entre 0 y 99 y lo presenta en la página mostrando 5
 decimales y los ceros a la izquierda incluidos. Por ejemplo, el número
 1.3909043944 se mostraría como 01.39090.

 El resultado se mostrará en la página html mediante la instrucción
 document.getElementById("resultado").innerHTML = strResultado.
*****************************************************************************/
function muestraEjercicio() {
    // generamos un número entre 0 y 99.00000
    var num =Math.floor(9900001*Math.random())*0.00001;
    // convertimos el número generado en un string con 5 decimales
    num = num.toFixed(5);
    // si el valor del número es menor que 10 le áñadimos el 0 por delante
    if (parseInt(num)<10) {
        num = "0"+num;
    }
    // Mostramos el resultado
    var strResultado = "<p><b>Número generado</b>: " + num + "</p>";
    document.getElementById("resultado").innerHTML = strResultado;
}
