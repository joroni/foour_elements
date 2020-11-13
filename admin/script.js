//var app = angular.module('login_register_app', ['ngRoute', 'chart.js', 'datatables', 'angular.filter']);
var app = angular.module('login_register_app', ['ngRoute', 'chart.js', 'datatables', 'angular.filter']);
app.controller('login_register_controller', function ($scope, $http, $location, $sce) {

  $scope.doShow = "hide";

  $scope.closeMsg = function () {
    $scope.alertMsg = false;
  };

  $scope.login_form = true;

  $scope.showRegister = function () {
    $scope.login_form = false;
    $scope.doShow = "show";
    $scope.register_form = true;
    $scope.alertMsg = false;
  };

  $scope.showLogin = function () {
    $scope.doShow = "hide";
    $scope.register_form = false;
    $scope.login_form = true;
    $scope.alertMsg = false;
  };

  $scope.submitRegister = function () {
    $http({
      method: "POST",
      url: "register.php",
      data: $scope.registerData
    }).success(function (data) {
      $scope.alertMsg = true;
      if (data.error != '') {
        $scope.alertClass = 'alert-danger';
        $scope.alertMessage = data.error;
      } else {
        $scope.alertClass = 'alert-success';
        $scope.alertMessage = data.message;
        $scope.registerData = {};
      }
    });
  };

  $scope.submitLogin = function () {
    $http({
      method: "POST",
      url: "login.php",
      data: $scope.loginData
    }).success(function (data) {
      if (data.error != '') {
        $scope.alertMsg = true;
        $scope.alertClass = 'alert-danger';
        $scope.alertMessage = data.error;
      } else {
        console.log('Access granted')
        $location.path('/home');
        location.reload();
      }
    });
  };


  /* 
    $scope.groups =  [{
      group_id:1,
      group_name: 'Team A'
    },
    {
      group_id:2,
      group_name: 'Team B'
    }
  ]; */


  $scope.groupdata = [];
  $scope.getGroupScores = function () {
    //  console.log('group_id', group_id);
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        group_id: $scope.group_id,
        request_type: 13
      },
    }).then(function successCallback(response) {
      let groupsData = response.data;
      console.log('$scope.groupdata', groupsData);
      // $scope.allUsers = usersData;
      $scope.groupdata = groupsData;


      var sums = {},
        averages = Object.keys(groupsData.reduce(function (previous, element) {
          if (previous.hasOwnProperty(element.group_name)) {
            previous[element.group_name].user_earth += element.user_earth;
            previous[element.group_name].user_air += element.user_air;
            previous[element.group_name].user_water += element.user_water;
            previous[element.group_name].user_fire += element.user_fire;
            previous[element.group_name].count += 1;
          } else {
            previous[element.group_name] = {
              user_earth: element.user_earth,
              user_air: element.user_air,
              user_water: element.user_water,
              user_fire: element.user_fire,
              count: 1
            };
          }

          return previous;
        }, sums)).map(function (group_name) {
          return {
            group_name: group_name,
            user_earth: Math.round(this[group_name].user_earth / this[group_name].count),
            user_air: Math.round(this[group_name].user_air / this[group_name].count),
            user_water: Math.round(this[group_name].user_water / this[group_name].count),
            user_fire: Math.round(this[group_name].user_fire / this[group_name].count)
          };
        }, sums);

      console.log('averages', averages);
      $scope.teamScore = [];
      $scope.averages = averages;
      for (i = 0; i < $scope.averages.length; i++) {
        $scope.teamScore.push({
          group_name: $scope.averages[i].group_name,
          user_earth: $scope.averages[i].user_earth,
          user_air: $scope.averages[i].user_air,
          user_water: $scope.averages[i].user_water,
          user_fire: $scope.averages[i].user_fire,
        })
      }
      $scope.teamScore;





      $scope.labels = ["Earth", "Air", "Water", "Fire"];
      /*  $scope.series = ['Susan', 'Joroni', 'Jane'];
       $scope.data = [
         [65, 15, 5, 15],
         [10, 30, 41, 19],
         [25, 20, 20, 35]
       ]; */
      $scope.groupdata = $scope.teamScore;
      $scope.series = [];
      for (var i = 0; i < $scope.groupdata.length; i++) {

        $scope.series.push(
          $scope.groupdata[i].group_name,
        );
      }
      console.log($scope.series);

      $scope.data = [];
      for (var i = 0; i < $scope.groupdata.length; i++) {

        $scope.data.push([
          $scope.groupdata[i].user_earth,
          $scope.groupdata[i].user_air,
          $scope.groupdata[i].user_water,
          $scope.groupdata[i].user_fire
        ]);
      }

      console.log($scope.data);

      $scope.onClick = function (points, evt) {
        console.log(points, evt);
      };
      $scope.datasetOverride = [{
        yAxisID: 'y-axis-1'
      }, {
        yAxisID: 'y-axis-2'
      }];
      $scope.options = {
        scales: {
          yAxes: [{
              id: 'y-axis-1',
              type: 'linear',
              display: true,
              position: 'left'
            },
            {
              id: 'y-axis-2',
              type: 'linear',
              display: true,
              position: 'right'
            }
          ]
        }
      };
    })
  }

  $scope.groupdata2 = [];

  /* 
  $scope.getTeamName = function(){
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        group_id: $scope.group_id,
        request_type: 15
      },
    }).then(function successCallback(response) {
      let groupsData2B = response.data;
     console.log('$scope.groupdata2B', groupsData2B);
      // $scope.allUsers = usersData;
     // $scope.groupdata2B = groupsData2B;
      //console.log('averages-teams', $scope.groupdata2B);
      return groupsData2B;
    })
  } */

  $scope.getGroupScoresSimple = function () {
    //  console.log('group_id', group_id);

    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        group_id: $scope.group_id,
        request_type: 14
      },
    }).then(function successCallback(response) {
      let groupsData2 = response.data;
      console.log('$scope.groupdata2', groupsData2);
      // $scope.allUsers = usersData;
      $scope.groupdata2 = groupsData2;






      console.log('averages2', $scope.groupdata2);
      $scope.teamScore2 = [];
      $scope.averages2 = $scope.groupdata2;
      for (i = 0; i < $scope.averages2.length; i++) {
        $scope.teamScore2.push({
          group_name: $scope.averages2[i].group_name,
          group_earth: $scope.averages2[i].group_earth,
          group_air: $scope.averages2[i].group_air,
          group_water: $scope.averages2[i].group_water,
          group_fire: $scope.averages2[i].group_fire,
        })
      }
      $scope.teamScore2;





      $scope.labels = ["Earth", "Air", "Water", "Fire"];
      /*  $scope.series = ['Susan', 'Joroni', 'Jane'];
       $scope.data = [
         [65, 15, 5, 15],
         [10, 30, 41, 19],
         [25, 20, 20, 35]
       ]; */

      $scope.groupdata2 = $scope.teamScore2;
      // $scope.groupdata2 = $scope.getTeamName
      $scope.series = [];
      for (var k = 0; k < $scope.groupdata2.length; k++) {
        $scope.series.push(
          $scope.groupdata2[k].group_name,
        );
      }
      console.log($scope.series);

      $scope.data = [];
      for (var j = 0; j < $scope.groupdata2.length; j++) {
        $scope.data.push([
          $scope.groupdata2[j].group_earth,
          $scope.groupdata2[j].group_air,
          $scope.groupdata2[j].group_water,
          $scope.groupdata2[j].group_fire
        ]);
      }

      console.log($scope.data);

      $scope.onClick = function (points, evt) {
        console.log(points, evt);
      };
      $scope.datasetOverride = [{
        yAxisID: 'y-axis-1'
      }, {
        yAxisID: 'y-axis-2'
      }];
      $scope.options = {
        scales: {
          yAxes: [{
              id: 'y-axis-1',
              type: 'linear',
              display: true,
              position: 'left'
            },
            {
              id: 'y-axis-2',
              type: 'linear',
              display: true,
              position: 'right'
            }
          ]
        }
      };
    })
  }


  $scope.isChecked = true;
  $scope.newData = [];
  $scope.getAllUserScores = function () {

    console.log('getUserScores');
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        request_type: 1
      },
    }).then(function successCallback(response) {
      let usersData = response.data;
      console.log('usersData', usersData);
      // $scope.allUsers = usersData;
      $scope.userdata = usersData;

      $scope.labels = ["Earth", "Air", "Water", "Fire"];
      //$scope.series = ['Susan', 'Joroni', 'Jane'];
      $scope.series = [];
      for (var i = 0; i < $scope.userdata.length; i++) {
        $scope.series.push(
          $scope.userdata[i].first_name + ' ' + $scope.userdata[i].last_name,
        );
      }
      console.log('series: ', $scope.series);
      $scope.data = [];
      for (var i = 0; i < $scope.userdata.length; i++) {

        $scope.data.push([
          $scope.userdata[i].user_earth,
          $scope.userdata[i].user_air,
          $scope.userdata[i].user_water,
          $scope.userdata[i].user_fire
        ]);
      }
      console.log('data: ', $scope.data);

      $scope.onClick = function (points, evt) {
        console.log(points, evt);
      };
      $scope.datasetOverride = [{
        yAxisID: 'y-axis-1'
      }, {
        yAxisID: 'y-axis-2'
      }];
      $scope.options = {
        scales: {
          yAxes: [{
              id: 'y-axis-1',
              type: 'linear',
              display: true,
              position: 'left'
            },
            {
              id: 'y-axis-2',
              type: 'linear',
              display: true,
              position: 'right'
            }
          ]
        }
      };
    });
  }


  $scope.indiuserdata = [];
  $scope.getIndividualUser = function (user_id) {
    console.log('user_id', user_id);
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        user_id: $scope.user_id,
        request_type: 2
      },
    }).then(function successCallback(response) {
      let usersData = response.data;
      console.log('$scope.indiuserdata', usersData);
      // $scope.allUsers = usersData;
      $scope.indiuserdata = usersData;
    })

    $scope.labels = ["Earth", "Air", "Water", "Fire"];
    /*  $scope.series = ['Susan', 'Joroni', 'Jane'];
     $scope.data = [
       [65, 15, 5, 15],
       [10, 30, 41, 19],
       [25, 20, 20, 35]
     ]; */

    $scope.series = [];
    for (var i = 0; i < $scope.indiuserdata.length; i++) {

      $scope.series.push(
        $scope.indiuserdata[i].first_name,
      );
    }
    console.log($scope.series);

    $scope.data = [];
    for (var i = 0; i < $scope.indiuserdata.length; i++) {

      $scope.data.push([
        $scope.indiuserdata[i].user_earth,
        $scope.indiuserdata[i].user_air,
        $scope.indiuserdata[i].user_water,
        $scope.indiuserdata[i].user_fire
      ]);
    }
    console.log($scope.data);

    $scope.onClick = function (points, evt) {
      console.log(points, evt);
    };
    $scope.datasetOverride = [{
      yAxisID: 'y-axis-1'
    }, {
      yAxisID: 'y-axis-2'
    }];
    $scope.options = {
      scales: {
        yAxes: [{
            id: 'y-axis-1',
            type: 'linear',
            display: true,
            position: 'left'
          },
          {
            id: 'y-axis-2',
            type: 'linear',
            display: true,
            position: 'right'
          }
        ]
      }
    };
  }




  $scope.users = [];
  $scope.addUserPop = false;
  /* $scope.userid = $scope.fetchGetVariables().user_id;
  $scope.groupid = $scope.fetchGetVariables().group_id; */
  $scope.addUser = function () {
    //let newuserdata = {};



    $scope.acl_id = $scope.acl_id;
    $scope.email = $scope.email;
    $scope.group_id = $scope.group_id;

    $http({
      method: 'post',
      url: 'processor/addremove.php',
      //data: newuserdata
      data: {
        'email': $scope.email,
        'first_name': $scope.first_name,
        'last_name': $scope.last_name,
        'group_id': $scope.group_id,
        'group_name': $scope.group_name,
        'acl_id': $scope.acl_id,
        'request_type': 3
      },
    }).then(function successCallback(response) {
      if (response.data.length > 0) {
        $scope.users.push(response.data[0]);
        alert('User added');
      } else {
        alert('User with this email already exist. ');
      }
    });
  }



  $scope.getUsers = function () {
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        request_type: 4
      },
    }).then(function successCallback(response) {
      let usersData = response.data;
      console.log(usersData);
      // $scope.allUsers = usersData;
      $scope.all_Users = usersData;
      console.log('$scope.all_Users', $scope.all_Users);
    });
  }


  $scope.userowndata = {};

  $scope.getUser = function (id) {
    $scope.user_id = id;
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        id: id,
        request_type: 5
      },
    }).then(function successCallback(response) {
      let userData = response.data;
      console.log(userData);
      // $scope.allUsers = usersData;
      $scope.userowndata = userData;


    });
  }

  //$scope.hid='';
  $scope.updateHadTaken = function (event) {
    let id = $(event.target).attr("data-id");
    // $scope.id = id;
    console.log('taken id', id);
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        id: id,
        request_type: 6
      },
    }).then(function successCallback(response) {
      let userData = response.data;

      // $scope.allUsers = usersData;
      $scope.usertaken = userData;
      console.log('usertaken ', $scope.usertaken);

    });
  }


  $scope.getGroups = function () {
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        request_type: 7
      },
    }).then(function successCallback(response) {
      let groupsData = response.data;
      console.log('groupsData', groupsData);
      // $scope.allUsers = usersData;
      $scope.groups = groupsData;
    });
  }


  $scope.getActiveGroups = function () {
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        request_type: 16
      },
    }).then(function successCallback(response) {
      let groupsData = response.data;
      console.log('groupsData', groupsData);
      // $scope.allUsers = usersData;
      $scope.groups = groupsData;
    });
  }

  $scope.getAcl = function () {
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        request_type: 8
      },
    }).then(function successCallback(response) {
      let aclData = response.data;

      // $scope.allUsers = usersData;
      $scope.user_acl = aclData;
      console.log('aclData', $scope.user_acl);

    });
  }



  $scope.getElementPercentage = function () {
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        request_type: 17
      },
    }).then(function successCallback(response) {
      let elementsData = response.data;
      console.log('elementPercentage', elementsData);
      // $scope.allUsers = usersData;
      $scope.elementPercentage = elementsData;
    });
  }



  // Users list
  /*    $scope.users = [
       { id: 1, name: "Yogesh singh"}, 
       { id: 2, name: "Sonarika Bhadoria" }, 
       { id: 3, name: "Vishal Sahu" }, 
       { id: 4, name: "Anil singh" }
      ];
  */



  $http({
    method: 'post',
    url: 'processor/addremove.php',
    data: {
      request_type: 1
    },
  }).then(function successCallback(response) {
    let usersData = response.data;
    console.log(usersData);
    // $scope.allUsers = usersData;
    $scope.users = usersData;
    console.log('$scope.users', $scope.users);
  });





  $scope.checkVal = function (user) {
    $scope.series = [];
    $scope.data = [];
    console.log('user', user);
    //$scope.users.forEach(function(user) {

    if (user.user_id) {

      if ($scope.series != '') {
        // series +=  " , " ;
        for (i = 0; i < $scope.users.length; i++) {
          $scope.series.push(
            $scope.users[i].first_name + ' ' + $scope.users[i].last_name,
          )
        }
      }
      if ($scope.data != '') {
        $scope.data += ' , ';
        for (i = 0; i < $scope.users.length; i++) {
          $scope.data.push([
            $scope.users[i].user_earth,
            $scope.users[i].user_air,
            $scope.users[i].user_water,
            $scope.users[i].user_fire
          ])
        }
      }
      //series += user.first_name+' '+user.last_name;
      // series+= user.first_name+' '+user.last_name;
      //  data += [parseInt(user.user_earth, 10)+', '+parseInt(user.user_air,10)+', '+parseInt(user.user_water,10)+', '+parseInt(user.user_fire,10)];
    }
    //  });
    // $scope.series = series;
    // $scope.data = data;
    //console.log( $scope.series );console.log( $scope.data );
  }




  //let user = [];
  $scope.onCheckboxSelected = function (team, key) {
    console.log('team', team);


    for (var i = 0; i < team.length - 1; i++) {
      if (team.user_id) {

        $scope.series.push(
          team.first_name + ' ' + team.last_name,
        );
        $scope.series;
      }

    }




    for (var j = 0; j < team.length - 1; j++) {
      if (team.user_id) {

        $scope.data.push([
          team.user_earth,
          team.user_air,
          team.user_water,
          team.user_fire,
        ]);
        $scope.data;
      }


    }
    // console.log('series', $scope.series );
    //console.log("data ",  $scope.data);





    /* console.log(key +" changed to "+ team.key); */
    // $scope.getSingleUserScore(user_id);
  };





  $scope.copy = function () {
    let textarea = document.getElementById("textarea");
    textarea.select();
    document.execCommand("copy");
  }


  $scope.copyText = function () {
    /* Get the text field */
    copyText = angular.element('.userurl')[0].value;
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");



    /* Alert the copied text */
    alert("Copied : " + $scope.copyText.value);
  }

  $scope.userupdates = [];
  $scope.updateUser = function (event) {
    let id = $(event.target).attr("data-id"),
      email = $(event.target).attr("data-email"),
      first_name = $(event.target).attr("data-firstname"),
      last_name = $(event.target).attr("data-lastname"),
      group_id = $(event.target).attr("data-groupid"),
      acl_id = $(event.target).attr("data-aclid");
    // $scope.id = id;
    console.log('taken id', id);
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        id: parseInt(id, 10),
        email: email,
        first_name: first_name,
        last_name: last_name,
        group_id: parseInt(group_id, 10),
        acl_id: parseInt(acl_id, 10),
        request_type: 9
      },
    }).then(function successCallback(response) {
      let userData = response.data;

      // $scope.allUsers = usersData;
      $scope.userupdates = userData;


      console.log('userupdates ', $scope.userupdates);

    });
  }


 /*  $scope.removemytest2 = function (index) {

    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        user_id: $scope.userid,
        request_type: 72
      },
    }).then(function successCallback(response) {
      if (response.data == 1){
     
        $scope.answers.splice(index, 1);
        alert('Record is now resetted.');
      }else{
        alert('Record not deleted.');
      }
    });
  } */

  $scope.removemytest = function (event) {
    if (confirm("This is an  operation. This will clear the selected user's results. Are you sure you want to proceed?")) {
      $scope.userid = $(event.target).attr("data-id"),
        $http({
          method: 'post',
          url: 'processor/addremove.php',
          data: {
            user_id: $scope.userid,
            request_type: 11
          },

        }).then(function successCallback(response) {
          let userData = response.data;
          // $scope.answers = response.data;
          console.log(userData);
          if (userData == 1 || userData == 11 || userData == 111) {
            // userData.splice(index, 1);
            alert("Results for the user selected has been reset.");
            //   $scope.updateHadTaken(event);
          } else {
            alert('No changes applied!');
          }
        });
    } else {
      return false;
    }
  }

  /***** Groups */


  $scope.addNewGroup = function () {
    $scope.group_name = '';
    $scope.is_active = '';

    $scope.btnName = "Insert";
    $scope.modTitle = "Add Group";
  }



  $scope.insertgroup = function () {
    if ($scope.group_name == null) {
      alert("Enter Group Name");
      return false;
    } else if ($scope.is_active == null) {
      alert("Choose status");
      return false;
    } else {
      $http.post(
        "crud_group/insert.php", {
          'group_name': $scope.group_name,
          'is_active': 1,
          'group_id': $scope.group_id,
          'btnName': $scope.btnName,

        }
      ).success(function (data) {
        alert(data);
        $scope.group_name = null;
        $scope.is_active = null;
        $scope.group_id = null;
        $scope.btnName = "Insert";
        $scope.show_groupdata();
        $scope.getGroups()
      });
    }
  }
  $scope.show_groupdata = function () {
    $http.get("crud_group/display.php")
      .success(function (data) {
        $scope.groupnames = data;
      });
  }
  $scope.update_groupdata = function (group_name, is_active, group_id) {
    $scope.modTitle = "Update Group";
    $scope.group_name = group_name;
    $scope.is_active = is_active;
    $scope.group_id = group_id;
    $scope.btnName = "Update";
  }

  $scope.delete_groupdata = function (group_id) {
    if (confirm("Are you sure you want to delete?")) {
      $http.post("crud_group/delete.php", {
          'group_id': group_id
        })
        .success(function (data) {
          alert(data);
          $scope.show_groupdata();
          $scope.getGroups();
        });
    } else {
      return false;
    }
  }

  $scope.getGroupStatus = function () {
    $scope.is_active_options = [{
        'is_active_v': 1,
        'is_active_l': 'Active'
      },
      {
        'is_active_v': 0,
        'is_active_l': 'Deactivate'
      }
    ];
    console.log('$scope.is_active', $scope.is_active_options);
  }

  /***** Users */


  $scope.userlinkparam = [];


  $scope.addNewUser = function () {
    $scope.first_name = '';
    $scope.last_name = '';
    $scope.email = '';
    $scope.group_id = '';
    $scope.acl_id = 2;
    $scope.u_is_active = 1;
    $scope.btnName = "Insert";
    $scope.modTitle = "Add User";
  }



  $scope.insert = function () {
    if ($scope.first_name == '') {
      alert("Enter First Name");
      // return false;
    } else if ($scope.last_name == '') {
      alert("Enter Last Name");
      // return false;
    } else if ($scope.email == '') {
      alert("Enter Email");
      //  return false;
    } else if ($scope.group_id == '') {
      alert("Enter Group");
      //  return false;
    } else if ($scope.acli_id == '') {
      // alert("Enter Permission");
      $scope.acli_id = 0;

    } else {
      $http.post(
        "crud_user/insert.php", {
          'first_name': $scope.first_name,
          'last_name': $scope.last_name,
          'email': $scope.email,
          'group_id': $scope.group_id,
          'acl_id': $scope.acl_id,
          'u_is_active': $scope.u_is_active,
          'btnName': $scope.btnName,
          'id': $scope.id
        }
      ).success(function (data) {
        alert(data);
        $scope.first_name = null;
        $scope.last_name = null;
        $scope.email = null;
        $scope.group_id = null;
        $scope.acl_id = null;
        $scope.u_is_active = null;
        $scope.btnName = "Insert";
        $scope.show_data();
        $scope.getUsers();
      });
    }
  }
  $scope.show_data = function () {
    $http.get("crud_user/display.php")
      .success(function (data) {
        $scope.names = data;
      });
  }
  $scope.update_data = function (id, first_name, last_name, email, group_id, acl_id, u_is_active) {
    $scope.modTitle = "Update User";
    $scope.id = id;
    $scope.first_name = first_name;
    $scope.last_name = last_name;
    $scope.email = email;
    $scope.group_id = group_id;
    $scope.acl_id = acl_id;
    $scope.u_is_active = u_is_active;
    $scope.btnName = "Update";
  }
  $scope.send_link = function (id, first_name, last_name, email, group_id, acl_id) {
    //  alert('Sending email is not available. Email should be configured.');
    $scope.id = id;
    $scope.first_name = first_name;
    $scope.last_name = last_name;
    $scope.email = email;
    $scope.group_id = group_id;
    $scope.acl_id = acl_id;
    $scope.btnName = "Send";



    console.log(id);

    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        id: id,
        request_type: 5
      },
    }).then(function successCallback(response) {
      let userData = response.data;

      for (var i = 0; i < userData.length; i++) {
        $scope.userlinkparam = [{
          'location': $location.host(),
          'id': userData[i].id,
          'email': userData[i].email,
          'group_id': userData[i].group_id,
          'group_name': userData[i].group_name,
          'acl_id': userData[i].acl_id,
          'u_is_active': userData[i].u_is_active,
        }];
      }
      $scope.userlinkparam;
      console.log('$scope.userlinkparam', $scope.userlinkparam);
    })
  }




  $scope.openPortfolioURL = function () {
    try {
      //var portfolioURL = $scope.portfolio.link;
      window.open('portfolioURL', '_system');
    } catch (err) {
      alert(err);
    }
  }

  $scope.send_email = function (event) {
    // alert('Sending email is not available. Email should be configured.');
    let id = $(event.target).attr("data-id"),
      email = $(event.target).attr("data-email"),
      group_id = $(event.target).attr("data-groupid"),
      group_name = $(event.target).attr("data-groupname");
    $scope.btnName = "Send Email";
    $scope.url = 'https://joroni.dreamhosters.com/appmailer/mailer.php?email=' + email + '&user_id=' + id + '&group_id=' + group_id + '&group_name=' + group_name;
    //$scope.url = $sce.trustAsResourceUrl('https://joroni.dreamhosters.com/appmailer/mailer.php?email=' + email + '&user_id=' + id + '&group_id=' + group_id + '&group_name=' + group_name);
    try {
      window.open($scope.url);
      console.log($scope.url);
    } catch (err) {
      alert(err);
    }
  
  }





  $scope.activestat = function (id) {
    if (confirm("Are you sure you want to deactivate this user?")) {
      $http.post("crud_user/activestat.php", {
          'id': id
        })
        .success(function (data) {
          alert(data);
          $scope.show_data();
          $scope.getUsers();
        });
    } else {
      return false;
    }
  }
  $scope.delete_data = function (id) {
    if (confirm("Are you sure you want to delete?")) {
      $http.post("crud_user/delete.php", {
          'id': id
        })
        .success(function (data) {
          alert(data);
          $scope.show_data();
          $scope.getUsers();
        });
    } else {
      return false;
    }
  }



  // Check username 
  $scope.checkEmail = function () {
    /*    $http.post("crud_user/email_check.php", {
        'email': email
      })
      .success(function (data) {
       // alert(data);
       $scope.emailstatus = data;
      });
  }  */


    $http({
      method: 'post',
      url: 'crud_user/email_check.php',
      data: {
        email: $scope.email
      }
    }).then(function successCallback(response) {
      $scope.emailstatus = response.data;
    });
  }

  // Set class
  $scope.addClass = function (emailstatus) {
    if (emailstatus == 'Available') {
      return 'response exists';
    } else if (emailstatus == 'Not available') {
      return 'response not-exists';
    } else {
      return 'hide';
    }
  }







  $scope.getAdminUsers = function () {
    $http({
      method: 'post',
      url: 'processor/addremove.php',
      data: {
        request_type: 18
      },
    }).then(function successCallback(response) {
      let adminUsersData = response.data;
      console.log(adminUsersData);
      // $scope.allUsers = usersData;
      $scope.all_AdminUsers = adminUsersData;
      console.log('$scope.all_AdminUsers', $scope.all_AdminUsers);
    });
  }


});

app.config(function ($routeProvider) {
  $routeProvider
    .when('/home', {
      title: 'Home',
      templateUrl: 'home.php',
      controller: 'login_register_controller'
    })
    .when('/dashboard-grp', {
      title: 'Group',
      templateUrl: 'dashboard-grp.php',
      controller: 'login_register_controller'
    })
    .when('/allusers', {
      title: 'All Users',
      templateUrl: 'crud_user/index.php',
      controller: 'login_register_controller'
    })
    .when('/allgroups', {
      title: 'All Groups',
      templateUrl: 'crud_group/index.php',
      controller: 'login_register_controller'
    })
    .when('/dashboard-indi', {
      title: 'Individual Users',
      templateUrl: 'dashboard-indi.php',
      controller: 'login_register_controller'
    })
    .when('/settings-email', {
      title: 'Settings',
      templateUrl: 'crud_email/index.php',
      controller: 'login_register_controller'
    })
    .when('/register_admin', {
      title: 'Admin User',
      templateUrl: 'register_view.php',
      controller: 'login_register_controller'
    })
    
   /*   .otherwise({redirectTo: $routeProvider}); */
    .otherwise({
      //template: '<h1>Not Found</h1>'
      redirectTo: '/home'
    });
});
