document.querySelectorAll('.open-form-button').forEach(button => {
    button.addEventListener('click', () => {
        document.getElementById('inputForm').style.display = 'block';
    });
});

document.getElementById('dataForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let data = new FormData(this);

    fetch('insertData.php', {
        method: 'POST',
        body: data
    }).then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error(error));
});