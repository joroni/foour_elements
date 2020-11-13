<div class="container">
  <h2 class="sub-header">All Users</h2>
  <!--  <input type="button" value="+" class="btn btn-primary" style="width:50px;" ng-click="addUserPop = !addUserPop" /> -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
    Add User
  </button>
  <hr>
  <!-- Button trigger modal -->


  <!--  <div ng-show="addUserPop">
                    <div class="row">
                     
                      </div>
                  </div> -->
  <div ng-init="getUsers()">
    <table datatable="ng" dt-options="vm.dtOptions" class="table-responsive table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Group</th>
          <th>ACL</th>
          <th>Active</th>
          <th></th>

        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="y in allusers">
          <td>{{ $index + 1 }}</td>
          <td>{{y.first_name}} {{y.last_name}}<input type="hidden" ng-value="{{y.id}}"></td>
          <td>{{y.email}}</td>
          <td>{{y.group_name}}</td>
          <td>{{y.acl_id}}</td>
          <td>{{y.is_active}}</span>

          <td><button class="inline" ng-click="getUser(y.id)" ng-model="y.id" data-toggle="modal"
              data-target="#editUserModal">Edit</button>
            <button class="inline" ng-click="onSendClick($event)" ng-model="y.id" data-id="{{y.id}}"
              ng-hide="{{y.had_taken}}" data-toggle="modal" data-target="#sendEvalModal"
              title="Send Evaluation">Send</button>

              
            <!--   <button  class="inline" disabled="true" ng-hide="{{!x.had_taken}}"
                    title="Sent Evaluation">Sent</button> -->
          </td>
        </tr>
      </tbody>



    </table>
    <br />
    <br />

  </div>


  <!-- Modal Add User -->
  <div class="modal" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-row">
              <!-- <div class="form-group col-md-6">
                  <label for="user_name">User Name:(optional)</label>
                  <input type="text" class="form-control" name="user_name" ng-model="user_name">
              </div> -->
              <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" ng-model="email">

              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" ng-model="first_name">
              </div>
              <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" ng-model="last_name">

              </div>
            </div>

            <div class="form-row">

              <div class="form-group col-md-6" ng-init="getGroups()">
                <label for="group_id">Group:</label>
                <select class="form-control" ng-model="group_id" ng-options="groups.group_id as groups.group_name for groups in groups">
                </select>
                <!--  <select class="form-control" name="group_id" ng-model="group_id">
                      <option ng-value="1">Team A</option>
                      <option ng-value="2">Team B</option>
                  </select> -->

              </div>
              <div class="form-group col-md-6" ng-init="getAcl()">
                <label for="acl_id">Access Permission:</label>
                <select class="form-control" ng-model="acl_id" ng-options="acl.acl_id as acl.acl_name for acl in acl">
                  
                </select>


              </div>
              <!-- <div class="form-group col-md-6">
                  <label for="acl">Access Permission:</label>
                  <select class="form-control" name="acl" ng-model="acl">
                      <option ng-value="2" selected>Tester</option>
                      <option ng-value="1">Admin/Tester</option>
                  </select>
              </div> -->
            </div>


          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" ng-click="addUser();getAllUsers()"
            data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Edit-->
  <div class="modal" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" ng-repeat="user in userowndata">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form >
            <div class="form-row">
              <!--  <div class="form-group col-md-6">
                  <label for="user_name">User Name:(optional)</label>
                  <input type="text" class="form-control" name="user_name" ng-model="user.user_name">
              </div> -->
              <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" ng-model="user.email">

              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" ng-model="user.first_name">
              </div>
              <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" ng-model="user.last_name">

              </div>
            </div>

            <div class="form-row">

              <div class="form-group col-md-6" ng-init="getGroups()">
                <label for="user.group_id">Group:</label>

                <select  ng-model="user.group_id" class="form-control form-control-sm form-control-Cutom-height"
                  ng-options="groups.group_id as groups.group_name for groups in groups">
                </select>
               
              </div>

              <div class="form-group col-md-6" ng-init="getAcl()">
                <label for="user.acl_id">Access Permission:</label>
                <select class="form-control form-control-sm form-control-Cutom-height" ng-model="user.acl_id" 
                ng-options="acl.acl_id as acl.acl_name for acl in acl">
                </select>
              </div>
            

            </div>
           

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-id="{{user.id}}"
          data-email="{{user.email}}"
          data-firstname ="{{user.first_name}}" 
          data-lastname="{{user.last_name}}" 
          data-groupid="{{user.group_id}}" 
          data-groupname="{{user.group_name}}" 

          data-gepid="{{user.acl_id}}" 
          
          ng-click="updateUser($event);getAllUsers()" data-dismiss="modal">Save
            Changes</button>
        </div>
      </div>
    </div>
  </div>



<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Basic Modal</h4>
      </div>
      <div class="modal-body">
        <h3>Modal Body</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


  <!-- Modal Send Evaluation link -->
  <div class="modal" id="sendEvalModal" tabindex="-1" role="dialog" aria-labelledby="sendUEvalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" ng-repeat="y in userlinkparam">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="sendUEvalModalLabel">Send Invitation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-row">
              <!-- <div class="form-group col-md-6">
                    <label for="user_name">User Name:(optional)</label>
                    <input type="text" class="form-control" name="user_name" ng-model="user_name">
                </div> -->
              <div class="form-group">
                <label for="link">Link</label>
               

                <textarea cols="3" class="form-control userurl" >
                  http://{{y.location}}/frontend/?email={{y.email}}&user_id={{y.id}}&group_id={{y.group_id}}&group_name={{y.group_name}}
                </textarea>
              </div>


            </div>



          </form>

        </div>
        <div class="modal-footer">
          
          <!--<button type="button" ng-click="copyText()">Copy</button>-->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-id="{{y.id}}" ng-click="updateHadTaken($event); getUsers()"
            data-dismiss="modal">Send</button>
        </div>
      </div>
    </div>
  </div>
  


</div>