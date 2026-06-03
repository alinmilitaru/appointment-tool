<?php
session_start();

$specialists = [
    'alex' => [
        'name' => 'Alex Carter',
        'password' => 'salon',
    ],
    'bianca' => [
        'name' => 'Bianca Stone',
        'password' => 'salon',
    ],
    'noah' => [
        'name' => 'Noah Reed',
        'password' => 'salon',
    ],
];

if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = '';
}

if (!isset($_SESSION['fail'])) {
    $_SESSION['fail'] = '';
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    addSuccess('You are logged out.');
    header('Location: index.php');
    exit;
}

$mode = $_GET['mode'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['message'] = '';
    $_SESSION['fail'] = '';

    if (isset($_POST['login_guest'])) {
        $mode = 'guest';
        loginGuest();
    }

    if (isset($_POST['login_specialist'])) {
        $mode = 'specialist';
        loginSpecialist($specialists);
    }

    if (!hasErrors()) {
        header('Location: index.php');
        exit;
    }
}

$user = $_SESSION['user'] ?? null;

function loginGuest(): void
{
    $name = trim((string) ($_POST['guest_name'] ?? ''));
    $phone = trim((string) ($_POST['guest_phone'] ?? ''));

    $_SESSION['form']['guest_name'] = $name;
    $_SESSION['form']['guest_phone'] = $phone;

    if (empty($name)) {
        addError('Please complete your name.');
    } elseif (!preg_match("/^[a-zA-Z .'-]{2,60}$/", $name)) {
        addError('The name must contain only letters, spaces, dot, apostrophe or hyphen.');
    }

    if (empty($phone)) {
        addError('Please complete your phone number.');
    } elseif (!validRomanianPhone($phone)) {
        addError('The phone number must start with 07 or +407 and contain only digits after the prefix.');
    }

    if (!hasErrors()) {
        $_SESSION['user'] = [
            'type' => 'guest',
            'name' => cleanText($name),
            'phone' => $phone,
        ];

        unset($_SESSION['form']);
        addSuccess('You are logged in as guest.');
    }
}

function loginSpecialist(array $specialists): void
{
    $specialist = (string) ($_POST['specialist'] ?? '');
    $password = (string) ($_POST['password'] ?? '');
    $_SESSION['form']['specialist'] = $specialist;

    if (!isset($specialists[$specialist])) {
        addError('Please choose a valid specialist.');
    } elseif ($password != $specialists[$specialist]['password']) {
        addError('The specialist password is incorrect.');
    }

    if (!hasErrors()) {
        $_SESSION['user'] = [
            'type' => 'specialist',
            'name' => $specialists[$specialist]['name'],
            'specialist' => $specialist,
        ];

        unset($_SESSION['form']);
        addSuccess('You are logged in as specialist.');
    }
}

function validRomanianPhone(string $phone): bool
{
    return (bool) preg_match('/^(07[0-9]{8}|\+407[0-9]{8})$/', $phone);
}

function addError(string $text): void
{
    $_SESSION['fail'] = 'fail';
    $_SESSION['message'] .= '<li>' . e($text) . '</li>';
}

function addSuccess(string $text): void
{
    $_SESSION['fail'] = '';
    $_SESSION['message'] = '<li>' . e($text) . '</li>';
}

function hasErrors(): bool
{
    return $_SESSION['fail'] == 'fail';
}

function displayMessages(): void
{
    if (!empty($_SESSION['message'])) {
        $class = hasErrors() ? 'error' : 'success';

        echo '<div class="message ' . $class . '">';
        echo '<ul>' . $_SESSION['message'] . '</ul>';
        echo '</div>';

        $_SESSION['message'] = '';
        $_SESSION['fail'] = '';
    }
}

function cleanText(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function e(mixed $text): string
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

function selected(string $firstValue, string $secondValue): string
{
    return $firstValue == $secondValue ? 'selected' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Tool</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background: paleturquoise;
            color: #123431;
            font-family: Arial, Helvetica, sans-serif;
            display: grid;
            place-items: center;
        }

        .page {
            width: min(760px, calc(100% - 32px));
            padding: 28px 0;
        }

        .mainDiv {
            background: lightcyan;
            border: 1px solid darkgreen;
            border-radius: 12px;
            box-shadow: 3px 4px 6px rgba(0, 139, 139, 0.5), -0.5em 0 .4em rgba(0, 100, 0, 0.35);
            padding: 28px;
        }

        h1,
        h2,
        p {
            margin-top: 0;
        }

        h1,
        h2 {
            color: darkgreen;
            text-align: center;
        }

        a {
            color: darkgreen;
        }

        form {
            display: grid;
            gap: 14px;
        }

        label {
            display: grid;
            gap: 6px;
            color: #4f6f6b;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid rgba(0, 100, 0, 0.3);
            border-radius: 8px;
            background: white;
            font: inherit;
        }

        button,
        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 42px;
            border: 1px solid darkgreen;
            border-radius: 999px;
            padding: 10px 18px;
            background: #4CAF50;
            color: white;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            font: inherit;
        }

        .button.secondary {
            background: white;
            color: darkgreen;
        }

        .choiceGrid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .choiceBox {
            min-height: 180px;
            border: 1px solid rgba(0, 100, 0, 0.3);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.55);
            color: inherit;
            display: grid;
            place-items: center;
            padding: 24px;
            text-align: center;
            text-decoration: none;
        }

        .choiceBox:hover {
            border-color: darkgreen;
            box-shadow: 0 3px 10px rgba(0, 100, 0, 0.18);
        }

        .message {
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 12px;
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(0, 100, 0, 0.25);
            font-weight: bold;
        }

        .message ul {
            margin: 0;
            padding-left: 20px;
        }

        .message li + li {
            margin-top: 4px;
        }

        .message.error {
            color: #b72d2d;
        }

        .message.success {
            color: darkgreen;
        }

        .top {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            align-items: center;
            margin-bottom: 18px;
        }

        .loggedBox {
            text-align: center;
        }

        @media (max-width: 640px) {
            body {
                display: block;
            }

            .page {
                margin: 0 auto;
            }

            .choiceGrid,
            .top {
                grid-template-columns: 1fr;
                display: grid;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <h1>Appointment Tool</h1>
        <?php displayMessages(); ?>

        <?php if (empty($user) && $mode == ''): ?>
            <section class="mainDiv">
                <div class="choiceGrid">
                    <a class="choiceBox" href="index.php?mode=guest">
                        <div>
                            <h2>Guest</h2>
                            <p>Login without password.</p>
                        </div>
                    </a>

                    <a class="choiceBox" href="index.php?mode=specialist">
                        <div>
                            <h2>Specialist</h2>
                            <p>Login with specialist password.</p>
                        </div>
                    </a>
                </div>
            </section>
        <?php endif; ?>

        <?php if (empty($user) && $mode == 'guest'): ?>
            <section class="mainDiv">
                <div class="top">
                    <h2>Guest Login</h2>
                    <a href="index.php">Back</a>
                </div>

                <form method="post">
                    <label>
                        Name
                        <input type="text" name="guest_name" value="<?= e($_SESSION['form']['guest_name'] ?? ''); ?>" required>
                    </label>

                    <label>
                        Romanian phone number
                        <input type="text" name="guest_phone" value="<?= e($_SESSION['form']['guest_phone'] ?? ''); ?>" placeholder="0722123456" required>
                    </label>

                    <button type="submit" name="login_guest">Login as guest</button>
                </form>
            </section>
        <?php endif; ?>

        <?php if (empty($user) && $mode == 'specialist'): ?>
            <section class="mainDiv">
                <div class="top">
                    <h2>Specialist Login</h2>
                    <a href="index.php">Back</a>
                </div>

                <form method="post">
                    <label>
                        Specialist
                        <select name="specialist">
                            <?php foreach ($specialists as $id => $specialist): ?>
                                <option value="<?= e($id); ?>" <?= selected($_SESSION['form']['specialist'] ?? '', $id); ?>>
                                    <?= e($specialist['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>

                    <label>
                        Password
                        <input type="password" name="password" placeholder="salon" required>
                    </label>

                    <button type="submit" name="login_specialist">Login as specialist</button>
                </form>
            </section>
        <?php endif; ?>

        <?php if (!empty($user)): ?>
            <section class="mainDiv loggedBox">
                <h2>You are logged in</h2>
                <p>
                    Type: <strong><?= e($user['type']); ?></strong><br>
                    Name: <strong><?= e($user['name']); ?></strong>
                </p>

                <?php if ($user['type'] == 'guest'): ?>
                    <p>Phone: <strong><?= e($user['phone']); ?></strong></p>
                <?php endif; ?>

                <a class="button secondary" href="index.php?logout=1">Log out</a>
            </section>
        <?php endif; ?>
    </main>
</body>
</html>
