<?php

// Check if coming from a POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = $email;
    $to = 'you@youremail.com';
    $subject = 'New Message';
    $human = $_POST['human'];

    $body = "From: $name\n E-Mail: $email\n Message:\n $message";

    if ($_POST['submit']) {
        if ($name != '' && $email != '') {
            if ($human == '4') {
                if (mail($to, $subject, $body, $from)) {
                    echo '<h4>Your message has been sent!</h4>';
                } else {
                    echo '<h4>Something went wrong, go back and try again!</h4>';
                } //endif
            } else if ($_POST['submit'] && $human != '4') {
                echo '<h4>You answered the anti-spam question incorrectly!</h4>';
            }
        } else {
            echo '<h4>You need to fill in all required fields!!</h4>';
        } //endif
    } //endif

} //endif

?>
<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

    <label>Name</label>
    <input name="name" placeholder="Type Here" value="<?php if (isset($_POST['name'])) {
                                                            echo $name;
                                                        } ?>">
    <label>Email</label>
    <input name="email" placeholder="Type Here" id="email" value="<?php if (isset($_POST['email'])) {
                                                                        echo $email;
                                                                    } ?>">
    <label>Message</label>
    <textarea name="message" placeholder="Type Here"><?php if (isset($_POST['message'])) {
                                                            echo $message;
                                                        } ?></textarea>


    <label>Human Verification</label>
    <input name="human" placeholder="2 + 2 = ? " id="human" value="<?php if (isset($_POST['human'])) {
                                                                        echo $human;
                                                                    } ?>">
    <input id="submit" name="submit" type="submit" value="Submit">
    </label>
</form>