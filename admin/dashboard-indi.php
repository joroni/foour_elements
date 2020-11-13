<div class="container">
<h1 class="page-header">By User</h1>

<!-- <div class="row placeholders" ng-init="getAllUserScores()"> -->
 <div class="row placeholders"  ng-init="getAllUserScores();">
<canvas id="line" class="chart chart-line" chart-data="data" chart-labels="labels" chart-series="series"
  chart-options="options" chart-dataset-override="datasetOverride" chart-click="onClick">
</canvas>

</div>




<div class="row" ng-init="getElementPercentage()">
  <div class="col-md-3 col-sm-6 col-12" ng-repeat="e in elementPercentage">
    <div class="info-box">
        <span class="info-box-icon bg-info {{e.user_element}}bg">
          <img ng-src="../frontend/img/tetramap_{{e.user_element}}.png" class="img-fluid img-thumbnail no-bg"/></span>  
              <!-- <i class="far fa-envelope"></i></span> -->

              <div class="info-box-content">
                <span class="info-box-text">{{e.user_element}}</span>
                <span class="info-box-number">{{e.percent}}%</span>
              </div>      
    </div>
  </div>
</div>
        
<div class="row">
<h4 class="sub-header mt-5">Individual List</h4>

<div class="box m-5">
 <!--  <input type='button' ng-click='checkVal()' value='Click'> -->
  <table datatable="ng" dt-options="vm.dtOptions" class="table-responsive table table-striped table-bordered">
    <thead>
      <tr>
        <!-- <th></th> -->
        <th>#</th>
        <th>Name</th>
        <th>Earth</th>
        <th>Air</th>
        <th>Water</th>
        <th>Fire</th>
        <th>Element</th>
        <th>Date</th>
        <th></th>
        
      </tr>
    </thead>
    <tbody>
      <!-- <tr>
        <td col-span="5">
          <input type='button' ng-click='checkVal()' value='Click'>
        </td>
      </tr> -->
      <tr ng-repeat="team in users">

       
      <!--  <td>
         <!--  <input type="checkbox" ng-model="team.key" ng-selected="onCheckboxSelected(team, key);"
            class="form-control" ng-checked="isChecked" ; /> --/>

          
                <input type='checkbox' ng-checked='isChecked'  value='{{ team.user_id }}' class='form-control' ng-model='team.selected'>
    <input type="checkbox" ng-checked="isChecked" ng-click="getToChart($event)" value="{{team.user_id}}" data-id="{{team.user_id}}" ng-model="team.user_id"  />  --/>
      </td>-->
       <td>{{ $index + 1 }}</td>
        <td>{{ team.first_name}} {{team.last_name}}</td>
        <td>{{team.user_earth}}</td>
        <td>{{team.user_air}}</td>
        <td>{{team.user_water}}</td>
        <td>{{team.user_fire}}</td>
        <td style="text-transform:capitalize;">{{team.user_element}}</td>
        <td>{{team.created}}</td>
        <td><button ng-click="removemytest($event);updateHadTaken($event);getAllUserScores();" class="btn btn-sml" ng-model="team.user_id" data-id="{{team.user_id}}" 
          title="Retake Evaluation">Retake</button></td>
      </tr>
    </tbody>



  </table>
 
  <br />
  <br />
</div>

</div>
</div>



