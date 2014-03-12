<?php

/*
 * SASLA – Simple Anti Spam Lite Approach
 * Author: Mithun John Jacob
 * More info: http://mithunjj.com/sasla/
 * License: MIT License (http://opensource.org/licenses/MIT)
 */

class Sasla {
    /*
     * Protects your forms from spam
     * Place it anywhere inside the <form> tag.
     *      
     */

    public static function protectMe() {

        $sasla_box = '';
        $data = uniqid(microtime(), true);

        if (function_exists('hash')) {
            $sasla_box = hash('sha256', $data);
        } else {
            $sasla_box = sha1($data);
        }

        $_SESSION['sasla_box'] = $sasla_box;
        echo '<noscript><input type="hidden" name="jscheck" value="0"></noscript>';
        echo "<input type=\"text\" name=\"$sasla_box\" value=\"\" style=\"display:none\">";
    }

    /*
     * Validates whether the form submission is a spam or not     
     * 
     * @return TRUE if the POST is a spam or FALSE if not a spam
     */

    public static function isASpam() {
        $sec_box_name = $_SESSION['sasla_box'];

        if (isset($_POST['jscheck']) && $_POST['jscheck'] == 0 || !empty($_POST[$sec_box_name])) {
            return TRUE;
        } else {
            unset($_SESSION['sasla_box']);
            return FALSE;
        }
    }

}

?>
