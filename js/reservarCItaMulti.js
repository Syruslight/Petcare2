var currentStep = 1;
var form = document.getElementById('multipasos-form');
var progressBar = document.querySelector('.progress');

function updateProgressBar() {
    var totalSteps = document.querySelectorAll('.step').length;
    var progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
    progressBar.style.width = progressPercentage + '%';
}

function nextStep(step) {
    document.getElementById('step' + step).classList.remove('active');
    document.getElementById('step' + (step + 1)).classList.add('active');
    currentStep = step + 1;
    updateProgressBar();
}

function prevStep(step) {
    document.getElementById('step' + step).classList.remove('active');
    document.getElementById('step' + (step - 1)).classList.add('active');
    currentStep = step - 1;
    updateProgressBar();
}

form.addEventListener('submit', function(event) {
    event.preventDefault();
    // Aquí puedes agregar la lógica para procesar los datos del formulario
    alert('Formulario enviado correctamente');
});