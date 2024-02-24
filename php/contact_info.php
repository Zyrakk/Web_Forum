# faq, email, user_id, date, topic (1-6), opt (1-3), terms

<?php

    session_start();

    include_once('../Config/connect.php');

    if (isset($_POST['faq']) && isset($_POST['email']) && isset($_POST['user_id']) && isset($_POST['date']) && isset($_POST['topic']) && isset($_POST['opt']) && isset($_POST['terms'])) {

        function validar($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $faq = validar($_POST['faq']);
        $email = validar($_POST['email']);
        $user_id = validar($_POST['user_id']);
        $date = validar($_POST['date']);
        $ = validar($_POST['faq']);
        $faq = validar($_POST['faq']);
        $faq = validar($_POST['faq']);





    }

?>