<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet/less" type="text/css" href="less/template.less">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <script type="text/javascript" src="js/less.min.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <!-- <script type="text/javascript" src="js/script.js"></script> -->
    <script type="text/javascript" src="js/app.js"></script>
    <title>kleverator | portfolio accelerator</title>
  </head>
  <body  ng-app="klever" ng-controller="kleverCtrl" style="background-color:#eaeaea">
  <!-- NAVBAR END -->
  <?php include("navbar.html"); ?>
  <!-- SERACH START  -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-left">
        <h1>kleverator | portfolio accelerator</h1>
        <p>Freelance portal for developers and designers . by klever team</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <!-- RIGHT SIDE  -->
      <div class="col-md-9 ORDER_pane">
        <div class="" ng-show='main'>
          <?php include("main.php"); ?>
        </div>
        <div class="" ng-show='myprofile'>
          <?php include("myprofile.html"); ?>
        </div>
        <div class="" ng-show='tasks'>
          <?php include("tasks.php"); ?>
        </div>
        <div class="" ng-show='create'>
          <?php include("createTask.php"); ?>
        </div>
      </div>
        <!-- LEFT SIDE  -->
        <div class="col-md-3 sidebar SIDEBAR_pane " ng-show='USER_username!=null' >
        <h2>
        {{ USER_firstname }}<br>
        {{ USER_surname }}<br>
        <a> @{{ USER_username}} </a>
        </h2>

        <div class="list-group">
        <span href="#" class="list-group-item active" accesskey="">
        <h4>Submenu</h4>
        <span class="pull-right" id="slide-submenu">
        </span>
        </span>
        <a class="list-group-item" ng-click='layerMy()'>
        <i class="fa fa-folder-open-o"></i> My portfollio <span class="badge"></span>
        </a>
        <a  class="list-group-item" ng-click='layerTasks()'>
        <i class="fa fa-bar-chart-o"></i> In progress<span class="badge">{{ tasks_count }}</span>
        </a>
        <a  class="list-group-item" ng-click='layerCreate()'>
        <i class="fa fa-user"></i> Create task
        </a>
        </div>
        </div>
        <div class="col-md-3 SIDEBAR_pane" ng-show="!auth_boll">
          <form class="form-horizontal" method="post" action="#">

                  <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Your firstname</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input ng-model='fn' type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your lastname</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <input  ng-model='sn'type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        <input ng-model='un'type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input ng-model='pw' type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group ">
                    <button type="button" class="btn btn-primary btn-lg btn-block login-button" ng-click='SaveUser(fn,sn,un,pw)'>Register</button>
                  </div>

                </form>
        </div>

    </div>
  </div>
  </body>
</html>
