<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <style>
        .review { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .name { font-weight: bold; }
        .rating { color: #f39c12; }
    </style>
</head>
<body>
    <h1>Reviews</h1>
    <div id="reviewsContainer">Loading reviews...</div>

    <script>
        // Fetch reviews from API
        fetch('/api/feedback')
            .then(res => res.json())
            .then(res => {
                const container = document.getElementById('reviewsContainer');
                container.innerHTML = ''; // clear loading text

                if(res.data.length === 0){
                    container.innerHTML = '<p>No reviews yet.</p>';
                    return;
                }

                res.data.forEach(feedback => {
                    const div = document.createElement('div');
                    div.classList.add('review');
                    div.innerHTML = `
                        <div class="name">${feedback.name}</div>
                          ${feedback.rating ? `<div class="rating">Rating: ${feedback.rating}/5</div>` : ''}
                          ${feedback.rating ? `<div class="rating">${'★'.repeat(feedback.rating)}${'☆'.repeat(5 - feedback.rating)}</div>` : ''}

                        <div class="message">${feedback.message}</div>
                    `;
                     container.appendChild(div);
                });
            })
            .catch(err => {
                console.error(err);
                document.getElementById('reviewsContainer').innerHTML = 'Failed to load reviews.';
            });

            res.data.forEach(feedback => {
    const div = document.createElement('div');
    div.classList.add('review');

    div.innerHTML = `
        <div class="name">${feedback.name}</div>
        ${feedback.rating ? `<div class="rating">${'★'.repeat(feedback.rating)}${'☆'.repeat(5 - feedback.rating)}</div>` : ''}
        <div class="message">${feedback.message}</div>
    `;

    container.appendChild(div);
});


            
    </script>
</body>
</html>
