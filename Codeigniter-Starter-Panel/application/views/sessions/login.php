<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo base_url() ?>" />
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css"> 
</head>

<body onload="document.getElementById('username').focus()">
<?php echo form_open('sessions/login'); ?>
    <div id="box">
        <h2>Login</h2>
        <fieldset>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php echo set_value('username'); ?>" id="username">
            </div>
        
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" value="" id="password">
            </div>
        
            <div style="margin-left:250px">
                <input type="submit" name="enter" value="Login" class="btn_grey">
            </div>
            
            <?php if(isset($error)): ?>
            <div><?php echo $error ?></div>
            <?php endif ?>
        </fieldset>
    </div>
<?php echo form_close(); ?>
</body>
</html>
