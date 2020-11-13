


 <div class="container">
    <div class="row">
     
       
    <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua" ng-init="getGroups()">
                <div class="inner">
                  <h3>{{groups.length}}</h3>
                  <p>Groups</p>
                </div>
                <div class="icon">
                  <i class="glyphicon glyphicon-link"></i>
                </div>
                <a href="#/dashboard-grp" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
         <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Quiz Preview</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>

                <a href="../frontend/preview.html?email=jane@gmailme.com&user_id=24&group_id=1&group_name=Team A&acl_id=2" target="_blank" class="small-box-footer" data-id="{{y.id}}" ng-click="updateHadTaken($event); getUsers()" data-dismiss="modal">Preview</a>
                
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow" ng-init="getUsers()">
                <div class="inner">
                  <h3>{{all_Users.length}}</h3>
                  <p>Total Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#/allusers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
              </div>
            </div><!-- ./col -->


              <div class="col-lg-6 col-xs-6">
          
              <div class="small-box bg-red" ng-init="getElementPercentage()">
                <div class="inner">
                  <h4>User Elements</h4>

                <div class="col-md-3 col-sm-6 col-12" ng-repeat="e in elementPercentage">
    <div class="info-box" style="background:rgba(0,0,0,0.2);">
        <span class="info-box-icon bg-info {{e.user_element}}bg">
          <img ng-src="../frontend/img/tetramap_{{e.user_element}}.png" class="img-fluid img-thumbnail no-bg"/></span>  
            

              <div class="info-box-content">
                <span class="info-box-text">{{e.user_element}}</span>
                <span class="info-box-number">{{e.percent}}%</span>
              </div>      
    </div>
  </div>
                </div>
               <!--  <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#/allusers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --> 
              </div>
            </div>



          <!--  <div class="col-lg-6 col-xs-6">
              <!-- small box ->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
       

        </section>


        </div>
    </div>