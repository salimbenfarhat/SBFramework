<?php 

function render($view, $template = null,  $variables = null) {
    $v_path = '/app/view/';
    $path = str_replace('\\', '/', ROOT . $v_path);
    ob_start();
    require($path . str_replace('.', '/', $view) . '.php');
    $content = ob_get_clean();
    if(isset($template)) {
        require($path . 'app/template/' . $template . '.php');
    }
}

function forbidden(){
    header('HTTP/1.0 403 Forbidden');
    die('Acces interdit');
}

function notFound(){
    header('HTTP/1.0 404 Not Found');
    die('Page introuvable');
}

function test_field($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function is_post() {
    return ($_SERVER['REQUEST_METHOD'] ?? 'CLI') === 'POST';
}

function redirect($url) {
    header("Location: $url");
    die();
}

function redirect_after($url, $seconds) {
    header("Refresh:$seconds; url=$url");
    die();
}

function randomString($number_chars) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $randomletter = substr(str_shuffle($characters), 0, $number_chars);
    return $randomletter;
}

function alert($message, $type = null) {
    if($type == "is-valid") {
        echo '<div class="valid-feedback">'.$message.'</div>';
    } elseif($type == "is-invalid") {
        echo '<div class="invalid-feedback">'.$message.'</div>';
    } elseif($type == "success") {
        echo "<h3 style='color:green; text-align: center;'>$message</h3>";
    } else {
        echo "<h3 style='color:red; text-align: center;'>$message</h3>";
    }
}

?>