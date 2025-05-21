// Notas declaradas directamente
const parcial1 = 12;
const parcial2 = 15;
const proyectoFinal = 18;

// Cálculo de la nota final
const notaFinal = (parcial1 * 0.3) + (parcial2 * 0.3) + (proyectoFinal * 0.4);

// Mostrar la nota en la página
const notaElemento = document.getElementById("notaFinal");
const mensajeElemento = document.getElementById("mensaje");

notaElemento.textContent = `Nota Final: ${notaFinal.toFixed(2)} / 20`;
mensajeElemento.className = "resultado"; // limpia clases previas

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
