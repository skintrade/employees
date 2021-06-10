<?php

function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        return false;
    }

    $errstr = htmlspecialchars($errstr);
    switch ($errno) {
    case E_USER_ERROR:
        error_to_console('FATAL ERR: ' . 'ERRNO: ' . $errno . ' INFO: ' . $errstr . ' REFER FILE: ' . $errfile . ' LINE: '. $errline . ' PHP ' . PHP_VERSION . ' (' . PHP_OS . ')');
        echo "<b>ERROR</b> [$errno] $errstr<br />\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Please contact the system administrator with this detail.<br />\n";
        echo "Aborting...<br />\n";
        exit(1);

    case E_USER_WARNING:
        error_to_console('WARNING: ' . 'ERRNO: ' . $errno . ' INFO: ' . $errstr . ' REFER FILE: ' . $errfile . ' LINE: '. $errline);
        echo "<b>WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        error_to_console('NOTICE: ' . 'ERRNO: ' . $errno . ' INFO: ' . $errstr . ' REFER FILE: ' . $errfile . ' LINE: '. $errline);
        //echo "<b>NOTICE</b> $errstr<br />\n";
        break;

    default:
        error_to_console('Unknown error type: ' . 'ERRNO: ' . $errno . ' INFO: ' . $errstr . ' REFER FILE: ' . $errfile . ' LINE: '. $errline);
        echo "Unknown error type: [$errno] $errstr<br />\n";
        echo "Please contact the system administrator with this detail.<br />\n";
        break;
    }

    return true;
}

function error_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Error: " . $output . "' );</script>";
}

$old_error_handler = set_error_handler("myErrorHandler");
