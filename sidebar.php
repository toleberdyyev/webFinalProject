<div class="col-md-3 sidebar SIDEBAR_pane " ng-show='auth_boll'>
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
<a href="myprofile.html" class="list-group-item">
<i class="fa fa-comment-o"></i> My portfollio <span class="badge"></span>
</a>
<a href=tasks.php class="list-group-item">
<i class="fa fa-search"></i> In progress<span class="badge">{{ tasks.length }}</span>
</a>
<a href="createTask.php" class="list-group-item">
<i class="fa fa-user"></i> Create task
</a>
<a href="#" class="list-group-item">
<i class="fa fa-folder-open-o"></i> My tasks <span class="badge">{{  }}</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-bar-chart-o"></i> Respounds for my tasks <span class="badge">14</span>
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
