<?php
    include_once('../templates/header.php');
?>
<div class="form">
      
        <?php if(isset($_SESSION['error']) && ($_SESSION['error'] != '')){ ?>
            <div class="errorMessage"><?php echo $_SESSION['error']; ?></div>
        <?php } ?>
    
      <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
      </ul>
      
      <div class="tab-content">
          
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="loginVerification.php" method="post">
          
            <div class="field-wrap">
                <label>
                  Username<span class="req">*</span>
                </label>
                <input name="username" type="text" required autocomplete="off"/>
            </div>
          
            <div class="field-wrap">
                <label>
                  Password<span class="req">*</span>
                </label>
                <input name="password" type="password" required autocomplete="off"/>
            </div>
          
            <button type="submit" name="submit" value="submit" class="button button-block"/>Log In</button>
          
          </form>

        </div>  
          
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="registerVerification.php" method="post">
            
            <div class="field-wrap">
                <label>
                    Username<span class="req">*</span>
                </label>
                <input name="usernameReg" type="text" required autocomplete="off" />
            </div>
            <!--<div class="top-row">-->
            <div class="field-wrap">
                <label>
                    Set A Password<span class="req">*</span>
                </label>
                <input name="passwordReg" type="password" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
                <label>
                    Password confirmation<span class="req">*</span>
                </label>
                <input name="passwordConfirmReg" type="password" required autocomplete="off"/>
            </div>
            <!--</div>-->    

            <div class="field-wrap">
                <label>
                    Email Address<span class="req">*</span>
                </label>
                <input name="emailReg" type="email" required autocomplete="off"/>
            </div>
              
            <div class="field-wrap">
                <label>
                    Phone number<span class="req">*</span>
                </label>
                <input name="phoneReg" type="number" min="10" required autocomplete="off"/>
            </div>  
          
          <button type="submit" name="submit" value="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

        
    </body>
</html>