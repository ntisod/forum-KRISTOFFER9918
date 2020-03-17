<div class="container">
    <div id="signup">
        <div class="signup-screen">
            <div class="space-bot text-center">
                <h1>Sign up</h1>
                <div class="divider"></div>
            </div>
            <form class="form-register"  method="post" name="register" novalidate>
                <div class="input-field col s6">
                    <input id="first-name" type="text" value="<?php echo $firstName;?>" class="validate" required>
                    <label for="first-name">First Name</label>
                </div>
                <p class="alert alert-danger" ng-show="form-register.email.$error.email"><?php echo $firstNameErr;?></p>
                <div class="input-field col s6">
                    <input id="last-name" type="text" class="validate" required>
                    <label for="last-name">Last Name</label>
                </div>
                <p class="alert alert-danger" ng-show="form-register.email.$error.email"><?php echo $lastNameErr;?></p>
                <div class="input-field col s6">
                    <input id="email" type="email" name="email" ng-model="email" class="validate" required>
                    <label for="email">Email</label>
                </div>
                <p class="alert alert-danger" ng-show="form-register.email.$error.email"><?php echo $emailErr;?></p>
                <div class="input-field col s6">
                    <input id="password" type="password" name="password" ng-model="password" ng-minlength='6' class="validate" required>
                    <label for="password">Password</label>
                </div>
                <p class="alert alert-danger" ng-show="form-register.password.$error.minlength || form.password.$invalid">Your password must be at least 6 characters.</p>
                <div class="space-top text-center">
                    <input type="submit" value="Done">
                    <button type="button" class="waves-effect waves-light btn cancel">
                    <i class="material-icons left">clear</i>Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>