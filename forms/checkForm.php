<?php
function formIsset (...$inputNames): bool {
    foreach ($inputNames as $inputName) {
        if (!isset($_POST[$inputName])) {
            return false;
        }
    }
    return true;
}

function checkRange (string$value, int$min, int$max, $redirect):void {
    if (strlen($value) < $min || strlen($value) > $max) {
        header("Location: ". $redirect);
        exit();
    }

}

function checkFilter($var) {
    if (!$var) {
        header("Location: /index.php");
    }
};