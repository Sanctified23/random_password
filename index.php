<?php

$password = '';

if ($_POST) {
    $lengthOfPass = $_POST['length'];
    $uppercase = $_POST['uppercase'] ?? false;
    $lowercase = $_POST['lowercase'] ?? false;
    $numbers = $_POST['numbers'] ?? false;
    $specialChars = $_POST['special_symbols'] ?? false;
    $params = [];
    $symbols = '';
    $uppercase ? $symbols = $symbols . strtoupper('abcdefghijklmnopqrstuvwxyz') : null;
    $lowercase ? $symbols = $symbols . 'abcdefghijklmnopqrstuvwxyz' : null;
    $numbers ? $symbols = $symbols . '0123456789' : null;
    $specialChars ? $symbols = $symbols . "+-&&||!(){}[]^~*?:\"\\" : null;

    if ($symbols !== '') {
        $separatedSymbols = str_split($symbols);
        for ($i = 0; $i < $lengthOfPass; $i++) {
            $password = $password . $separatedSymbols[rand(0, count($separatedSymbols) - 1)];
        }
    } else {
        $_POST['error'] = 'Not included conditions of generating password by params';
    }

    $_POST['password'] = $password;
}

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
        <form class="randomizer__wrapper-params" method="POST" action="index.php">
            <div>
                <label for="length">
                    Characters length
                </label>

                <input name="length" id="length" value="<?php if (isset($_POST['length'])) echo $_POST['length'] ?>"
                       type="range" min="1" max="30"
                       oninput="this.nextElementSibling.value = this.value">
                <output>
                    <?php if (isset($_POST['length'])) echo $_POST['length'] ?>
                </output>
            </div>

            <div>
                <p>
                    Characters used:
                </p>
                <label for="uppercase">
                    Uppercase
                </label>
                <input <?php if (isset($_POST['uppercase'])) echo 'checked' ?> name='uppercase' id="uppercase"
                                                                               type="checkbox">
                <label for="lowercase">
                    Lowercase
                </label>
                <input name='lowercase' <?php if (isset($_POST['lowercase'])) echo 'checked' ?> id="lowercase"
                       type="checkbox">
                <label for="special_symbols">
                    Special Symbols
                </label>
                <input name='special_symbols' <?php if (isset($_POST['special_symbols'])) echo 'checked' ?>
                       id="special_symbols" type="checkbox">
                <label for="numbers">
                    Numbers
                </label>
                <input name='numbers'<?php if (isset($_POST['numbers'])) echo 'checked' ?> id="numbers"
                       type="checkbox">
            </div>
            <button class="randomizer__button" type="submit">
                Request Password
            </button>
        </form>
        <?php if (!empty($_POST['error'])): ?>
            <div class="error">
                <p class="text-error">
                    <?php echo $_POST['error'] ?>
                </p>
            </div>
        <?php endif; ?>
        <div>
            <label for="result">Result</label>
            <input id='result' name="result" type="text" value="<?php echo htmlspecialchars($_POST['password']) ?>">
        </div>
    </div>
</main>
</body>
</html>