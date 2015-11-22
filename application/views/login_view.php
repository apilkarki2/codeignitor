
   
    <!-- <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <input type="submit" value="Login"/>
   </form>
 </body>
</html>-->

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<div class="logo">Admin Panel</div>
<div class="login-block">
    <h1>Login</h1>
	<?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
    <input type="text" value=""  placeholder="Username" name="username" id="username" />
   
	 <input type="password" size="20" id="passowrd" name="password"/>
    <button>Submit</button>
</div>