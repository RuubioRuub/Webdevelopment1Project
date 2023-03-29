function addReview() {
    const newReview = {
        title: document.getElementById('title').value,
        writer: 'Anonymous',
        company: 'NONE',
        score: document.getElementById('score').value,
        body: document.getElementById('body').value,
        criticreview: false,
        gameID: id
    };

    fetch('http://localhost/api/reviews', {
        method: 'POST',
        //mode: 'no-cors',
        headers: {
            'Content-Type': 'application/json',

        },
        body: JSON.stringify(newReview),
    }).catch(err => console.error(err));

    appendReview(newReview);
}

function loadData() {
    fetch('http://localhost/api/reviews')
        .then(response => response.json())
        .then((reviews) => {

            reviews.forEach(element => {
                appendReview(element);
            });

            console.log('Output: ', reviews);
        }).catch(err => console.error(err));
}

function appendReview(review) {
    //create the card and the row that contains it's contents
    const reviewList = document.getElementById('reviewslist');
    const reviewCard = document.createElement('div');
    reviewCard.className = 'card';
    const cardRow = document.createElement('div');
    cardRow.className = 'row g-0'
        //create the score elements
    const scorecol = document.createElement('div');
    scorecol.className = 'col-md-2';
    const score = document.createElement('div');
    score.className = 'score';
    const scoretext = document.createElement('p');
    scoretext.innerHTML = review.score;
    //create the body of the review (title and content)
    const bodycol = document.createElement('div');
    bodycol.className = 'col-md-8';
    const body = document.createElement('div');
    body.className = 'card-body';
    const title = document.createElement('h5');
    title.className = 'card-title';
    title.innerHTML = review.title;
    const reviewbody = document.createElement('p');
    reviewbody.className = 'card-text';
    reviewbody.innerHTML = review.body;
    //Append the review data and the score to the correct columns
    body.appendChild(title);
    body.appendChild(reviewbody);
    bodycol.appendChild(body);
    score.appendChild(scoretext);
    scorecol.appendChild(score);
    //Append the columns to the row and the row to the card
    cardRow.appendChild(scorecol);
    cardRow.appendChild(bodycol);
    reviewCard.appendChild(cardRow);
    //Add the review to the list. Reverse chronological so newer reviews are on top
    reviewList.prepend(reviewCard);
}

loadData();