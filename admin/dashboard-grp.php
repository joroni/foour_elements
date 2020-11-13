<div class="container">
<h1 class="page-header">By Group</h1>


 <div class="row placeholders" ng-init="getGroupScoresSimple();">
<canvas id="line" class="chart chart-line" chart-data="data" chart-labels="labels" chart-series="series"
  chart-options="options" chart-dataset-override="datasetOverride" chart-click="onClick">
</canvas>

</div>


<!--

<div class="row">
<h2 class="sub-header">Group List</h2>
<div ng-repeat="(key, value) in groupdata2 | groupBy: 'group_name' as results">
  Group: {{key}}
  <div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>#</td>
          <td>Group Name</td>
          <td>Earth</td>
           <td>Air</td>
            <td>Water</td>
             <td>Fire</td>
        </tr>
        
      </thead
      >
      <tbody>
        <tr ng-repeat="user in groupdata | groupBy: 'group_name'">
          <td>{{user.group_id}}</td>
          <td>{{key}}</td>
        
          
          
                <td>{{sumByGroupEarth(key)}}</td>
                   <td>{{sumByGroupAir(key)}}</td>
                      <td>{{sumByGroupWater(key)}}</td>
                         <td>{{sumByGroupFire(key)}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

-->

<div class="box m-5">
<!--  <input type='button' ng-click='getGroupScoresSimple()' value='Click'>-->
  <table datatable="ng" dt-options="vm.dtOptions"  class="table-responsive table table-striped table-bordered">
    <thead>
      <tr>
       <!--  <th></th> -->
        <th>#</th>
        <th>Group Name</th>
        <th>Earth</th>
        <th>Air</th>
        <th>Water</th>
        <th>Fire</th>
       <!--  <th>Time Length</th>
        <th></th> -->
        <!-- <th></th> -->
        
      </tr>
    </thead>
    <tbody>
      <!-- <tr>
        <td col-span="5">
          <input type='button' ng-click='checkVal()' value='Click'>
        </td>
      </tr> -->
      <tr ng-repeat="team in averages2">

       <!--  <td>
         <!--  <input type="checkbox" ng-model="team.key" ng-selected="onCheckboxSelected(team, key);"
            class="form-control" ng-checked="isChecked" ; /> -/->

          
            <input type='checkbox' ng-checked='isChecked'  value='{{ team.group_id }}' class='form-control' ng-model='team.selected'>
      
     <!--   <input type="checkbox" ng-checked="isChecked" ng-click="getToChart($event)" value="{{team.group_id}}" data-id="{{team.group_id}}" ng-model="team.group_id"  />  --/>
      </td> -->
       <td>{{ $index + 1 }}</td>
        <td>{{team.group_name}}</td>
        <td>{{team.group_earth}}%</td>
        <td>{{team.group_air}}%</td>
        <td>{{team.group_water}}%</td>
        <td>{{team.group_fire}}%</td>
       <!--  <td></td> -->
       <!--  <td>{{team.created}}</td> -->
       <!--  <td>  <button ng-click="removemytest($event);getAllUserScores();" ng-model="team.group_id" data-id="{{team.group_id}}" 
          title="Retake Evaluation">Retake</button></td> -->
      </tr>
    </tbody>



  </table>
  <br />
  <br />
</div>

</div>
</div>



