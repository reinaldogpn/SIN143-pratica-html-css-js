const cards = document.querySelectorAll('.memory-card');

let hasFlippedCard = false;
let lockBoard = false;
let firstCard, secondCard;

let timeElapsed = 0;
let timerInterval;

function startTimer() {
    timerInterval = setInterval(() => {
        timeElapsed++;
        updateTimerDisplay();
    }, 1000);
}

function stopTimer() {
    clearInterval(timerInterval);
}

function updateTimerDisplay() {
    const hours = Math.floor(timeElapsed / 3600);
    const minutes = Math.floor((timeElapsed % 3600) / 60);
    const seconds = timeElapsed % 60;
    const timerDisplay = document.querySelector('.timer');
    timerDisplay.textContent = `${formatTime(hours)}:${formatTime(minutes)}:${formatTime(seconds)}`;
}

function formatTime(time) {
    return time < 10 ? `0${time}` : time;
}

// Chame a função startTimer() para iniciar o cronômetro
startTimer();

function flipCard() {

    if (lockBoard) return;
    if (this === firstCard) return;

    this.classList.add('flip');

    // Primeira carta
    if (!hasFlippedCard) {
        hasFlippedCard = true;
        firstCard = this;

        return;
    }

    // Segunda carta
    hasFlippedCard = false;
    secondCard = this;

    checkForMatch();
}

function checkForMatch() {
    let isMatch = firstCard.dataset.framework === secondCard.dataset.framework;

    isMatch ? disableCards() : unflipCards();

    // Verificar se todas as cartas foram combinadas
    const allMatched = document.querySelectorAll('.memory-card.matched');
    if (allMatched.length === cards.length) {
        stopTimer(); // Parar o cronômetro
    }
}

function disableCards() {
    firstCard.classList.add('matched'); // Adicionar a classe .matched na primeira carta
    secondCard.classList.add('matched'); // Adicionar a classe .matched na segunda carta
    firstCard.removeEventListener('click', flipCard);
    secondCard.removeEventListener('click', flipCard);

    resetBoard();
}

function unflipCards() {
    lockBoard = false;

    setTimeout(() => {
        firstCard.classList.remove('flip');
        secondCard.classList.remove('flip');

        resetBoard();
    }, 1500);
}

function resetBoard() {
    [hasFlippedCard, lockBoard] = [false, false];
    [firstCard, secondCard] = [null, null];
}

function shuffle() {
    cards.forEach(card => {
        let randomPos = Math.floor(Math.random() * 12);
        card.style.order = randomPos;
    });
}

cards.forEach(
    card => card.addEventListener('click', flipCard)
);

shuffle();