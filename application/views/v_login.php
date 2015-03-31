<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
         <base href="<?php echo base_url() ?>" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/default.css" />
        <link rel="shortcut icon" href="<?php echo base_url();?>/favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/animate-custom.css" />
    </head>
    <body>
        <!--aqui esta el controlador de login-->
        <?php echo form_open('c_login/login'); ?>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
               
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
          
            <section>	
                <br>
                 <br>
                 <br>
                  <br>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Usuario</label>
                                    <input id="username" name="username" required="required" type="text" value="<?= set_value('username'); ?>" placeholder="ingrese su nombre de usuario"/>
                                            <div class="LoginUsuariosError">
                                    <!--	<?
                                            if(isset($error)){
                                                    echo "<p>".$error."</p>";
                                            }
                                            echo form_error('username');
                                            ?>-->
                                            </div>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Contraseña </label>
                                    <input id="password" name="password" value="<?= set_value('password'); ?>" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                                                <div class="LoginUsuariosError">
                                                            	<?
                                                                    if(isset($error)){
                                                                            echo "<p>".$error."</p>";
                                                                    }
                                                                    echo form_error('username');
                                                                    ?>
                                                                    </div>
                                                                <div class="LoginUsuariosError"><?= form_error('password');?></div>
                               
                            </form>
                        </div>

                      
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>