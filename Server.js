const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');

const app = express();

mongoose.connect('mongodb://localhost:27017/olympic-tickets', { useNewUrlParser: true, useUnifiedTopology: true });

const reservationSchema = new mongoose.Schema({
    event: String,
    quantity: Number
});

const Reservation = mongoose.model('Reservation', reservationSchema);

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.post('/reserve', async (req, res) => {
    const { event, quantity } = req.body;
    const reservation = new Reservation({ event, quantity });
    await reservation.save();
    res.send('Reservation successful!');
});

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});
