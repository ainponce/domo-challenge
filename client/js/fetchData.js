
const getData = document.querySelectorAll('input[type="text"]');
const submitButton = document.querySelector('input[type="button"]');
const data = {};
const url = '../server/scripts/agregar.php';

submitButton.addEventListener('click', () => {
    getData.forEach(element => {
        data[element.name] = element.value;
    });

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'succes') {
                alert(data.message)
            }
            if (data.status === 'error') {
                alert(data.message)
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});