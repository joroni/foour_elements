<style>
.btn-presend
{
    background: limegreen;
    color: #fff;
    padding: 10px 20px;
    text-transform: uppercase;
}
</style>
<div class="containers">
<div ng-init="show_data()">
<div class="col-md-12">
   <button type="button" ng-click="addNewUser()" class="btn btn-primary btn-md" data-toggle="modal" data-target="#flipFlop">
   Add User
   </button>
   <br><br>
   <div class="box m-5" ng-init="getUsers()">
      <table datatable="ng" dt-options="vm.dtOptions" class="table-responsive table table-striped table-bordered">
         <thead>
            <tr >
               <th>#</th>
               <th>Name</th>
               <th>Email</th>
               <th>Group</th>
              <!--  <th>ACL</th> -->
               <th>Active</th>
               <th>Invites</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            <tr class="user-list" ng-repeat="u in all_Users"  ng-class="u.u_is_active==0 ? 'disabled' : 'user-list'">
               <td>{{ $index + 1 }}</td>
               <td>{{u.first_name}} {{u.last_name}}<input type="hidden" ng-value="{{u.id}}"></td>
               <td>{{u.email}}</td>
               <td>{{u.group_name}}</td>
               <!-- <td>{{u.acl_id}}</td> -->
               <td><span ng-show="{{u.u_is_active}}" class="has-success"><i class="glyphicon glyphicon-ok"></i></span>
  <span ng-hide="{{u.u_is_active}}" class="has-error"><i class="glyphicon glyphicon-remove"></i></span>
  
               <td>

               
                  <button class="btn btn-success btn-xs not-edit" data-toggle="modal"  ng-click="send_link(u.id, u.first_name, u.last_name, u.email, u.group_id,  u.acl_id)" ng-model="u.id" data-id="{{u.id}}"
                     ng-hide="{{u.had_taken}}" data-toggle="modal" data-target="#sendEvalModal"
                     title="Send Evaluation"> <span class="glyphicon glyphicon-envelope"></span> </button>
                     
                     <span class="label label-default" style="opacity: 0.5;"  ng-hide="{{!u.had_taken}}">Sent</span>
                   <!--   <button class="btn btn-success btn-xs not-edit"  ng-click="send_email($event)"  data-id="{{u.id}}" data-email="{{u.email}}" data-groupid="{{u.group_id}}" data-groupname="{{u.group_name}}"
                     title="Send Evaluation"> <span class="glyphicon glyphicon-envelope"></span> </button>
                    
 -->
                  
               </td>
               <td>
               <button class="btn btn-xs" data-toggle="modal" data-target="#flipFlop" ng-click="update_data(u.id, u.first_name, u.last_name, u.email, u.group_id,  u.acl_id, u.u_is_active)" alt="Edit" title="Edit">
                  <span class="glyphicon glyphicon-edit"></span> 
                  </button>
                  <button ng-show="{{u.u_is_active}}" alt="Activate/Deactivate" title="Activate/Deactivate" class=" btn btn-xs" ng-click="activestat(u.id )">
                                   <span class="glyphicon glyphicon-off"></span> 
                               </button>
                  <!--
                     <button alt="Delete" title="Delete" class=" btn btn-danger btn-xs" ng-click="delete_data(u.id )">
                                   <span class="glyphicon glyphicon-trash"></span> 
                               </button>
                     -->
              </td>
            </tr>
         </tbody>
      </table>
      <br />
      <br />
   </div>
</div>
<!-- Modal Edit-->
<div class="modal fades" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
         <div class="form-group col-md-6">
            <h3 class="modal-title" id="editUserModalLabel">{{modTitle}}</h3>
            </div>
         
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>

         </div>
         <div class="modal-body">
            <form name="personForm" novalidate>

           
               <div class="form-row">
                  
                  <div class="form-group col-md-12 required">
                     <label for="email" class="control-label">Email:</label>
                     
                     <input type="email" ng-readonly="btnName == 'Update'" class="form-control" name="email" ng-model="email"  ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/"  ng-keyup="checkEmail()" placeholder="Email"  required/>
                    <div ng-class="addClass(emailstatus)" >{{ emailstatus }}</div>
<!-- <span class="" style="color:Red" ng-show="personForm.email.$error.required"> * </span> -->

<span style="color:Red" ng-show="personForm.email.$dirty&&personForm.email.$error.pattern">Please Enter Valid Email</span>

                  
                  </div>
                  <div class="form-group col-md-12 required" ng-init="getActiveGroups()">
                     <input type="hidden" name="group_id" class="form-control" ng-model="group_id" />
                     <label for="group_id" class="control-label">Group:</label>
                     <select class="form-control" ng-model="group_id" ng-options="groups.group_id as groups.group_name for groups in groups" required>
                    
                     </select>
                     <span style="color:Red" ng-show="personForm.group_name.$touched && personForm.group_name.$error.required">Please select a Group.</span>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6  required">
                     <label for="first_name" class="control-label">First Name:</label>
                     <input type="text" class="form-control" name="first_name" ng-model="first_name" required>
                     <span style="color:Red" ng-show="personForm.first_name.$touched && personForm.first_name.$error.required">Please enter First Name.</span>
                  </div>
                  <div class="form-group col-md-6 required">
                     <label for="last_name" class="control-label">Last Name:</label>
                     <input type="text" class="form-control" name="last_name" ng-model="last_name" required>
                     <span style="color:Red" ng-show="personForm.last_name.$touched && personForm.last_name.$error.required">Please enter Last Name.</span>
                  </div>
               </div>

               <div class="form-row">
                 
                 <div class="form-group col-md-6">
                
                    <label for="acl_id">Admin Access?</label>

                    <input type="hidden" name="acl_id" class="form-control" ng-model="acl_id" />
                     <label class="switch">
                     <input type="checkbox"  ng-checked="acl_id == 1" ng-true-value = "1" ng-false-value="2" class="form-controlx" ng-model="acl_id" />
                     <span class="slider round"></span>
                     </label>
                    
                 </div>
                 
                  <div class="form-group col-md-6">
                
                    <label for="u_is_active">Activate</label>

                    <input type="hidden" name="u_is_active" class="form-control" ng-model="u_is_active" />
                     <label class="switch">
                     <input type="checkbox" ng-checked="u_is_active == 1" ng-true-value = "1" ng-false-value="0" class="form-controlx" ng-model="u_is_active" />
                     <span class="slider round"></span>
                     </label>
                    
                 </div>
 
              </div>
         
            </form>
         </div>
         <div class="modal-footer">
         <div class="form-group col-md-12">
            <input type="hidden" ng-model="id">
            <input ng-disabled="personForm.$pristine|| personForm.$invalid" type="submit" name="insert" class="btn btn-primary btn-block" data-dismiss="modal" ng-click="insert()" value="{{btnName}}">
         </div>
</div>
      </div>
   </div>
</div>
<!-- Modal Send Evaluation link -->
<div class="modal fades" id="sendEvalModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document" ng-repeat="y in userlinkparam">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="sendUEvalModalLabel">Send Invitation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">

   
          
          <div class="form-row">
                  <div class="form-group text-center"> 
                  <button  class="btn btn-presend btn-success btn-large" role="button" data-id="{{y.id}}" data-email="{{y.email}}" data-groupid="{{y.group_id}}" data-groupname="{{y.group_name}}"  data-groupid="{{y.group_id}}"   ng-click="send_email($event);updateHadTaken($event); getUsers();" data-dismiss="modal">Send Email</button>
                  
            </div>
               </div>
         </div>
    
         <!--  
         <div class="modal-footer">
            <a href="../admin/processor/mailer.php?email={{y.email}}&user_id={{y.id}}&group_id={{y.group_id}}&group_name={{y.group_name}}" target="_blank" class="btn btn-secondary">Open Link</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-id="{{y.id}}" ng-click="proces"
               data-dismiss="modal">Send</button>
        <button type="button" class="btn btn-primary" data-id="{{y.id}}" ng-click="updateHadTaken($event); getUsers()"
               data-dismiss="modal"  >Send</button> -->
         </div>

     
      </div>-->
   </div>
</div>



<script>
/*
$(document).ready(function() { 
     var dlg=$('#register').dialog({
         title: 'Register for LifeStor',
         resizable: true,
         autoOpen:false,
         modal: true,
         hide: 'fade',
         width:350,
         height:275
      });
      
      $('#reg_link').click(function(e) {
         e.preventDefault();
         dlg.load('https://joroni.dreamhosters.com/appmailer/mail.php?email={{y.email}}&user_id={{y.id}}&group_id={{y.group_id}}&group_name={{y.group_name}}', function(){
             dlg.dialog('open');
         });
      }); 
     $('#reg_link').click(function(e) {
          dlg.html('Page loaded');
          e.preventDefault();
          dlg.dialog('open');
      });  
}); */
</script>