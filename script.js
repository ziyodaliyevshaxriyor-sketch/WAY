document.getElementById('truckingForm').addEventListener('submit', function(e){
    e.preventDefault();
    const formData = new FormData(this);
    fetch('send_email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert('Application submitted successfully!');
        document.getElementById('truckingForm').reset();
    })
    .catch(error => {
        alert('Error submitting form.');
        console.error(error);
    });
});
