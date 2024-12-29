document.addEventListener('DOMContentLoaded', function() {
    const pdfUrls = [
        '/Ternak_otot-master\pdf\ABS WORKOUT.pdf',
        'https://example.com/pdf2.pdf',
        // Add more PDF URLs here
    ];

    const cardContainer = document.querySelector('.card-container');

    pdfUrls.forEach(url => {
        const card = document.createElement('div');
        card.classList.add('card');

        const img = document.createElement('img');
        img.src = 'https://via.placeholder.com/200'; // Placeholder image
        img.alt = 'Legs.jpg';
        card.appendChild(img);

        const title = document.createElement('div');
        title.classList.add('card-title');
        title.textContent = 'ABS WORKOUT'; // Replace with actual title or URL
        card.appendChild(title);

        cardContainer.appendChild(card);
    });
});
