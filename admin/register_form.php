




<div class="panel panel-default">
   <!--  <div class="panel-heading">
    <h3 class="panel-title"><img class="header-logo" src="../frontend/img/tetramap-text.png" /></h3>
    </div> -->
    <div class="panel-body">
     <form class="form-signin" method="post" ng-submit="submitRegister()">
      <div class="form-group">
       <label>Enter Your Name</label>
       <input type="text" name="name" ng-model="registerData.name" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" name="email" ng-model="registerData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="registerData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="register" class="btn btn-primary" value="Register" />
      <!--  <br />
       <input type="button" name="login_link" class="btn btn-primary btn-link" ng-click="showLogin()" value="Login" /> -->
      </div>
     </form>
    </div>
   </div>