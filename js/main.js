onClickNextTurn = (event) => {
    console.log('next turn');
    fetch('run')
        .then(response => response.json())
        .then(gameData => {
            console.log(gameData);
            const persoDisplay = document.getElementById('persos');
            gameData.personnages.forEach((perso) => {
                const li = document.createElement('li');
                li.innerHTML = perso.nom;

                persoDisplay.appendChild(li);
            });
        });
}

document.addEventListener('DOMContentLoaded', () => {
    console.log('Game started')

    const appElement = document.getElementById('app');
    appElement.addEventListener('click', onClickNextTurn);
});
