// Evaluación del resultado
if (notaFinal >= 14) {
    mensajeElemento.textContent = "Resultado: Aprobado directamente.";
    mensajeElemento.classList.add("aprobado");
} else if (notaFinal >= 10) {
    mensajeElemento.textContent = "Resultado: Debe ir a recuperación.";
    mensajeElemento.classList.add("recuperacion");
} else {
    mensajeElemento.textContent = "Resultado: Pierde la materia.";
    mensajeElemento.classList.add("perdido");
}

