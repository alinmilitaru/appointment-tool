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

$translations = [
    'ro' => [
        'Appointment Tool' => 'Programări salon',
        'Switch language' => 'Schimbă limba',
        'Switch theme' => 'Schimbă tema',
        'Homepage' => 'Pagina principală',
        'Guest' => 'Client',
        'Specialist' => 'Specialist',
        'Book a hair or beard service.' => 'Programează un serviciu pentru păr sau barbă.',
        'Manage stylist appointments.' => 'Gestionează programările salonului.',
        'Guest Login' => 'Autentificare client',
        'Specialist Login' => 'Autentificare specialist',
        'Back' => 'Înapoi',
        'Name' => 'Nume',
        'Phone number' => 'Telefon',
        'Password' => 'Parolă',
        'Login' => 'Autentificare',
        'Logout' => 'Ieșire',
        'Welcome back,' => 'Bine ai revenit,',
        'Type:' => 'Tip:',
        'Name:' => 'Nume:',
        'Phone:' => 'Telefon:',
        'Please complete your name.' => 'Te rog completează numele.',
        'The name must contain only letters, spaces, dot, apostrophe or hyphen.'
            => 'Numele trebuie să conțină doar litere, spații, punct, apostrof sau cratimă.',
        'Please complete your phone number.' => 'Te rog completează numărul de telefon.',
        'The phone number length is incorrect.' => 'Numărul de telefon are o lungime incorectă.',
        'Please choose a valid specialist.' => 'Te rog alege un specialist valid.',
        'The specialist password is incorrect.' => 'Parola specialistului este incorectă.',
        'You are logged in as guest.' => 'Ești autentificat ca client.',
        'You are logged in as specialist.' => 'Ești autentificat ca specialist.',
    ],
];

$theme = $_SESSION['theme'] ?? 'light';
$themeChanging = false;
if (isset($_GET['theme']) && in_array($_GET['theme'], ['light', 'dark'], true)) {
    $theme = $_GET['theme'];
    $themeChanging = true;
}
if (!in_array($theme, ['light', 'dark'], true)) {
    $theme = 'light';
}
$_SESSION['theme'] = $theme;

$lang = $_SESSION['lang'] ?? 'en';
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'ro'], true)) {
    $lang = $_GET['lang'];
}
if (!in_array($lang, ['en', 'ro'], true)) {
    $lang = 'en';
}
$_SESSION['lang'] = $lang;

if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = '';
}

if (!isset($_SESSION['fail'])) {
    $_SESSION['fail'] = '';
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user'], $_SESSION['form'], $_SESSION['form_errors']);
    $_SESSION['message'] = '';
    $_SESSION['fail'] = '';
    header('Location: index.php');
    exit;
}

$mode = $_GET['mode'] ?? '';
$nextTheme = $theme == 'dark' ? 'light' : 'dark';
$themeParams = ['theme' => $nextTheme];
if ($mode != '') {
    $themeParams['mode'] = $mode;
}
$themeUrl = 'index.php?' . http_build_query($themeParams);
$nextLang = $lang == 'ro' ? 'en' : 'ro';
$langParams = ['lang' => $nextLang];
if ($mode != '') {
    $langParams['mode'] = $mode;
}
$langUrl = 'index.php?' . http_build_query($langParams);
$screenContentClass = $themeChanging ? '' : 'screenContent';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['message'] = '';
    $_SESSION['fail'] = '';
    $_SESSION['form_errors'] = [];

    if (isset($_POST['login_guest'])) {
        $mode = 'guest';
        loginGuest();
    } elseif (isset($_POST['login_specialist'])) {
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
        addFieldError('guest_name', __('Please complete your name.'));
    } elseif (!preg_match("/^[a-zA-Z .'-]{2,60}$/", $name)) {
        addFieldError('guest_name', __('The name must contain only letters, spaces, dot, apostrophe or hyphen.'));
    }

    if (empty($phone)) {
        addFieldError('guest_phone', __('Please complete your phone number.'));
    } elseif (!validRomanianPhone($phone)) {
        addFieldError('guest_phone', __('The phone number length is incorrect.'));
    }

    if (!hasErrors()) {
        $_SESSION['user'] = [
            'type' => 'guest',
            'name' => $name,
            'phone' => '+40' . $phone,
        ];

        unset($_SESSION['form']);
        unset($_SESSION['form_errors']);
        addSuccess(__('You are logged in as guest.'));
    }
}

function loginSpecialist(array $specialists): void
{
    $specialist = (string) ($_POST['specialist'] ?? '');
    $password = (string) ($_POST['password'] ?? '');
    $_SESSION['form']['specialist'] = $specialist;

    if (!isset($specialists[$specialist])) {
        addFieldError('specialist', __('Please choose a valid specialist.'));
    } elseif ($password != $specialists[$specialist]['password']) {
        addFieldError('password', __('The specialist password is incorrect.'));
    }

    if (!hasErrors()) {
        $_SESSION['user'] = [
            'type' => 'specialist',
            'name' => $specialists[$specialist]['name'],
            'specialist' => $specialist,
        ];

        unset($_SESSION['form']);
        unset($_SESSION['form_errors']);
        addSuccess(__('You are logged in as specialist.'));
    }
}

function validRomanianPhone(string $phone): bool
{
    return (bool) preg_match('/^[0-9]{9}$/', $phone);
}

function addError(string $text): void
{
    $_SESSION['fail'] = 'fail';
    $_SESSION['message'] .= '<li>' . e($text) . '</li>';
}

function addFieldError(string $field, string $text): void
{
    $_SESSION['form_errors'][$field] = true;
    addError($text);
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
    echo '<div class="messageSpace">';

    if (!empty($_SESSION['message'])) {
        $class = hasErrors() ? 'error' : 'success';

        echo '<div class="message ' . $class . '">';
        echo '<ul>' . $_SESSION['message'] . '</ul>';
        echo '</div>';

        $_SESSION['message'] = '';
        $_SESSION['fail'] = '';
    }

    echo '<div class="cutLine"></div>';
    echo '</div>';
}

function e(mixed $text): string
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

function __(string $text): string
{
    global $translations, $lang;

    return $translations[$lang][$text] ?? $text;
}

function selected(string $firstValue, string $secondValue): string
{
    return $firstValue == $secondValue ? 'selected' : '';
}

function inputClass(string $field): string
{
    return !empty($_SESSION['form_errors'][$field]) ? 'inputError' : '';
}
?>

<!DOCTYPE html>
<html lang="<?= e($lang); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e(__('Appointment Tool')); ?>
    </title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            --page: paleturquoise;
            --panel: lightcyan;
            --text: #123431;
            --accent: darkgreen;
            --muted: #4f6f6b;
            --line: rgba(0, 100, 0, 0.3);
            --card: rgba(255, 255, 255, 0.55);
            --soft: rgba(218, 224, 224, 0.86);
            --input: white;
            --shadow: 3px 4px 6px rgba(0, 139, 139, 0.5), -0.5em 0 .4em rgba(0, 100, 0, 0.35);
            --button: #4CAF50;
            --error: #b72d2d;

            min-height: 100vh;
            margin: 0;
            background: var(--page);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            display: grid;
            place-items: center;
        }

        body.darkTheme {
            --page: #101918;
            --panel: #172321;
            --text: #dff7ef;
            --accent: #8fe0a6;
            --muted: #a8c8c0;
            --line: rgba(143, 224, 166, 0.35);
            --card: rgba(255, 255, 255, 0.06);
            --soft: rgba(94, 102, 100, 0.35);
            --input: #0f1716;
            --shadow: 0 12px 28px rgba(0, 0, 0, 0.35), -0.45em 0 .35em rgba(143, 224, 166, 0.12);
            --button: #2f9f52;
            --error: #ff8e8e;
        }

        .page {
            width: min(760px, calc(100% - 32px));
            padding: 28px 0;
        }

        .mainDiv {
            background: linear-gradient(135deg, var(--panel), var(--soft));
            border: 1px solid var(--accent);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 28px;
        }

        .homeDiv {
            background: var(--panel);
            overflow: hidden;
            position: relative;
            min-height: 240px;
            pointer-events: none;
            animation: enableChoices .01s linear 2s forwards;
        }

        .screenContent {
            animation: screenFade .45s ease;
        }

        .introTitle {
            position: absolute;
            inset: 28px;
            color: var(--accent);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            font-size: 1.8rem;
            font-weight: bold;
            animation: titleIntro 1.35s ease forwards;
        }

        .introTitle span:first-child {
            font-size: 2.1rem;
        }

        h2,
        p {
            margin-top: 0;
        }

        h2 {
            color: var(--accent);
            text-align: center;
        }

        .smallLogo {
            display: block;
            text-align: center;
            font-size: 2rem;
            margin-bottom: 14px;
            text-decoration: none;
            animation: slowBlink 2.8s ease-in-out infinite;
        }

        a {
            color: var(--accent);
        }

        form {
            display: grid;
            gap: 14px;
        }

        label {
            display: grid;
            gap: 6px;
            color: var(--muted);
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--input);
            color: var(--text);
            font: inherit;
        }

        input:invalid,
        select:invalid {
            box-shadow: none;
        }

        .inputError {
            border-color: var(--error);
        }

        .phoneBox {
            display: grid;
            grid-template-columns: auto 1fr;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--input);
            overflow: hidden;
        }

        .phonePrefix {
            padding: 10px 12px;
            border-right: 1px dashed var(--line);
            color: var(--accent);
        }

        .phoneBox input {
            border: 0;
            border-radius: 0;
        }

        .phoneBox input:focus {
            outline: none;
        }

        button,
        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 42px;
            border: 1px solid var(--accent);
            border-radius: 999px;
            padding: 10px 18px;
            background: var(--button);
            color: white;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            font: inherit;
        }

        .button.secondary {
            background: var(--input);
            color: var(--accent);
        }

        .submitButton {
            justify-self: center;
            min-height: 36px;
            padding: 8px 28px;
        }

        .iconButton {
            width: 32px;
            height: 32px;
            min-height: 32px;
            padding: 0;
            border-radius: 50%;
            font-size: 1.6rem;
            line-height: 1;
            padding-bottom: 2px;
        }

        .logoutButton {
            width: auto;
            height: 34px;
            min-height: 34px;
            padding: 0 12px;
            font-size: .9rem;
        }

        .topControls {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .switchToggle {
            width: 66px;
            height: 34px;
            border: 1px solid var(--line);
            border-radius: 999px;
            background: linear-gradient(135deg, var(--card), var(--soft));
            color: var(--accent);
            display: grid;
            grid-template-columns: 1fr 1fr;
            position: relative;
            text-decoration: none;
        }

        .switchToggle::before {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--accent);
            opacity: .22;
            transform: translateX(0);
        }

        .languageToggle.en::before,
        .themeToggle.dark::before {
            transform: translateX(32px);
        }

        .themeToggle.themeChanging::before {
            animation: knobToLight .35s ease both;
        }

        .themeToggle.dark.themeChanging::before {
            animation-name: knobToDark;
        }

        @keyframes knobToLight {
            from {
                transform: translateX(32px);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes knobToDark {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(32px);
            }
        }

        .switchToggle span {
            display: grid;
            place-items: center;
            z-index: 1;
        }

        .languageToggle span {
            font-size: .75rem;
            font-weight: bold;
        }

        .choiceGrid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .choiceBox {
            min-height: 180px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: var(--card);
            color: inherit;
            display: grid;
            place-items: center;
            padding: 24px;
            text-align: center;
            text-decoration: none;
            opacity: 0;
            animation: splitLeft .8s cubic-bezier(.2, .9, .2, 1.1) 1.2s forwards;
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .choiceBox:nth-child(2) {
            animation-name: splitRight;
        }

        .choiceBox:hover {
            border-color: var(--accent);
            box-shadow: 0 3px 10px rgba(0, 100, 0, 0.18);
            transform: translateY(-4px);
        }

        @keyframes titleIntro {
            0% {
                opacity: 0;
                transform: translateY(10px) scale(.96);
            }

            45% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }

            100% {
                opacity: 0;
                transform: translateY(-12px) scale(.96);
            }
        }

        @keyframes splitLeft {
            from {
                opacity: 0;
                transform: translateX(55%) scale(.94);
            }

            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }

        @keyframes splitRight {
            from {
                opacity: 0;
                transform: translateX(-55%) scale(.94);
            }

            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }

        @keyframes enableChoices {
            to {
                pointer-events: auto;
            }
        }

        @keyframes screenFade {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slowBlink {
            50% {
                opacity: 0;
            }
        }

        .message {
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 12px;
            background: var(--card);
            border: 1px solid var(--line);
            font-weight: bold;
            text-align: left;
        }

        .message ul {
            margin: 0;
            padding-left: 20px;
        }

        .message li+li {
            margin-top: 4px;
        }

        .message.error {
            color: var(--error);
        }

        .message.success {
            color: var(--accent);
        }

        .messageSpace {
            min-height: 34px;
            margin: 8px 0 16px;
        }

        .cutLine {
            height: 1px;
            margin-top: 12px;
            background: repeating-linear-gradient(to right,
                    var(--line) 0 21px,
                    transparent 21px 32px);
        }

        .top {
            display: grid;
            grid-template-columns: 78px 1fr 78px;
            align-items: center;
            margin-bottom: 18px;
        }

        .top h2 {
            grid-column: 2;
            grid-row: 1;
            margin-bottom: 0;
        }

        .top .iconButton {
            grid-column: 1;
            grid-row: 1;
            justify-self: start;
        }

        .top .right {
            grid-column: 3;
            grid-row: 1;
            justify-self: end;
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

            .choiceGrid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body class="<?= e($theme); ?>Theme">
    <main class="page">
        <div class="topControls">
            <a class="switchToggle languageToggle <?= e($lang); ?>"
                href="<?= e($langUrl); ?>"
                aria-label="<?= e(__('Switch language')); ?>">
                <span>RO</span>
                <span>EN</span>
            </a>

            <a class="switchToggle themeToggle <?= e($theme); ?><?= $themeChanging ? ' themeChanging' : ''; ?>"
                href="<?= e($themeUrl); ?>"
                aria-label="<?= e(__('Switch theme')); ?>">
                <span>&#9728;</span>
                <span>&#9790;</span>
            </a>
        </div>

        <?php if (!empty($user) || $mode != ''): ?>
        <a class="smallLogo" href="index.php"
            aria-label="<?= e(__('Homepage')); ?>">&#128136;</a>
        <?php endif; ?>

        <?php if (empty($user) && $mode == ''): ?>
        <section class="mainDiv homeDiv">
            <div class="introTitle">
                <span>&#128136;</span>
                <span><?= e(__('Appointment Tool')); ?></span>
            </div>

            <div class="choiceGrid">
                <a class="choiceBox" href="index.php?mode=guest">
                    <div>
                        <h2><?= e(__('Guest')); ?>
                        </h2>
                        <p><?= e(__('Book a hair or beard service.')); ?>
                        </p>
                    </div>
                </a>

                <a class="choiceBox" href="index.php?mode=specialist">
                    <div>
                        <h2><?= e(__('Specialist')); ?>
                        </h2>
                        <p><?= e(__('Manage stylist appointments.')); ?>
                        </p>
                    </div>
                </a>
            </div>
        </section>
        <?php endif; ?>

        <?php if (empty($user) && $mode == 'guest'): ?>
        <section class="mainDiv">
            <div class="<?= e($screenContentClass); ?>">
                <div class="top">
                    <h2><?= e(__('Guest Login')); ?>
                    </h2>
                    <a class="button secondary iconButton" href="index.php"
                        aria-label="<?= e(__('Back')); ?>">&#8249;</a>
                </div>
                <?php displayMessages(); ?>

                <form method="post">
                    <label>
                        <?= e(__('Name')); ?>
                        <input type="text" name="guest_name"
                            class="<?= e(inputClass('guest_name')); ?>"
                            value="<?= e($_SESSION['form']['guest_name'] ?? ''); ?>"
                            required>
                    </label>

                    <label>
                        <?= e(__('Phone number')); ?>
                        <div
                            class="phoneBox <?= e(inputClass('guest_phone')); ?>">
                            <span class="phonePrefix">+40</span>
                            <input type="text" name="guest_phone"
                                value="<?= e($_SESSION['form']['guest_phone'] ?? ''); ?>"
                                placeholder="123456789" maxlength="9" inputmode="numeric" required>
                        </div>
                    </label>

                    <button class="submitButton" type="submit"
                        name="login_guest"><?= e(__('Login')); ?></button>
                </form>
            </div>
        </section>
        <?php endif; ?>

        <?php if (empty($user) && $mode == 'specialist'): ?>
        <section class="mainDiv">
            <div class="<?= e($screenContentClass); ?>">
                <div class="top">
                    <h2><?= e(__('Specialist Login')); ?>
                    </h2>
                    <a class="button secondary iconButton" href="index.php"
                        aria-label="<?= e(__('Back')); ?>">&#8249;</a>
                </div>
                <?php displayMessages(); ?>

                <form method="post">
                    <label>
                        <?= e(__('Specialist')); ?>
                        <select name="specialist"
                            class="<?= e(inputClass('specialist')); ?>">
                            <?php foreach ($specialists as $id => $specialist): ?>
                            <option value="<?= e($id); ?>" <?= selected($_SESSION['form']['specialist'] ?? '', $id); ?>>
                                <?= e($specialist['name']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </label>

                    <label>
                        <?= e(__('Password')); ?>
                        <input type="password" name="password"
                            class="<?= e(inputClass('password')); ?>"
                            placeholder="salon" required>
                    </label>

                    <button class="submitButton" type="submit"
                        name="login_specialist"><?= e(__('Login')); ?></button>
                </form>
            </div>
        </section>
        <?php endif; ?>

        <?php if (!empty($user)): ?>
        <section class="mainDiv loggedBox">
            <div class="<?= e($screenContentClass); ?>">
                <div class="top">
                    <h2><?= e(__('Welcome back,')); ?>
                        <?= e(ucfirst($user['name'])); ?>.
                    </h2>
                    <a class="button secondary logoutButton right"
                        href="index.php?logout=1"><?= e(__('Logout')); ?></a>
                </div>
                <?php displayMessages(); ?>
                <p>
                    <?= e(__('Type:')); ?>
                    <strong><?= e($user['type'] == 'guest' ? __('Guest') : __('Specialist')); ?></strong><br>
                    <?= e(__('Name:')); ?>
                    <strong><?= e($user['name']); ?></strong>
                </p>

                <?php if ($user['type'] == 'guest'): ?>
                <p><?= e(__('Phone:')); ?>
                    <strong><?= e($user['phone']); ?></strong>
                </p>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
    </main>
</body>

</html>