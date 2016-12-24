var app = angular.module("klever", []);
app.controller("kleverCtrl", function ($scope,$http,$window) {
  //START ++
  $scope.main = true;
  $scope.myprofile = false;
  $scope.tasks = false;
  $scope.create = false;

  $scope.tasks_count = 0;
  $scope.username = "";
  $scope.password = "";
  $scope.valid_text = "";
  $scope.valid_boll = "";



  $scope.auth_boll = localStorage.getItem('auth_root');
  console.log($scope.auth_boll);
  if($scope.auth_boll==false){
    $scope.auth_boll=false;
  }
  if($scope.auth_boll){
    $scope.USER_firstname = localStorage.getItem('USER_firstname');
    $scope.USER_surname = localStorage.getItem('USER_surname');
    $scope.USER_username = localStorage.getItem('USER_username')
    $scope.USER_id = localStorage.getItem("USER_id");
  }
  console.log($scope.auth_boll);

  $scope.ALLDATA_list = [];
  $scope.ORDERS_list = [];
  $scope.USERSALL_list = [];
  // GLOBAL VARIABLES  =
  // $scope.ORDERS_list = JSON.parse(localStorage.getItem('orders'));
  // if($scope.ORDERS_list==null){$scope.ORDERS_list=[];}
  // ORDERS load
LoadDATA();
function LoadDATA(){
    var url = "http://localhost/work/kleverII/backend/getorders.php";
    $http.get(url).then(function(response){
      $scope.ALLDATA_list = response.data;
      $scope.ORDERS_list = $scope.ALLDATA_list[1].orders;

      console.log($scope.ALLDATA_list[1].orders)
      l = $scope.ALLDATA_list[1].orders.length;
      t = $scope.ALLDATA_list[1].orders
    })
  }

  $scope.getUserTitleByID= function(Myid) {
    t = $scope.ALLDATA_list
    l = t[0].users.length;
    // console.log(l+" asd")
    for (var i = 0; i < l; i++){
      // console.log(t[0].users[i].id)
      if(t[0].users[i].id==Myid){
        // console.log("correct");
        firstname = t[0].users[i].firstname;
        surname = t[0].users[i].surname;
        username = t[0].users[i].username;
        return firstname+" "+surname+" | @"+username;
      }
  }

  }
  // USER - LOGIN  SECTION

  // console.log($scope.auth_boll);
  function checkUsername(username,password) {
    console.log(username);
    console.log(password);
    var url = "http://localhost/work/kleverII/backend/checkUsername.php";
    $http.get(url+"?username="+username+"&password="+password).then(function(response){
      var result = String(response.data);
      console.log(response)
      console.log(result);
      var data = result.split(":")
      $scope.valid_status = "";
      $scope.valid_boll = "";
      if(data[0]=='FALSE'){
        $scope.valid_status = data["1"]
        $scope.valid_boll = true;
      }if(data[0]=='TRUE'){
        // $scope.tasks = []
        $scope.auth_boll = true;
        $scope.USER_username = data[3];
        $scope.USER_firstname = data[1];
        $scope.USER_surname = data[2];
        $scope.USER_id = data[4];
        tasksCount($scope.USER_id);
        localStorage.setItem('auth_root',true);
        localStorage.setItem('USER_username',$scope.USER_username);
        localStorage.setItem('USER_firstname',$scope.USER_firstname);
        localStorage.setItem('USER_surname',$scope.USER_surname);
        localStorage.setItem('USER_id',$scope.USER_id);
      }  })  }

  $scope.goAuth = function(){
    checkUsername($scope.username,$scope.password);
  }
  $scope.logout = function(){
    $scope.USER_username = null;
    $scope.USER_firstname = null;
    $scope.USER_surname = null;
    $scope.USER_id = null;
    $scope.auth_boll = false;
    localStorage.setItem('auth_root',false);
    console.log(localStorage.getItem('auth_root'))
    localStorage.setItem('USER_username',$scope.USER_username);
    localStorage.setItem('USER_firstname',$scope.USER_firstname);
    localStorage.setItem('USER_surname',$scope.USER_surname);
    localStorage.setItem('USER_id',$scope.USER_id);
    // $window.location = 'index.php';
  }
  // REGISTER
  $scope.fn='';
  $scope.sn='';
  $scope.un='';
  $scope.pw='';
  $scope.SaveUser= function(fn,sn,un,pw) {
    var url = "http://localhost/work/kleverII/backend/saveuser.php";
    $http.get(url+"?fn="+fn+"&sn="+sn+"&un="+un+"&pw="+pw).then(function(response){
      console.log(response.data);
      if(response.data=="TRUE"){
          checkUsername(un,pw);
      }
    })
  }
  ///  SIDE BAR
  $scope.title = '';
  $scope.descrp = '';
  $scope.tags = '';
  $scope.date = '';
  $scope.price = '';
  $scope.CreatTask = function(tit,des,tags,dat,prc){
    id = $scope.USER_id;
    console.log(tit);
    console.log(des);
    console.log(tags);
    console.log(dat);
    console.log(prc);
    if(tit!='' && des!='' && tags!='' && dat!='' && prc!='' && id!=''){
      var url = 'http://localhost/work/kleverII/backend/savetask.php';
      $http.get(url+"?t="+tit+"&d="+des+"&ta="+tags+"&da="+dat+"&pr="+prc+"&id="+id).then(function(response){
        console.log(response.data);
        data = response.data.split(":");
        if(data[0]='TRUE'){
          $window.location='index.php';
          LoadDATA();
        }
      });
    }
  }
  // delete your own task
  $scope.delTask = function(task_id){
      var url = 'http://localhost/work/kleverII/backend/deltask.php';
      $http.get(url+"?id="+task_id).then(function(response){
        console.log(response.data);
        if(response.data=="TRUE"){
          LoadDATA();
        }
      });
  }
  // save task in Progress
  function saveFrelancer(task_id,user_id) {
    var url = 'http://localhost/work/kleverII/backend/savefreelancer.php';
    $http.get(url+"?task_id="+task_id+"&user_id="+user_id).then(function(response){
      console.log(response.data);
  })
}
  $scope.respondThis = function(task_id,user_id){
    console.log(task_id);
    console.log(user_id);
    l = $scope.ALLDATA_list[1].orders.length;
    t = $scope.ALLDATA_list[1].orders
    for (var i = 0; i < l ;i++) {
      if(t[i].id==task_id){
        saveFrelancer(task_id,user_id);
        LoadDATA();
        tasksCount(user_id);
      }
    }
  }

  function tasksCount(user_id){
    l = $scope.ALLDATA_list[1].orders.length;
    t = $scope.ALLDATA_list[1].orders
    $scope.tasks_count=0;
    for (var i = 0; i < l ;i++) {
      if(t[i].freelancer_id==user_id){
        $scope.tasks_count+=1;
        LoadDATA();
      }
      // console.log($scope.tasks)
    }
  }


/// LAYERS


$scope.layerMain= function(){
  $scope.main = true;
  $scope.myprofile = false;
  $scope.tasks = false;
  $scope.create = false;
}
$scope.layerMy= function(){
  $scope.main = false;
  $scope.myprofile = true;
  $scope.tasks = false;
  $scope.create = false;
}
$scope.layerTasks= function(){
  $scope.main = false;
  $scope.myprofile = false;
  $scope.tasks = true;
  $scope.create = false;
}
$scope.layerCreate=function(){
  $scope.main = false;
  $scope.myprofile = false;
  $scope.tasks = false;
  $scope.create = true;
}



});
