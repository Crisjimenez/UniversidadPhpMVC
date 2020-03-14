/*
patron = /\d/; // Solo acepta números
patron = /\w/; // Acepta números y letras
patron = /\D/; // No acepta números
patron =/[A-Za-zñÑ\s]/; // Acepta letras minusculas y mayusculas + ñ y Ñ + espacio


NOTA: PARA REALIZAR LA VALIDACIÓN SE DEBE EJECUTAR EN UN onkeypress ejm:
recuerda importar el jsp

onkeypress="return validarDecimales(event);" 
onkeypress="return validarNumeros(event)"
onkeypress="return validarAlfaNum(event)"
onkeypress="return validarAlfaNumGuion(event)"
onkeypress="return validarNumGuion(event)"

se recomienda agregar para la validacion de longitud ambos onkey por seguridad
onkeydown="return maximaLongitud(this,120);" onkeyup="return maximaLongitud(this,120)"

*/
//Validación de Solo decimales (Numeros y (.)punto)
function validarDecimales(e) { 
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[\d.]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

//validación de Solo Números
function validarNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[\d]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

//validación de Alfa-Numericos
function validarAlfaNum(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[\w\s]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

//validación de Alfa-Numericos + guion(-)
function validarAlfaNumGuion(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[\w-]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

//validacion de Num Guion
function validarNumGuion(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[\d-]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

//validacion de solo Letras
function validarLetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-z ñ Ñ \s]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function maximaLongitud(texto,maxlong) {
    var tecla, in_value, out_value; 
    if (texto.value.length > maxlong) {
    in_value = texto.value;
    out_value = in_value.substring(0,maxlong);
    texto.value = out_value;
    return false;
}
    return true;
}
