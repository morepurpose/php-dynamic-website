<?php
date_default_timezone_set('America/Toronto');
$hour = date('G');
if ($hour >= 5 && $hour <= 11) {
    $greeting = 'Good morning';
    $backgroundimage = 'https://th.bing.com/th/id/R.2bfea5590668c832b177a56292ae136d?rik=Rdy8mcDFxQ1e1Q&riu=http%3a%2f%2fwww.bullshift.net%2fdata%2fimages%2f2013%2f09%2fbeautiful-morning-wallpaper-2048x1152.jpg&ehk=JNdzhBqg1yECeYaUbZeK2af4jIZeEA1RaM3eQfXOTvM%3d&risl=&pid=ImgRaw&r=0';
} elseif ($hour >= 12 && $hour <= 17) {
    $greeting = 'Good afternoon';
    $backgroundimage = 'https://th.bing.com/th/id/OIP.0JvEShfmwgqXDdAuNlc6wAHaE-?rs=1&pid=ImgDetMain';
} elseif ($hour >= 18 && $hour <= 20) {
    $greeting = 'Good evening';
    $backgroundimage = 'https://www.bing.com/images/search?view=detailV2&ccid=5c%2f7FG98&id=10CC5B40AC9E21F92E5CCABEC76A52911A735A35&thid=OIP.5c_7FG98mJBF1lXcDpZJGQHaJQ&mediaurl=https%3a%2f%2fwallpaperaccess.com%2ffull%2f1244442.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.e5cffb146f7c989045d655dc0e964919%3frik%3dNVpzGpFSase%252byg%26pid%3dImgRaw%26r%3d0&exph=1250&expw=1000&q=evening+scence+image&simid=608048961769850259&FORM=IRPRST&ck=F494F7A134BB6BB16B9B6ACD7E8D9E7A&selectedIndex=0&idpp=overlayview&ajaxhist=0&ajaxserp=0';
} else {
    $greeting = 'Good night';
    $backgroundimage = 'https://th.bing.com/th/id/R.5ee1c10f42857fd4443d46d93edf3914?rik=DoLbtO3SGNDgWQ&riu=http%3a%2f%2fgetwallpapers.com%2fwallpaper%2ffull%2ff%2f6%2fd%2f113033.jpg&ehk=HVarKY9iKSfR1PKvkki0wPj9BvX7mmiwq35Y7JAPYcg%3d&risl=&pid=ImgRaw&r=0';
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    if ($num1 < 3 || $num1 > 12 || $num2 < 3 || $num2 > 12) {
        echo '<p>Please enter two numbers between 3 and 12.</p>';
    } else {
        echo '<table>';

        for ($i = 1; $i <= $num1; $i++) {
            echo '<tr>';

            for ($j = 1; $j <= $num2; $j++) {
                echo '<td>' . $i * $j . '</td>';
            }

            echo '</tr>';
        }

        echo '</table>';
    }
}
?>

<?php
if (!isset($_COOKIE['hit_counter'])) {
    setcookie('hit_counter', 1, time() + 86400, '/');
} else {
    $count = $_COOKIE['hit_counter'] + 1;
    setcookie('hit_counter', $count, time() + 86400, '/');
}
?>

<div style="position: fixed; bottom: 0; right: 0; background-color: white; opacity: 0.8; padding: 5px;">
    <?php echo "Page is visited" . $_COOKIE['hit_counter'] . " times."; ?>
</div>

<?php
if (isset($_GET['image'])) {
    $image_name = '';
    $image_url = '';

    switch ($_GET['image']) {
        case 'skeldance.gif':
            $image_name = 'Halloween image is skeldance.gif';
            $image_url = 'skeldance.gif';
            break;
        case 'jackwalk.gif':
            $image_name = 'Halloween image is jackwalk.gif';
            $image_url = 'jackwalk.gif';
            break;
        case 'bat1.gif':
            $image_name = 'Halloween image is bat1.gif';
            $image_url = 'bat1.gif';
            break;
        default:
            break;
    }

    if ($image_name != '' && $image_url != '') {
        echo '<div style="position: fixed; top: 0; right: 0; opacity: 0.8;">';
        echo '<img src="' . $image_url . '" alt="' . $image_name . '" style="max-width: 200px; opacity: 0.5;">';
        echo '<p style="font-size: 0.5em;">' . $image_name . '</p>';
        echo '</div>';
    }
}
?>



<form method="post">
    <label for="num1">Number 1:</label>
    <input type="number" name="num1" id="num1" min="3" max="12" required>

    <label for="num2">Number 2:</label>
    <input type="number" name="num2" id="num2" min="3" max="12" required>

    <button type="submit">Generate Table</button>
</form>

<!DOCTYPE html>
<html>
<head>
    <title>lab08</title>
    <style>
        body {
            background-image: url('<?php echo $backgroundimage; ?>');
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            font-size: 50px;
            text-align: center;
            text-shadow: 2px 2px 4px #000000;
        }
    </style>
</head>
<body>
    <?php echo $greeting; ?>
</body>
</html>
