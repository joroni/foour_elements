<div class="container">
<h1 class="page-header">Admin Users</h1>
    <div ng-init="getAdminUsers();">
  
    <button type="button" ng-click="addNewGroup()" class="btn btn-primary btn-md" data-toggle="modal" data-target="#flipFlop">
   Add Admin
   </button>

</br></br>

        <div class="row">


            <div class="box m-5">
        
                <table datatable="ng" dt-options="vm.dtOptions" class="table-responsive table table-striped table-bordered">
                    <thead>
                    <tr>
                    
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    
                        <th></th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr ng-repeat="au in all_AdminUsers">

                    
                    
                    <td>{{ $index + 1 }}</td>
                        <td>{{ au.name}}</td>
                        <td>{{au.email}}</td>
                    
                        <td><button ng-click="removemytest($event);updateHadTaken($event);getAllUserScores();" class="btn btn-sml" ng-model="au.user_id" data-id="{{au.user_id}}" 
                        title="Retake Evaluation">Retake</button></td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Modal Edit-->
<div class="modal fades" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
         <div class="form-group col-md-6">
            <h3 class="modal-title" id="editGrouprModalLabel">{{modTitle}}</h3>
         </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
           <form class="form-signup" method="post" ng-submit="submitRegister()">
      <div class="form-group">
       <label>Full Name:</label>
       <input type="text" name="name" ng-model="registerData.name" class="form-control" />
      </div>
      <div class="form-group">
       <label>Email:</label>
       <input type="text" name="email" ng-model="registerData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Password:</label>
       <input type="password" name="password" ng-model="registerData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
      <input type="submit" name="register" class="btn btn-primary btn-block" value="Register" />
      <!--  <br />
       <input type="button" name="login_link" class="btn btn-primary btn-link" ng-click="showLogin()" value="Login" /> -->
      </div>
      </form>
         </div>
        <!--  <div class="modal-footer">
         <div class="form-group col-md-12">
            <!-* <input type="hidden" name="group_id" ng-model="group_id"> ->
            <input type="submit" name="register" class="btn btn-primary btn-block" value="Register"  data-dismiss="modal" />
            <!- <input type="submit" name="insert" class="btn btn-primary btn-block" data-dismiss="modal" ng-click="insertgroup()" value="{{btnName}}"> ->
         </div>
         </div> -->
        
      </div>
   </div>
</div>
<!-- Modal Send Evaluation link -->






