var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'toaster','chart.js', 'datatables','angular.filter']);
app.config(['$routeProvider',
        function($routeProvider) {
            $routeProvider.
            when('/login', {
                    title: 'Login',
                    templateUrl: 'login.php',
                    controller: 'authCtrl'
                })
                .when('/logout', {
                    title: 'Logout',
                    templateUrl: 'login.php',
                    controller: 'logoutCtrl'
                })
                .when('/signup', {
                    title: 'Signup',
                    templateUrl: 'signup.php',
                    controller: 'authCtrl'
                })
                .when('/home', {
                    title: 'Home',
                    templateUrl: 'home.php',
                    controller: 'authCtrl'
                })
                .when('/dashboard-grp', {
                  title: 'Group',
                  templateUrl: 'dashboard-grp.php',
                  controller: 'authCtrl'
              })
              .when('/allusers', {
                title: 'All Users',
                templateUrl: 'allusers.php',
                controller: 'authCtrl'
            })
             .when('/dashboard-indi', {
                title: 'Individual Users',
                templateUrl: 'dashboard-indi.php',
                controller: 'authCtrl'
            })
                .when('/', {
                    title: 'Login',
                    templateUrl: 'login.php',
                    controller: 'authCtrl',
                    role: '0'
                })
                .otherwise({
                    redirectTo: '/login'
                });
        }
    ])
    .run(function($rootScope, $location, Data,) {
        $rootScope.$on("$routeChangeStart", function(event, next, current) {
            $rootScope.authenticated = false;
            Data.get('session').then(function(results) {
                if (results.user_id) {
                    $rootScope.authenticated = true;
                    $rootScope.user_id = results.user_id;
                    $rootScope.user_name = results.user_name;
                    $rootScope.user_email = results.user_email;
                } else {
                    var nextUrl = next.$$route.originalPath;
                    if (nextUrl == '/signup' || nextUrl == '/login') {

                    } else {
                        $location.path("/login");
                    }
                }
            });
        });
    });


    app.controller("quizAdmin", function ($scope, $http,$location) {

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
      
      
        
       
      });
      
      
      