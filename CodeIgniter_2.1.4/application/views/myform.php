<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('registerController'); ?>

<h5>Email Address</h5>
<input type="text" name="email" value="" size="50" />

<h5>Password</h5>
<input type="password" name="password" value="" size="50" />

<h5>Password Confirm</h5>
<input type="password" name="passconf" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>
