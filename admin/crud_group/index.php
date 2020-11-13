<div class="containers"  ng-init="getGroups()">
<div ng-init="show_groupdata()">
<div class="col-md-12">
   <button type="button" ng-click="addNewGroup()" class="btn btn-primary btn-md" data-toggle="modal" data-target="#flipFlop">
   Add Group
   </button>
   <br><br>
   <div class="box m-5">
      <table datatable="ng" dt-options="vm.dtOptions" class="table-responsive table table-striped table-bordered">
         <thead>
            <tr>
               <th>#</th>
               <th>Group Name</th>
               <th>Active</th>
               <th>Created</th>
             
             
               
               <th>Modify</th>
            </tr>
         </thead>
         <tbody>
            <tr ng-repeat="x in groups">
               <td>{{ $index + 1 }}</td>
               <td>{{x.group_name}}<input type="hidden" ng-value="{{x.group_id}}"></td>
               <td><span ng-show="{{x.is_active}}" class="has-success"><i class="glyphicon glyphicon-ok"></i></span>
  <span ng-hide="{{x.is_active}}" class="has-error"><i class="glyphicon glyphicon-remove"></i></span>
</td>
                
               <td>{{x.created}}</td>
             
               <td>
               <button class="btn btn-xs" data-toggle="modal" data-target="#flipFlop" ng-click="update_groupdata(x.group_name, x.is_active, x.group_id)" alt="Edit" title="Edit">
                  <span class="glyphicon glyphicon-edit"></span> 
                  </button>
                  <!--
                     <button alt="Delete" title="Delete" class=" btn btn-danger btn-xs" ng-click="delete_data(x.group_id )">
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
            <h3 class="modal-title" id="editGrouprModalLabel">{{modTitle}}</h3>
         </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form >
               <div class="form-row">
                  
                  <div class="form-group col-md-6">
                     <label for="group_name">Group Name</label>
                     <input type="text" class="form-control" name="group_name" ng-model="group_name">
                  </div>
                  
               </div>
               
          


               <div class="form-row">
                 
               <div class="form-group col-md-6" ng-init="getGroupStatus()">
                     <input type="hidden" name="is_active" class="form-control" ng-model="is_active" />
                     <label for="is_active">Status:</label>
                     <label class="switch">
                     <input type="checkbox"  ng-checked="is_active == 1" ng-true-value = "1" ng-false-value="0" class="form-controlx" ng-model="is_active" />
                     <span class="slider round"></span>
                     </label>
                                    <!--   <select class="form-control" ng-model="is_active" ng-options="is_active_options.is_active_v as is_active_options.is_active_l for is_active_options in is_active_options">
                     </select> -->

                  
                  </div>
  
               </div>

            </form>
         </div>
         <div class="modal-footer">
         <div class="form-group col-md-12">
            <input type="hidden" name="group_id" ng-model="group_id">
            <input type="submit" name="insert" class="btn btn-primary btn-block" data-dismiss="modal" ng-click="insertgroup()" value="{{btnName}}">
         </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal Send Evaluation link -->
