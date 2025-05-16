<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Randomizer Password</title>
</head>
<body>
<main class="randomizer">
    <div class="randomizer_wrapper">
        <div class="randomizer__wrapper-title">
            <h2>
                Random Password Generator
            </h2>
            <h3>
                Create strong and secure passwords to keep your account safe online.
            </h3>
        </div>
        <form class="randomizer__wrapper-params">
            <div>
                <label for="length">
                    Characters length
                </label>

                <input name="length" id="length" value="15" type="range" min="1" max="30"
                       oninput="this.nextElementSibling.value = this.value">
                <output>
                </output>
            </div>

            <div>
                <p>
                    Characters used:
                </p>
                <label for="uppercase">
                    Uppercase
                </label>
                <input name='uppercase' id="uppercase" type="checkbox">
                <label for="lowercase">
                    Lowercase
                </label>
                <input name='lowercase' id="lowercase" type="checkbox">
                <label for="special_symbols">
                    Special Symbols
                </label>
                <input name='special_symbols' id="special_symbols" type="checkbox">
                <label for="numbers">
                    Numbers
                </label>
                <input name='numbers' id="numbers" type="checkbox">
            </div>
            <button class="randomizer__button">
                Request Password
            </button>
        </form>
        <div>
            <label for="result">Result</label>
            <input id='result' name="result" type="text">
        </div>
    </div>
</main>
</body>
</html>