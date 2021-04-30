const allInputs = document.querySelectorAll('input');
for (const input of allInputs) {
    input.addEventListener('input', () => {
        const val = input.value
        if (!val) {
            input.parentElement.classList.add('empty')
        } else {
            input.parentElement.classList.remove('empty')
        }
    })
}

function makeblue(){
    elmt= document.getElementById('genderlabel');
    elmt.className.remove('text-gray-600');
    elmt.classList.add('text-blue-600');
    e2=document.getElementById('gender');
    e2.className.remove('border-gray-300');
    e2.classList.add('border-blue');
}

