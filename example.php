<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>SASLA Example Form</title>
    </head>

    <body>
        <h3>SASLA Example Form</h3>

        <?php
        /*
         * Add the two functions to create or resume a PHP session; if you haven't done so, ignore otherwise.
         * 
         */

        ob_start();
        session_start();

        // Include the SASLA class
        require 'sasla.php';

        if (!empty($_POST)) {
            /*
             * Spam checking...      
             */

            if (Sasla::isASpam()) {
                echo '<strong>GO AWAY SPAMmer. SASLA in Action</strong>';
            } else {
                echo "This is what I got: <br /><pre>";
                print_r($_POST);
                echo '</pre>';
            }
        }
        ?>

        <form name="sasla" method="post" action="">

            <?php
            /* Initial Protection code
             * You can put it anywhere inside the <form> tag
             */

            Sasla::protectMe();
            ?>

            <p>
                <label for="textfield">Name</label>
                <input type="text" name="textfield" id="textfield" />
            </p>
            <p>
                <label for="textfield2">E-mail</label>
                <input type="text" name="textfield2" id="textfield2" />
            </p>
            <p>
                <label for="textfield3">Message</label>
                <input type="text" name="textfield3" id="textfield3" />
            </p>
            <p>
                <input type="submit" name="button" id="button" value="Send" />
            </p>
        </form>
        <p>&nbsp;</p>
    </body>
</html>
