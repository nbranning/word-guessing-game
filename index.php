<!-- Author: Nate Branning -->
<!DOCTYPE html>
<html>
<head>
    <title>Guess That Word Game</title>
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.css">

    <style>
        #guess_that_word_img {
            background-image: url('/assets/images/guess_that_word.jpg');
            background-size: cover;
            height: 600px;
            border-right: ridge 4px #17a2b8 ;
            border-left: ridge 4px #17a2b8 ;
        }
        #letters{
            background-color: #fff;
            opacity: 0.9;
            border-radius: .5rem;
            margin-top: 230px;
        }

        #word_container{
            background-color: #fff;
            opacity: 0.9;
            border-radius: .5rem;
            margin-top: 50px;
            width: fit-content;
            border: ridge 4px;
        }
        #options{
            border: ridge 4px #17a2b8 ;
            border-bottom: none;
            border-top-left-radius: .5rem;
            border-top-right-radius: .5rem;

        }
        #gameFooter{
            border: ridge 4px #17a2b8 ;
            border-top: none;
            border-bottom-left-radius: .5rem;
            border-bottom-right-radius: .5rem;
        }
    </style>
</head>
<body class="container mx-auto mb-5">
    <div class="row mt-3 mb-0" id="">
        <div class="col col-sm-12 col-md-6 mx-sm-auto" id="options">
            <h3 class="text-info">Game Options</h3>
            <p>Guess That Word is a classic word guessing game. The rules are simple.
                <ol>
                    <li>Guess the word by clicking on the letters</li>
                    <li>Each wrong guess will be counted</li>
                    <li>You have the option to choose a word length</li>
                    <li>You have the option to choose the number of wrong guesses allowed</li>
                    <li>To start a new game, click the New Game button</li>
                    <li>Good Luck!</li>                    
                </ol>
            </p>
            <div class="row"> 
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="word_length">Word Length:</label>
                        <select class="form-control" id="word_length" onchange="gameOptions()">
                            <option value="-1" selected>Random</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="wrong_answers">Wrong Answers:</label>
                        <select class="form-control" id="max_guesses" onchange="gameOptions()">
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6" selected>6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="-1">Unlimited</option>
                        </select>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row my-0">
        <div class="col-sm-12 col-md-6 mx-auto" id="guess_that_word_img">
            <div id="word_container" class="mx-auto p-1 border-info">
                <h1 id="word" class="tracking-wider"></h1>
            </div>
            <div id="letters" class="d-flex flex-wrap mx-auto justify-content-center">
                <?php 
                $letterCount = 0;
                foreach(range('a','z') as $letter): ?>
                    <button class="btn btn-primary m-1 p-0 pb-1 letter_btn" style="width: 6%;" onclick="makeGuess('<?= $letter ?>')" id="letter_<?= $letter ?>"><?= $letter ?></button>
                <?php endforeach; ?>
            </div>            
        </div>
    </div>
    
    <div class="row mt-0">
        <div class="col-sm-12 col-md-6 mx-auto pt-2" id="gameFooter">
            <button class="btn btn-danger float-right" onclick="newGame()">New Game</button>
            <h3 class="text-danger" id="message">Wrong guesses: 0/6</h3>
        </div>
    </div>

    <script>
        //const wordsArray = <?= json_encode($wordsArray) ?>;
    </script>

    <script src="/assets/bootstrap/js/bootstrap.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>


