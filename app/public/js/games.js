function addGame() {
    const newGame = {
        title: document.getElementById('title').value,
        publisher: document.getElementById('publisher').value,
        genre: document.getElementById('genre').value,
        description: document.getElementById('description').value,
        image: document.getElementById('image').files.item(0).name,

    };
    console.log(newGame);
    fetch('http://localhost/api/game', {
        method: 'POST',
        //mode: 'no-cors',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(newGame),
    }).catch(err => console.error(err));

    appendGame(newGame);
    document.getElementById('add-game').style.display = 'none';
    document.getElementById('add-game').reset();
}

function loadData() {
    fetch('http://localhost/api/game')
        .then(response => response.json())
        .then((games) => {

            games.forEach(element => {
                appendGame(element);
            });

            console.log('Output: ', games);
        }).catch(err => console.error(err));
}

function appendGame(game) {
    //create the card and the row that contains it's contents
    const gamecol = document.createElement('div');
    gamecol.className = 'col-4';
    const gameslist = document.getElementById('gamelist');
    const gamecard = document.createElement('div');
    gamecard.className = 'card mb-5';
    gamecard.style.maxWidth = '540px';
    const cardRow = document.createElement('div');
    cardRow.className = 'row g-0'
        //create the image elements
    const imagecol = document.createElement('div');
    imagecol.className = 'col-md-4';
    const image = document.createElement('img');
    image.src = '/image/' + game.image;
    image.className = 'img-fluid rounded-start';
    image.alt = 'Loading image...';
    //create the body of the game (title and genre)
    const bodycol = document.createElement('div');
    bodycol.className = 'col-md-8';
    const body = document.createElement('div');
    body.className = 'card-body';
    const title = document.createElement('h5');
    title.className = 'card-title';
    title.innerHTML = game.title;
    const gamegenre = document.createElement('p');
    gamegenre.className = 'card-text';
    gamegenre.innerHTML = game.genre;
    //Append the game data and the image to the correct columns
    body.appendChild(title);
    body.appendChild(gamegenre);
    bodycol.appendChild(body);
    imagecol.appendChild(image);
    //Append the columns to the row and the row to the card
    cardRow.appendChild(imagecol);
    cardRow.appendChild(bodycol);
    gamecard.appendChild(cardRow);
    gamecol.appendChild(gamecard);
    //Add the game to the list.
    gameslist.prepend(gamecol);
}


loadData();