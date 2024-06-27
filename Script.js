document.getElementById('reservation-form').addEventListener('submit', async function(event) {
    event.preventDefault();

    const eventValue = document.getElementById('event').value;
    const quantityValue = document.getElementById('quantity').value;

    const response = await fetch('/reserve', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ event: eventValue, quantity: quantityValue })
    });

    const result = await response.text();
    alert(result);
});




