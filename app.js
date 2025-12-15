let operationHistory = [];

const calculatorForm = document.getElementById('calculator-form');
const numberAInput = document.getElementById('numberA');
const numberBInput = document.getElementById('numberB');
const operationSelect = document.getElementById('operation');
const calculateBtn = document.getElementById('calculate-btn');
const resultDisplay = document.getElementById('result');
const errorMessagesDiv = document.getElementById('error-messages');
const historyList = document.getElementById('history-list');
const clearHistoryBtn = document.getElementById('clear-history');
const exportHistoryBtn = document.getElementById('export-history');

function validateInputs(numberA, numberB, operation) {
    const errors = [];
    
    if (numberA === '' || numberB === '') {
        errors.push('Les deux nombres doivent être renseignés.');
    }
    
    if (operation === 'divide' && parseFloat(numberB) === 0) {
        errors.push('La division par zéro est impossible.');
    }
    
    if (numberA !== '' && isNaN(parseFloat(numberA))) {
        errors.push('Le nombre A doit être une valeur numérique valide.');
    }
    
    if (numberB !== '' && isNaN(parseFloat(numberB))) {
        errors.push('Le nombre B doit être une valeur numérique valide.');
    }
    
    return errors;
}

function displayErrors(errors) {
    errorMessagesDiv.innerHTML = '';
    
    if (errors.length === 0) {
        return;
    }
    
    errors.forEach(error => {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${error}`;
        errorMessagesDiv.appendChild(errorDiv);
    });
}

function calculate(numberA, numberB, operation) {
    const a = parseFloat(numberA);
    const b = parseFloat(numberB);
    
    let result;
    let operationSymbol;
    
    switch(operation) {
        case 'add':
            result = a + b;
            operationSymbol = '+';
            break;
        case 'subtract':
            result = a - b;
            operationSymbol = '−';
            break;
        case 'multiply':
            result = a * b;
            operationSymbol = '×';
            break;
        case 'divide':
            result = a / b;
            operationSymbol = '÷';
            break;
        default:
            result = 0;
            operationSymbol = '?';
    }
    
    return { result, operationSymbol };
}

function formatResult(numberA, numberB, operationSymbol, result) {
    return `${numberA} ${operationSymbol} ${numberB} = <strong>${result}</strong>`;
}

function addToHistory(numberA, numberB, operationSymbol, result) {
    const historyItem = {
        id: Date.now(),
        numberA,
        numberB,
        operationSymbol,
        result,
        date: new Date().toLocaleString('fr-FR')
    };
    
    operationHistory.unshift(historyItem);
    updateHistoryDisplay();
}

function updateHistoryDisplay() {
    historyList.innerHTML = '';
    
    if (operationHistory.length === 0) {
        historyList.innerHTML = '<p class="empty-history">Aucune opération effectuée</p>';
        return;
    }
    
    operationHistory.forEach(item => {
        const historyItem = document.createElement('div');
        historyItem.className = 'history-item';
        historyItem.innerHTML = `
            <span class="history-operation">${item.numberA} ${item.operationSymbol} ${item.numberB}</span>
            <span class="history-result">${item.result}</span>
            <span class="history-date">${item.date}</span>
        `;
        historyList.appendChild(historyItem);
    });
}

function clearHistory() {
    operationHistory = [];
    updateHistoryDisplay();
    
    resultDisplay.innerHTML = '<p><i class="fas fa-check-circle"></i> Historique effacé avec succès</p>';
    resultDisplay.className = 'result-display success';
}

function exportHistory() {
    if (operationHistory.length === 0) {
        resultDisplay.innerHTML = '<p><i class="fas fa-exclamation-circle"></i> Aucune donnée à exporter</p>';
        resultDisplay.className = 'result-display error';
        return;
    }
    
    let exportContent = 'Historique des calculs\n';
    exportContent += '====\n\n';
    
    operationHistory.forEach(item => {
        exportContent += `${item.date}: ${item.numberA} ${item.operationSymbol} ${item.numberB} = ${item.result}\n`;
    });
    

    const blob = new Blob([exportContent], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `historique-calculs-${new Date().toISOString().slice(0, 10)}.txt`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
    

    resultDisplay.innerHTML = `<p><i class="fas fa-check-circle"></i> Historique exporté (${operationHistory.length} opérations)</p>`;
    resultDisplay.className = 'result-display success';
}

calculatorForm.addEventListener('submit', function(e) {
    e.preventDefault();
    

    const numberA = numberAInput.value.trim();
    const numberB = numberBInput.value.trim();
    const operation = operationSelect.value;
    

    const errors = validateInputs(numberA, numberB, operation);
    
    if (errors.length > 0) {
        displayErrors(errors);
        resultDisplay.innerHTML = '<p><i class="fas fa-exclamation-triangle"></i> Des erreurs ont été détectées</p>';
        resultDisplay.className = 'result-display error';
        return;
    }
    
    displayErrors([]);
    
    const { result, operationSymbol } = calculate(numberA, numberB, operation);
    
    resultDisplay.innerHTML = `<p>${formatResult(numberA, numberB, operationSymbol, result)}</p>`;
    resultDisplay.className = 'result-display success';
    
    addToHistory(numberA, numberB, operationSymbol, result);
    
    operationSelect.value = 'add';
});

clearHistoryBtn.addEventListener('click', clearHistory);
exportHistoryBtn.addEventListener('click', exportHistory);

window.addEventListener('DOMContentLoaded', function() {
    addToHistory('10', '5', '+', 15);
    addToHistory('20', '4', '÷', 5);
    addToHistory('7', '3', '×', 21);
    
    resultDisplay.innerHTML = '<p>Bienvenue ! Entrez des nombres et choisissez une opération.</p>';
    
    numberAInput.focus();
});

function animateResult() {
    resultDisplay.style.transform = 'scale(1.05)';
    setTimeout(() => {
        resultDisplay.style.transform = 'scale(1)';
    }, 300);
}