let word, hiddenWord;
let badGuesses = 0;
let wordLengthInput = document.getElementById('word_length');
let maxGuessesInput = document.getElementById('max_guesses');


// initialize the game
document.addEventListener('DOMContentLoaded', function() {
    gameOptions();
 }, false);

function newGame() {
    word = getRandomWord();
    hiddenWord = word.replace(/./g, '-');
    badGuesses = 0;
    document.getElementById('word').innerText = hiddenWord;
    document.getElementById('message').innerText = 'Wrong guesses: ' + badGuesses + '/' + (maxGuessesInput === -1 ? 'unlimited' : maxGuessesInput);
    document.getElementById('message').classList.add('text-danger');
    document.getElementById('message').classList.remove('text-success');

    let buttons = document.getElementsByClassName('letter_btn');
    for (let i = 0; i < buttons.length; i++) {
        buttons[i].disabled = false;
        buttons[i].classList.remove('btn-danger');
        buttons[i].classList.remove('btn-success');
        buttons[i].classList.add('btn-primary');
    }
    let wordBg = document.getElementById('word_container');
    wordBg.classList.remove('bg-success');
    wordBg.classList.remove('bg-danger');
}

// get random word from the array
function getRandomWord() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'assets/js/words_alpha.txt', false);
    xhr.send();

    if (xhr.status === 200) {
        const words = xhr.responseText.split('\n');

        let filteredWords = words;
        if (wordLengthInput > 0) {
            filteredWords = words.filter(word => word.trim().length === wordLengthInput);
        }
        // const filteredWords = words.filter(word => word.length === wordLengthInput);
        let randomIndex = Math.floor(Math.random() * filteredWords.length);
        let word = filteredWords[randomIndex];
        filteredWords.splice(randomIndex, 1);

        console.log('Word: ', word);
        return word;
    } else {
        console.error('Failed to fetch words from file');
        return null;
    }


    // const randomIndex = Math.floor(Math.random() * wordsArray.length);
    // let word = wordsArray[randomIndex];
    // wordsArray.splice(randomIndex, 1);
    // return word;
}

// make a guess
function makeGuess(guess) {
    let button = document.getElementById('letter_' + guess);
    button.disabled = true;
    button.classList.remove('btn-primary');
    let newHiddenWord = '';
    let found = false;
    for (let i = 0; i < word.length; i++) {
        if (word[i] === guess) {
            newHiddenWord += guess;
            found = true;
        } else {
            newHiddenWord += hiddenWord[i];
        }
    }

    if (!found) {
        badGuesses++;
        button.classList.add('btn-danger');
    }else{
        button.classList.add('btn-success');
    }

    hiddenWord = newHiddenWord;
    document.getElementById('word').innerText = hiddenWord;
    let message = document.getElementById('message');

    let wordBg = document.getElementById('word_container');
    
    wordBg.classList.remove('bg-success');
    wordBg.classList.remove('bg-danger');
    
    if (hiddenWord === word) {
        message.innerText = 'Congratulations! You won!';
        message.classList.remove('text-danger');
        message.classList.add('text-success');
        
        wordBg.classList.add('bg-success');
    } else if (badGuesses === maxGuessesInput) {
        message.innerText = 'Sorry, you lost!';
        wordBg.classList.add('bg-danger');
        document.getElementById('word').innerText = word;
    } else {
        message.innerText = 'Wrong guesses: ' + badGuesses + '/' + (maxGuessesInput === -1 ? 'unlimited' : maxGuessesInput);
    }
}

function gameOptions() {
    let wordLengthInputVal = document.getElementById('word_length');
    let maxGuessesInputVal = document.getElementById('max_guesses');
    wordLengthInput = parseInt(wordLengthInputVal.value);
    maxGuessesInput = parseInt(maxGuessesInputVal.value);

    // Start a new game
    newGame();
}
