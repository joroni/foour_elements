
            <form name="personForm" novalidate>

           
               <div class="form-row">
                  
                  <div class="form-group col-md-6">
                     <label for="smtp" class="control-label">SMTP:</label>
                     
                     <input type="text" class="form-control" name="smtp" placeholder="smtp.example.com"/>
                   
                  
                  </div>
                    <div class="form-group col-md-3">
                     <label for="port" class="control-label">PORT:</label>
                     
                     <input type="text" class="form-control" name="port" placeholder="465"/>
                   
                  
                  </div>

                  <div class="form-group col-md-3">
                     <label for="encryption" class="control-label">ENCRYPTION:</label>
                     
                     <input type="text" class="form-control" name="encryption" placeholder="tls"/>
                   
                  
                  </div>

                  <div class="form-group col-md-6">
                     <label for="username" class="control-label">USERNAME:</label>
                     
                     <input type="text" class="form-control" name="username" placeholder="user@email.com"/>
                   
                  
                  </div>

                  <div class="form-group col-md-6">
                     <label for="password" class="control-label">PASSWORD:</label>
                     
                     <input type="password" class="form-control" name="password" placeholder="password"/>
                   
                  
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