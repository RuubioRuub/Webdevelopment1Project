function addReview() {
    const enteredscore = document.getElementById('score').value;
    if (enteredscore < 0 || enteredscore > 100) {
        alert("Score must be between 0 and 100");
        return;
    }
    const companySpan = document.getElementById('company') //companySpan is only created when a critic is logged in and writing a review
    var companyName = 'none';
    var iscritic = false;
    if (companySpan !== null) {
        companyName = document.getElementById('company').innerText;
        iscritic = true;
    }
    const newReview = {
        title: document.getElementById('title').value,
        writer: document.getElementById('username').innerText,
        company: companyName,
        score: enteredscore,
        body: document.getElementById('body').value,
        criticreview: iscritic,
        gameID: id
    };
    console.log(newReview);
    fetch('http://localhost/api/reviews', {
        method: 'POST',
        //mode: 'no-cors',
        headers: {
            'Content-Type': 'application/json',

        },
        body: JSON.stringify(newReview),
    }).catch(err => console.error(err));

    appendReview(newReview);
    document.getElementById('write-review').style.display = 'none';
    document.getElementById('write-review').reset();
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
    reviewCard.className = 'card review-card';
    const cardRow = document.createElement('div');
    cardRow.className = 'row g-0'
        //create the score elements
    const scorecol = document.createElement('div');
    scorecol.className = 'col-md-2';
    const score = document.createElement('div');
    score.className = 'score';
    if (review.score < 40) {
        score.className += ' low';
    } else if (review.score < 80) {
        score.className += ' mid';
    }
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
    const writer = document.createElement('span');
    writer.className = 'writer';
    writer.innerHTML = ' - by ' + review.writer;
    if (review.criticreview)
        writer.innerHTML += ', ' + review.company;
    const reviewbody = document.createElement('p');
    reviewbody.className = 'card-text';
    reviewbody.innerHTML = review.body;
    //Append the review data and the score to the correct columns
    title.appendChild(writer);
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