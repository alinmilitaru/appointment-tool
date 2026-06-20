<?php
session_start();

$services = [
    'hair_beard' => ['name' => 'Hair + beard', 'minutes' => 40],
    'hair_only' => ['name' => 'Hair only', 'minutes' => 30],
    'beard' => ['name' => 'Beard', 'minutes' => 10],
    'coloring' => ['name' => 'Hair coloring', 'minutes' => 150],
    'eyebrows' => ['name' => 'Eyebrow shaping', 'minutes' => 20],
    'wash_style' => ['name' => 'Wash and style', 'minutes' => 20],
    'razor_shave' => ['name' => 'Classic razor shave', 'minutes' => 20],
];

$weekdaySchedule = [
    'Monday' => [['09:00', '18:00']],
    'Tuesday' => [['09:00', '18:00']],
    'Wednesday' => [['09:00', '18:00']],
    'Thursday' => [['09:00', '18:00']],
    'Friday' => [['09:00', '18:00']],
];

$specialists = [
    'alex' => [
        'name' => 'Alex Carter',
        'role' => 'Barber and color specialist',
        'password' => 'salon',
        'services' => ['hair_beard', 'hair_only', 'beard', 'coloring', 'razor_shave'],
        'schedule' => $weekdaySchedule,
    ],
    'bianca' => [
        'name' => 'Bianca Stone',
        'role' => 'Stylist and brow artist',
        'password' => 'salon',
        'services' => ['hair_only', 'coloring', 'eyebrows', 'wash_style'],
        'schedule' => $weekdaySchedule,
    ],
    'noah' => [
        'name' => 'Noah Reed',
        'role' => 'Traditional barber',
        'password' => 'salon',
        'services' => ['hair_beard', 'hair_only', 'beard', 'razor_shave'],
        'schedule' => $weekdaySchedule,
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
        'Please complete your name.' => 'Te rog completează numele.',
        'The name must contain only letters, spaces, dot, apostrophe or hyphen.'
            => 'Numele trebuie să conțină doar litere, spații, punct, apostrof sau cratimă.',
        'Please complete your phone number.' => 'Te rog completează numărul de telefon.',
        'The phone number length is incorrect.' => 'Numărul de telefon are o lungime incorectă.',
        'Please choose a valid specialist.' => 'Te rog alege un specialist valid.',
        'The specialist password is incorrect.' => 'Parola specialistului este incorectă.',
        'You are logged in as guest.' => 'Ești autentificat ca client.',
        'You are logged in as specialist.' => 'Ești autentificat ca specialist.',
        'Please login as guest before booking.'
            => 'Te rog autentifică-te ca și client înainte de programare.',
        'Please choose a valid service.' => 'Te rog alege un serviciu valid.',
        'Please choose an available future day.' => 'Te rog alege o zi disponibilă din viitor.',
        'Please choose an available time.' => 'Te rog alege o oră disponibilă.',
        'This time is no longer available.' => 'Această oră nu mai este disponibilă.',
        'Book-in confirmed. Payment is made at the salon.'
            => 'Programarea a fost confirmată. Plata se face la salon.',
        'Please login as specialist before cancelling bookings.'
            => 'Te rog autentifică-te ca specialist înainte de anularea programărilor.',
        'Booking cancelled.' => 'Programarea a fost anulată.',
        'Booking was not found.' => 'Programarea nu a fost găsită.',
        'Choose specialist' => 'Alege specialistul',
        'Choose service' => 'Alege serviciul',
        'Choose day' => 'Alege ziua',
        'Choose time' => 'Alege ora',
        'No available days for this service.' => 'Nu există zile disponibile pentru acest serviciu.',
        'No available times for this day.' => 'Nu există ore disponibile pentru această zi.',
        'Choose day to manage' => 'Alege ziua de gestionat',
        'Cancel booking' => 'Anulează programarea',
        'Add break' => 'Adaugă pauză',
        'Break' => 'Pauză',
        'Break duration' => 'Durata pauzei',
        'Entire day' => 'Toată ziua',
        'Break added.' => 'Pauza a fost adăugată.',
        'Break removed.' => 'Pauza a fost ștearsă.',
        'Break was not found.' => 'Pauza nu a fost găsită.',
        'No bookings or breaks for this day.' => 'Nu există programări sau pauze pentru această zi.',
        'Please choose a working day.' => 'Te rog alege o zi lucrătoare.',
        'Please choose a valid break duration.' => 'Te rog alege o durată validă pentru pauză.',
        'This break does not fit in the working day.'
            => 'Această pauză nu încape în programul zilei.',
        'This break overlaps an appointment.' => 'Această pauză se suprapune cu o programare.',
        'This break overlaps another break.' => 'Această pauză se suprapune cu altă pauză.',
        'Full day break is allowed only when there are no appointments.'
            => 'Pauza de o zi întreagă este permisă doar când nu există programări.',
        'Are you sure you want to book' => 'Sigur vrei să programezi',
        'Are you sure you want to cancel' => 'Sigur vrei să anulezi',
        'Barber and color specialist' => 'Frizer și specialist în vopsit',
        'Stylist and brow artist' => 'Stilistă și specialistă în sprâncene',
        'Traditional barber' => 'Frizer tradițional',
        'Hair + beard' => 'Tuns + barbă',
        'Hair only' => 'Tuns',
        'Beard' => 'Barbă',
        'Hair coloring' => 'Vopsit păr',
        'Eyebrow shaping' => 'Stilizare sprâncene',
        'Wash and style' => 'Spălat și aranjat',
        'Classic razor shave' => 'Bărbierit clasic',
        'Mon' => 'Lun',
        'Tue' => 'Mar',
        'Wed' => 'Mie',
        'Thu' => 'Joi',
        'Fri' => 'Vin',
        'Sat' => 'Sâm',
        'Sun' => 'Dum',
        'Jan' => 'ian',
        'Feb' => 'feb',
        'Mar' => 'mar',
        'Apr' => 'apr',
        'May' => 'mai',
        'Jun' => 'iun',
        'Jul' => 'iul',
        'Aug' => 'aug',
        'Sep' => 'sep',
        'Oct' => 'oct',
        'Nov' => 'noi',
        'Dec' => 'dec',
        'for' => 'pentru',
        'at' => 'la',
    ],
];

$oldTheme = $_SESSION['theme'] ?? 'light';
$theme = $oldTheme;
$themeChanging = false;
if (isset($_GET['theme']) && in_array($_GET['theme'], ['light', 'dark'], true)) {
    $theme = $_GET['theme'];
    $themeChanging = $_SERVER['REQUEST_METHOD'] == 'GET' && $theme != $oldTheme;
}
if (!in_array($theme, ['light', 'dark'], true)) {
    $theme = 'light';
}
$_SESSION['theme'] = $theme;

$oldLang = $_SESSION['lang'] ?? 'en';
$lang = $oldLang;
$langChanging = false;
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'ro'], true)) {
    $lang = $_GET['lang'];
    $langChanging = $_SERVER['REQUEST_METHOD'] == 'GET' && $lang != $oldLang;
}
if (!in_array($lang, ['en', 'ro'], true)) {
    $lang = 'en';
}
$_SESSION['lang'] = $lang;

$_SESSION['message'] ??= '';
$_SESSION['fail'] ??= '';
$_SESSION['bookings'] ??= [];
$_SESSION['breaks'] ??= [];
// Clean up session variables for past book-ins and breaks
$_SESSION['bookings'] = array_values(array_filter(
    $_SESSION['bookings'],
    fn (array $booking): bool => $booking['date'] >= date('Y-m-d')
));
$_SESSION['breaks'] = array_values(array_filter(
    $_SESSION['breaks'],
    fn (array $break): bool => $break['date'] >= date('Y-m-d')
));

if (isset($_GET['logout'])) {
    unset(
        $_SESSION['user'],
        $_SESSION['form'],
        $_SESSION['form_errors'],
        $_SESSION['booking_selection'],
        $_SESSION['manage_date']
    );
    $_SESSION['message'] = '';
    $_SESSION['fail'] = '';
    header('Location: index.php');
    exit;
}

$mode = $_GET['mode'] ?? '';
$nextTheme = $theme == 'dark' ? 'light' : 'dark';
// Keep current selections when changing theme or language
$themeUrl = pageUrl(['theme' => $nextTheme]);
$nextLang = $lang == 'ro' ? 'en' : 'ro';
$langUrl = pageUrl(['lang' => $nextLang]);
$screenContentClass = ($themeChanging || $langChanging) ? '' : 'screenContent';
$pageChangeClass = ($themeChanging || $langChanging) ? ' softChange' : '';
$redirectUrl = 'index.php';

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
    } elseif (isset($_POST['create_booking'])) {
        createBooking($specialists, $services);
    } elseif (isset($_POST['cancel_booking'])) {
        $redirectUrl = cancelBooking($specialists);
    } elseif (isset($_POST['create_break'])) {
        $redirectUrl = createBreak($specialists, $services);
    } elseif (isset($_POST['cancel_break'])) {
        $redirectUrl = cancelBreak();
    }

    if (!hasErrors()) {
        header('Location: ' . $redirectUrl);
        exit;
    }
}

$user = $_SESSION['user'] ?? null;

function pageUrl(array $changes): string
{
    $params = $_GET;
    unset($params['logout']);

    foreach ($changes as $key => $value) {
        if ($value === '' || $value === null) {
            unset($params[$key]);
        } else {
            $params[$key] = $value;
        }
    }

    if (empty($params)) {
        return 'index.php';
    }

    return 'index.php?' . http_build_query($params);
}

function loginGuest(): void
{
    $name = trim((string) ($_POST['guest_name'] ?? ''));
    $phone = trim((string) ($_POST['guest_phone'] ?? ''));

    $_SESSION['form']['guest_name'] = $name;
    $_SESSION['form']['guest_phone'] = $phone;

    if (empty($name)) {
        addFieldError('guest_name', __('Please complete your name.'));
    } elseif (!preg_match("/^[a-zA-Z .'-]{2,60}$/", $name)) {
        addFieldError(
            'guest_name',
            __('The name must contain only letters, spaces, dot, apostrophe or hyphen.')
        );
    }

    if (empty($phone)) {
        addFieldError('guest_phone', __('Please complete your phone number.'));
    } elseif (!validRomanianPhone($phone)) {
        addFieldError('guest_phone', __('The phone number length is incorrect.'));
    }

    if (!hasErrors()) {
        $name = ucwords(strtolower($name));

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

function createBooking(array $specialists, array $services): void
{
    $user = $_SESSION['user'] ?? [];
    $specialist = (string) ($_POST['specialist'] ?? '');
    $service = (string) ($_POST['service'] ?? '');
    $date = (string) ($_POST['date'] ?? '');
    $time = (string) ($_POST['time'] ?? '');

    if (empty($user) || $user['type'] != 'guest') {
        addError(__('Please login as guest before booking.'));
    }

    if (!isset($specialists[$specialist])) {
        addError(__('Please choose a valid specialist.'));
    } elseif (!in_array($service, $specialists[$specialist]['services'], true)) {
        addError(__('Please choose a valid service.'));
    }

    // A guest can book in only within the following month
    if (!dateInRange($date, 'tomorrow')) {
        addError(__('Please choose an available future day.'));
    }

    if (!validTime($time)) {
        addError(__('Please choose an available time.'));
    }

    $availableTimes = availableTimesForDate(
        $specialists,
        $services,
        $_SESSION['bookings'],
        $_SESSION['breaks'],
        $specialist,
        $service,
        $date
    );
    if (!hasErrors() && !in_array($time, $availableTimes, true)) {
        addError(__('This time is no longer available.'));
    }

    if (!hasErrors()) {
        $_SESSION['bookings'][] = [
            'id' => nextId($_SESSION['bookings']),
            'specialist' => $specialist,
            'service' => $service,
            'date' => $date,
            'time' => $time,
            'guest_name' => $user['name'],
            'guest_phone' => $user['phone'],
        ];

        addSuccess(__('Book-in confirmed. Payment is made at the salon.'));
    }
}

function cancelBooking(array $specialists): string
{
    $user = $_SESSION['user'] ?? [];
    $bookingId = (int) ($_POST['booking_id'] ?? 0);
    $manageDate = (string) ($_POST['manage_date'] ?? '');
    $redirectUrl = dateObject($manageDate)
        ? 'index.php?manage_date=' . urlencode($manageDate)
        : 'index.php';

    if (empty($user) || $user['type'] != 'specialist') {
        addError(__('Please login as specialist before cancelling bookings.'));
        return $redirectUrl;
    }

    foreach ($_SESSION['bookings'] as $key => $booking) {
        if ($booking['id'] == $bookingId && $booking['specialist'] == $user['specialist']) {
            unset($_SESSION['bookings'][$key]);
            $_SESSION['bookings'] = array_values($_SESSION['bookings']);
            addSuccess(__('Booking cancelled.'));
            return $redirectUrl;
        }
    }

    addError(__('Booking was not found.'));
    return $redirectUrl;
}

function createBreak(array $specialists, array $services): string
{
    $user = $_SESSION['user'] ?? [];
    $date = (string) ($_POST['manage_date'] ?? '');
    $time = (string) ($_POST['break_time'] ?? '');
    $duration = (string) ($_POST['break_duration'] ?? '');
    $allowedDurations = ['10' => 10, '20' => 20, '30' => 30, '60' => 60, 'day' => 540];
    $redirectUrl = dateObject($date) ? 'index.php?manage_date=' . urlencode($date) : 'index.php';

    if (empty($user) || $user['type'] != 'specialist') {
        addError(__('Please login as specialist before cancelling bookings.'));
        return $redirectUrl;
    }

    if (!dateInRange($date, 'today')
        || !specialistWorksOnDate($specialists, $user['specialist'], $date)
    ) {
        addError(__('Please choose a working day.'));
    }

    if (!isset($allowedDurations[$duration])) {
        addError(__('Please choose a valid break duration.'));
    }

    $minutes = $allowedDurations[$duration] ?? 0;
    if ($duration == 'day') {
        $time = '09:00';

        // Full-day break is allowed only when there are no appointments
        if (!empty(bookingsForSpecialistDate($_SESSION['bookings'], $user['specialist'], $date))) {
            addError(__('Full day break is allowed only when there are no appointments.'));
        }
    } elseif (!validTime($time)) {
        addError(__('Please choose an available time.'));
    }

    $start = validTime($time) ? minutesFromTime($time) : 0;
    if (!hasErrors()
        && ($start < minutesFromTime('09:00')
        || $start + $minutes > minutesFromTime('18:00'))
    ) {
        addError(__('This break does not fit in the working day.'));
    }

    // A break cannot overlap appointments or another break
    if (!hasErrors()
        && bookingOverlaps($_SESSION['bookings'], $services, $user['specialist'], $date, $start, $minutes)
    ) {
        addError(__('This break overlaps an appointment.'));
    }

    if (!hasErrors()
        && breakOverlaps($_SESSION['breaks'], $user['specialist'], $date, $start, $minutes)
    ) {
        addError(__('This break overlaps another break.'));
    }

    if (!hasErrors()) {
        $_SESSION['breaks'][] = [
            'id' => nextId($_SESSION['breaks']),
            'specialist' => $user['specialist'],
            'date' => $date,
            'time' => $time,
            'minutes' => $minutes,
        ];

        addSuccess(__('Break added.'));
    }

    return $redirectUrl;
}

function cancelBreak(): string
{
    $user = $_SESSION['user'] ?? [];
    $breakId = (int) ($_POST['break_id'] ?? 0);
    $manageDate = (string) ($_POST['manage_date'] ?? '');
    $redirectUrl = dateObject($manageDate)
        ? 'index.php?manage_date=' . urlencode($manageDate)
        : 'index.php';

    if (empty($user) || $user['type'] != 'specialist') {
        addError(__('Please login as specialist before cancelling bookings.'));
        return $redirectUrl;
    }

    foreach ($_SESSION['breaks'] as $key => $break) {
        if ($break['id'] == $breakId && $break['specialist'] == $user['specialist']) {
            unset($_SESSION['breaks'][$key]);
            $_SESSION['breaks'] = array_values($_SESSION['breaks']);
            addSuccess(__('Break removed.'));
            return $redirectUrl;
        }
    }

    addError(__('Break was not found.'));
    return $redirectUrl;
}

function nextId(array $items): int
{
    return empty($items) ? 1 : max(array_column($items, 'id')) + 1;
}

function bookingDates(string $startDay): array
{
    $dates = [];
    $date = new DateTimeImmutable($startDay);
    $lastDate = $date->modify('+1 month');

    while ($date <= $lastDate) {
        $dates[] = $date->format('Y-m-d');
        $date = $date->modify('+1 day');
    }

    return $dates;
}

function availableDatesForService(
    array $specialists,
    array $services,
    string $specialist,
    string $service
): array {
    $dates = [];

    // Keep full days visible; unavailable hours are grayed out later
    foreach (bookingDates('tomorrow') as $date) {
        if (hasWorkTimeForService($specialists, $services, $specialist, $service, $date)) {
            $dates[] = $date;
        }
    }

    return $dates;
}

function hasWorkTimeForService(
    array $specialists,
    array $services,
    string $specialist,
    string $service,
    string $date
): bool {
    if (!isset($specialists[$specialist], $services[$service])) {
        return false;
    }

    if (
        !in_array($service, $specialists[$specialist]['services'], true)
        || !dateInRange($date, 'tomorrow')
    ) {
        return false;
    }

    $dateObject = dateObject($date);
    if (empty($dateObject)) {
        return false;
    }

    $dayName = $dateObject->format('l');
    if (empty($specialists[$specialist]['schedule'][$dayName])) {
        return false;
    }

    // Show the day only if the selected service fits inside at least one working interval
    foreach ($specialists[$specialist]['schedule'][$dayName] as $interval) {
        if (minutesFromTime($interval[0]) + $services[$service]['minutes'] <= minutesFromTime($interval[1])) {
            return true;
        }
    }

    return false;
}

function specialistWorksOnDate(array $specialists, string $specialist, string $date): bool
{
    $dateObject = dateObject($date);

    return !empty($dateObject)
        && isset($specialists[$specialist]['schedule'][$dateObject->format('l')]);
}

function availableTimesForDate(
    array $specialists,
    array $services,
    array $bookings,
    array $breaks,
    string $specialist,
    string $service,
    string $date
): array {
    if (!isset($specialists[$specialist], $services[$service])) {
        return [];
    }

    if (!in_array($service, $specialists[$specialist]['services'], true) || !dateInRange($date, 'tomorrow')) {
        return [];
    }

    $dateObject = dateObject($date);
    if (empty($dateObject)) {
        return [];
    }

    $dayName = $dateObject->format('l');
    if (empty($specialists[$specialist]['schedule'][$dayName])) {
        return [];
    }

    $times = [];
    $duration = $services[$service]['minutes'];

    foreach ($specialists[$specialist]['schedule'][$dayName] as $interval) {
        $start = minutesFromTime($interval[0]);
        $end = minutesFromTime($interval[1]);

        // A time is available only if it does not overlap appointments or breaks
        for ($minute = $start; $minute + $duration <= $end; $minute += 10) {
            if (!bookingOverlaps($bookings, $services, $specialist, $date, $minute, $duration)
                && !breakOverlaps($breaks, $specialist, $date, $minute, $duration)) {
                $times[] = timeFromMinutes($minute);
            }
        }
    }

    return $times;
}

function visibleTimeSlots(): array
{
    $times = [];
    $start = minutesFromTime('09:00');
    $end = minutesFromTime('18:00');

    for ($minute = $start; $minute < $end; $minute += 10) {
        $times[] = timeFromMinutes($minute);
    }

    return $times;
}

function bookingOverlaps(
    array $bookings,
    array $services,
    string $specialist,
    string $date,
    int $start,
    int $duration
): bool {
    $end = $start + $duration;

    foreach ($bookings as $booking) {
        if ($booking['specialist'] != $specialist || $booking['date'] != $date) {
            continue;
        }

        $bookingStart = minutesFromTime($booking['time']);
        $bookingEnd = $bookingStart + $services[$booking['service']]['minutes'];

        if ($start < $bookingEnd && $end > $bookingStart) {
            return true;
        }
    }

    return false;
}

function breakOverlaps(
    array $breaks,
    string $specialist,
    string $date,
    int $start,
    int $duration
): bool {
    $end = $start + $duration;

    foreach ($breaks as $break) {
        if ($break['specialist'] != $specialist || $break['date'] != $date) {
            continue;
        }

        $breakStart = minutesFromTime($break['time']);
        $breakEnd = $breakStart + $break['minutes'];

        if ($start < $breakEnd && $end > $breakStart) {
            return true;
        }
    }

    return false;
}

function bookingsForSpecialistDate(array $bookings, string $specialist, string $date): array
{
    $results = [];

    foreach ($bookings as $booking) {
        if ($booking['specialist'] == $specialist && $booking['date'] == $date) {
            $results[] = $booking;
        }
    }

    usort($results, fn (array $first, array $second): int => strcmp($first['time'], $second['time']));

    return $results;
}

function breaksForSpecialistDate(array $breaks, string $specialist, string $date): array
{
    $results = [];

    foreach ($breaks as $break) {
        if ($break['specialist'] == $specialist && $break['date'] == $date) {
            $results[] = $break;
        }
    }

    usort($results, fn (array $first, array $second): int => strcmp($first['time'], $second['time']));

    return $results;
}

function dayItems(array $bookings, array $breaks): array
{
    $items = [];

    foreach ($bookings as $booking) {
        $items[] = ['type' => 'booking', 'time' => $booking['time'], 'data' => $booking];
    }

    foreach ($breaks as $break) {
        $items[] = ['type' => 'break', 'time' => $break['time'], 'data' => $break];
    }

    usort($items, fn (array $first, array $second): int => strcmp($first['time'], $second['time']));

    return $items;
}

function dateInRange(string $date, string $startDay): bool
{
    $dateObject = dateObject($date);
    $firstDate = new DateTimeImmutable($startDay);
    $lastDate = $firstDate->modify('+1 month');

    return !empty($dateObject) && $dateObject >= $firstDate && $dateObject <= $lastDate;
}

function dateObject(string $date): DateTimeImmutable|false
{
    $dateObject = DateTimeImmutable::createFromFormat('!Y-m-d', $date);

    if ($dateObject === false || $dateObject->format('Y-m-d') != $date) {
        return false;
    }

    return $dateObject;
}

function dateLabel(string $date): string
{
    $dateObject = dateObject($date);

    if (empty($dateObject)) {
        return $date;
    }

    return __(
        $dateObject->format('D')
    ) . ', ' . $dateObject->format('d') . ' ' . __($dateObject->format('M'));
}

function validTime(string $time): bool
{
    return (bool) preg_match('/^([01][0-9]|2[0-3]):[0-5][0-9]$/', $time);
}

function minutesFromTime(string $time): int
{
    [$hours, $minutes] = array_map('intval', explode(':', $time));

    return $hours * 60 + $minutes;
}

function timeFromMinutes(int $minutes): string
{
    return sprintf('%02d:%02d', intdiv($minutes, 60), $minutes % 60);
}

function serviceName(array $services, string $service): string
{
    return __($services[$service]['name']);
}

function durationLabel(int $minutes): string
{
    if ($minutes < 60) {
        return $minutes . 'min';
    }

    $hours = intdiv($minutes, 60);
    $remainingMinutes = $minutes % 60;

    return $remainingMinutes == 0 ? $hours . 'h' : $hours . 'h ' . $remainingMinutes . 'min';
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

$selectedSpecialist = (string) ($_GET['specialist'] ?? '');
if (!isset($specialists[$selectedSpecialist])) {
    $selectedSpecialist = '';
}

$selectedService = (string) ($_GET['service'] ?? '');
if ($selectedSpecialist == ''
    || !in_array($selectedService, $specialists[$selectedSpecialist]['services'], true)
) {
    $selectedService = '';
}

$availableBookingDates = [];
$availableBookingTimes = [];
$visibleBookingTimes = [];
$selectedDate = (string) ($_GET['date'] ?? '');
$bookingAnimation = '';

if (!empty($user)
    && $user['type'] == 'guest'
    && $selectedSpecialist != ''
    && $selectedService != ''
) {
    $availableBookingDates = availableDatesForService(
        $specialists,
        $services,
        $selectedSpecialist,
        $selectedService
    );

    if (!in_array($selectedDate, $availableBookingDates, true)) {
        $selectedDate = '';
    }

    if ($selectedDate != '') {
        $availableBookingTimes = availableTimesForDate(
            $specialists,
            $services,
            $_SESSION['bookings'],
            $_SESSION['breaks'],
            $selectedSpecialist,
            $selectedService,
            $selectedDate
        );
        $visibleBookingTimes = visibleTimeSlots();
    }
}

if (!empty($user) && $user['type'] == 'guest') {
    $lastSelection = $_SESSION['booking_selection'] ?? [];

    // Animate only the new section that appears after each guest selection
    if ($selectedSpecialist != '' && ($lastSelection['specialist'] ?? '') != $selectedSpecialist) {
        $bookingAnimation = 'service';
    } elseif ($selectedService != '' && ($lastSelection['service'] ?? '') != $selectedService) {
        $bookingAnimation = 'day';
    } elseif ($selectedDate != '' && ($lastSelection['date'] ?? '') != $selectedDate) {
        $bookingAnimation = 'time';
    }

    $_SESSION['booking_selection'] = [
        'specialist' => $selectedSpecialist,
        'service' => $selectedService,
        'date' => $selectedDate,
    ];
}

$manageDate = (string) ($_GET['manage_date'] ?? (new DateTimeImmutable('today'))->format('Y-m-d'));
if (!dateInRange($manageDate, 'today')) {
    $manageDate = (new DateTimeImmutable('today'))->format('Y-m-d');
}

$manageAnimationClass = '';
if (!empty($user) && $user['type'] == 'specialist') {
    $lastManageDate = $_SESSION['manage_date'] ?? '';

    // Animate only the specialist list after changing the managed day
    if ($lastManageDate != '' && $lastManageDate != $manageDate) {
        $manageAnimationClass = 'stepFade';
    }

    $_SESSION['manage_date'] = $manageDate;
}

$loggedScreenClass = !empty($user) ? '' : $screenContentClass;
$serviceAnimationClass = $bookingAnimation === 'service' ? 'stepFade' : '';
$dayAnimationClass = $bookingAnimation === 'day' ? 'stepFade' : '';
$timeAnimationClass = $bookingAnimation === 'time' ? 'stepFade' : '';

$managedBookings = [];
$managedBreaks = [];
$managedItems = [];
if (!empty($user) && $user['type'] == 'specialist') {
    $managedBookings = bookingsForSpecialistDate($_SESSION['bookings'], $user['specialist'], $manageDate);
    $managedBreaks = breaksForSpecialistDate($_SESSION['breaks'], $user['specialist'], $manageDate);
    $managedItems = dayItems($managedBookings, $managedBreaks);
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

        .softChange .mainDiv {
            animation: windowSoftFade .75s ease;
        }

        .softChange .homeDiv {
            animation: windowSoftFade .75s ease, enableChoices .01s linear 2s forwards;
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

        .stepFade {
            /* Animate only popped-in info */
            animation: screenFade .35s ease;
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

        .languageToggle.langChanging::before,
        .themeToggle.themeChanging::before {
            /* Animate toggle button */
            animation: knobToLight .35s ease both;
        }

        .languageToggle.en.langChanging::before,
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
            /* Hover animation */
            border-color: var(--accent);
            box-shadow: 0 3px 10px rgba(0, 100, 0, 0.18);
            transform: translateY(-4px);
        }

        .bookingPanel {
            --manageField: 260px;
            margin-top: 4px;
            text-align: left;
        }

        .bookingPanel h3 {
            color: var(--accent);
            margin: 18px 0 10px;
            text-align: left;
        }

        .manageForm {
            width: var(--manageField);
            max-width: 100%;
            margin-bottom: 14px;
        }

        .manageForm select {
            min-height: 38px;
        }

        .breakForm {
            /* Compact controls for specialist breaks */
            display: grid;
            grid-template-columns: var(--manageField) 180px auto;
            align-items: end;
            gap: 10px;
            margin-bottom: 14px;
        }

        .breakForm .submitButton {
            padding: 8px 16px;
            white-space: nowrap;
        }

        .optionGrid,
        .timeGrid,
        .bookingList {
            display: grid;
            gap: 10px;
        }

        .optionGrid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }

        .dayGrid {
            /* Five day buttons per row */
            grid-template-columns: repeat(5, minmax(0, 1fr));
        }

        .timeGrid {
            gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(64px, 1fr));
        }

        .optionCard,
        .bookingItem {
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--card);
            padding: 12px;
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .optionCard {
            color: inherit;
            text-decoration: none;
        }

        .bookingItem {
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: center;
            gap: 12px;
        }

        .bookingInfo p {
            margin: 4px 0 0;
        }

        .optionCard:hover,
        .bookingItem:hover {
            border-color: var(--accent);
            box-shadow: 0 3px 10px rgba(0, 100, 0, 0.18);
            transform: translateY(-3px);
        }

        .optionCard.active {
            border-color: var(--accent);
            box-shadow: 0 0 0 2px var(--line);
        }

        .optionCard strong,
        .bookingItem strong {
            color: var(--accent);
        }

        .timeButton {
            width: 100%;
            min-height: 32px;
            padding: 6px 8px;
            font-size: .92rem;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .timeButton:hover {
            box-shadow: 0 3px 10px rgba(0, 100, 0, 0.18);
            transform: translateY(-3px);
        }

        .timeButton:disabled {
            /* Gray out unavailable hours */
            background: var(--soft);
            border-color: var(--line);
            color: var(--muted);
            cursor: not-allowed;
            opacity: .6;
        }

        .timeButton:disabled:hover {
            box-shadow: none;
            transform: none;
        }

        .dangerButton {
            background: var(--error);
            border-color: var(--error);
        }

        .trashButton {
            width: 40px;
            height: 40px;
            min-height: 40px;
            padding: 0;
            border-radius: 50%;
            font-size: 1.65rem;
        }

        .muted {
            color: var(--muted);
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

        @keyframes windowSoftFade {
            from {
                opacity: .35;
                filter: blur(3px);
                transform: scale(.99);
            }

            to {
                opacity: 1;
                filter: blur(0);
                transform: scale(1);
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
            margin: 6px 0 8px;
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
            padding-bottom: 44px;
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

            .dayGrid {
                grid-template-columns: repeat(auto-fit, minmax(110px, 1fr));
            }

            .manageForm {
                width: 100%;
                max-width: none;
            }

            .breakForm {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body
    class="<?= e($theme); ?>Theme<?= e($pageChangeClass); ?>">
    <main class="page">
        <div class="topControls">
            <a class="switchToggle languageToggle <?= e($lang); ?><?= $langChanging ? ' langChanging' : ''; ?>"
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
            <div class="<?= e($loggedScreenClass); ?>">
                <div class="top">
                    <h2><?= e(__('Welcome back,')); ?>
                        <?= e(ucwords(strtolower($user['name']))); ?>.
                    </h2>
                    <a class="button secondary logoutButton right"
                        href="index.php?logout=1"><?= e(__('Logout')); ?></a>
                </div>
                <?php displayMessages(); ?>

                <?php if ($user['type'] == 'guest'): ?>
                <div class="bookingPanel">
                    <h3><?= e(__('Choose specialist')); ?>
                    </h3>
                    <div class="optionGrid">
                        <?php foreach ($specialists as $id => $specialist): ?>
                        <a class="optionCard <?= $selectedSpecialist == $id ? 'active' : ''; ?>"
                            href="index.php?<?= e(http_build_query(['specialist' => $id])); ?>">
                            <strong><?= e($specialist['name']); ?></strong><br>
                            <span
                                class="muted"><?= e(__($specialist['role'])); ?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>

                    <?php if ($selectedSpecialist != ''): ?>
                    <div class="<?= e($serviceAnimationClass); ?>">
                        <h3><?= e(__('Choose service')); ?>
                        </h3>
                        <div class="optionGrid">
                            <?php foreach ($specialists[$selectedSpecialist]['services'] as $serviceId): ?>
                            <a class="optionCard <?= $selectedService == $serviceId ? 'active' : ''; ?>"
                                href="index.php?<?= e(http_build_query(['specialist' => $selectedSpecialist, 'service' => $serviceId])); ?>">
                                <strong><?= e(serviceName($services, $serviceId)); ?></strong><br>
                                <span
                                    class="muted"><?= e(durationLabel($services[$serviceId]['minutes'])); ?></span>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($selectedService != ''): ?>
                    <div class="<?= e($dayAnimationClass); ?>">
                        <h3><?= e(__('Choose day')); ?>
                        </h3>

                        <?php if (empty($availableBookingDates)): ?>
                        <p class="muted">
                            <?= e(__('No available days for this service.')); ?>
                        </p>
                        <?php else: ?>
                        <div class="optionGrid dayGrid">
                            <?php foreach ($availableBookingDates as $date): ?>
                            <a class="optionCard <?= $selectedDate == $date ? 'active' : ''; ?>"
                                href="index.php?<?= e(http_build_query(['specialist' => $selectedSpecialist, 'service' => $selectedService, 'date' => $date])); ?>">
                                <strong><?= e(dateLabel($date)); ?></strong>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <?php if ($selectedDate != ''): ?>
                    <div class="<?= e($timeAnimationClass); ?>">
                        <h3><?= e(__('Choose time')); ?>
                        </h3>

                        <?php if (empty($visibleBookingTimes)): ?>
                        <p class="muted">
                            <?= e(__('No available times for this day.')); ?>
                        </p>
                        <?php else: ?>
                        <div class="timeGrid">
                            <?php foreach ($visibleBookingTimes as $time): ?>
                            <?php $timeIsAvailable = in_array($time, $availableBookingTimes, true); ?>
                            <?php if (!$timeIsAvailable): ?>
                            <button class="timeButton" type="button"
                                disabled><?= e($time); ?></button>
                            <?php else: ?>
                            <?php $confirmText = __('Are you sure you want to book') . ' ' . strtolower(serviceName($services, $selectedService)) . ' ' . __('for') . ' ' . strtolower(dateLabel($selectedDate)) . ' ' . __('at') . ' ' . $time . '?'; ?>
                            <form method="post"
                                onsubmit="return confirm(<?= e(json_encode($confirmText)); ?>);">
                                <input type="hidden" name="specialist"
                                    value="<?= e($selectedSpecialist); ?>">
                                <input type="hidden" name="service"
                                    value="<?= e($selectedService); ?>">
                                <input type="hidden" name="date"
                                    value="<?= e($selectedDate); ?>">
                                <input type="hidden" name="time"
                                    value="<?= e($time); ?>">
                                <button class="timeButton" type="submit"
                                    name="create_booking"><?= e($time); ?></button>
                            </form>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if ($user['type'] == 'specialist'): ?>
                <div class="bookingPanel">
                    <form method="get" class="manageForm">
                        <input type="hidden" name="theme"
                            value="<?= e($theme); ?>">
                        <input type="hidden" name="lang"
                            value="<?= e($lang); ?>">
                        <label>
                            <?= e(__('Choose day to manage')); ?>
                            <select name="manage_date" onchange="this.form.submit()">
                                <?php foreach (bookingDates('today') as $date): ?>
                                <option value="<?= e($date); ?>" <?= selected($manageDate, $date); ?>>
                                    <?= e(dateLabel($date)); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </form>

                    <form method="post" class="breakForm">
                        <input type="hidden" name="manage_date"
                            value="<?= e($manageDate); ?>">
                        <label>
                            <?= e(__('Choose time')); ?>
                            <select name="break_time">
                                <?php foreach (visibleTimeSlots() as $time): ?>
                                <option value="<?= e($time); ?>">
                                    <?= e($time); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </label>

                        <label>
                            <?= e(__('Break duration')); ?>
                            <select name="break_duration">
                                <option value="10">10min</option>
                                <option value="20">20min</option>
                                <option value="30">30min</option>
                                <option value="60">1h</option>
                                <option value="day" <?= empty($managedBookings) ? '' : 'disabled'; ?>>
                                    <?= e(__('Entire day')); ?>
                                </option>
                            </select>
                        </label>

                        <button class="submitButton" type="submit" name="create_break">
                            +
                            <?= e(__('Break')); ?>
                        </button>
                    </form>

                    <div class="<?= e($manageAnimationClass); ?>">
                        <?php if (empty($managedItems)): ?>
                        <p class="muted">
                            <?= e(__('No bookings or breaks for this day.')); ?>
                        </p>
                        <?php else: ?>
                        <div class="bookingList">
                            <?php foreach ($managedItems as $item): ?>
                            <?php if ($item['type'] == 'booking'): ?>
                            <?php $booking = $item['data']; ?>
                            <div class="bookingItem">
                                <?php $bookingEnd = timeFromMinutes(minutesFromTime($booking['time']) + $services[$booking['service']]['minutes']); ?>
                                <div class="bookingInfo">
                                    <strong><?= e($booking['time']); ?>
                                        -
                                        <?= e($bookingEnd); ?></strong>
                                    <p>
                                        <?= e(serviceName($services, $booking['service'])); ?><br>
                                        <?= e(ucwords(strtolower($booking['guest_name']))); ?>,
                                        <?= e($booking['guest_phone']); ?>
                                    </p>
                                </div>

                                <?php $cancelText = __('Are you sure you want to cancel') . ' ' . strtolower(serviceName($services, $booking['service'])) . ' ' . __('for') . ' ' . strtolower(dateLabel($booking['date'])) . ' ' . __('at') . ' ' . $booking['time'] . '?'; ?>
                                <form method="post"
                                    onsubmit="return confirm(<?= e(json_encode($cancelText)); ?>);">
                                    <input type="hidden" name="booking_id"
                                        value="<?= e($booking['id']); ?>">
                                    <input type="hidden" name="manage_date"
                                        value="<?= e($manageDate); ?>">
                                    <button class="dangerButton trashButton" type="submit" name="cancel_booking"
                                        aria-label="<?= e(__('Cancel booking')); ?>"
                                        title="<?= e(__('Cancel booking')); ?>">
                                        &#128465;
                                    </button>
                                </form>
                            </div>
                            <?php else: ?>
                            <?php $break = $item['data']; ?>
                            <div class="bookingItem">
                                <?php $breakEnd = timeFromMinutes(minutesFromTime($break['time']) + $break['minutes']); ?>
                                <div class="bookingInfo">
                                    <strong>
                                        <?= $break['minutes'] == 540 ? e(__('Entire day')) : e($break['time'] . ' - ' . $breakEnd); ?>
                                    </strong>
                                    <p><?= e(__('Break')); ?>
                                        <?= $break['minutes'] == 540 ? '' : e(durationLabel($break['minutes'])); ?>
                                    </p>
                                </div>

                                <form method="post">
                                    <input type="hidden" name="break_id"
                                        value="<?= e($break['id']); ?>">
                                    <input type="hidden" name="manage_date"
                                        value="<?= e($manageDate); ?>">
                                    <button class="dangerButton trashButton" type="submit" name="cancel_break"
                                        aria-label="<?= e(__('Cancel booking')); ?>"
                                        title="<?= e(__('Cancel booking')); ?>">
                                        &#128465;
                                    </button>
                                </form>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
    </main>
</body>

</html>