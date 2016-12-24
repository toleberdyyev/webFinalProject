
  <!-- <b class="color:black" ng-repeat='x in ALLDATA_list[0][1]'> HEllo </b> -->
  <form class="form-group center" action="index.html" method="post">
    <input type="text" name="" value="" class="form-control " ng-model='search' placeholder="search . . .">
  </form>
  <div class="col-md-6 ORDER_post" ng-repeat='x in ALLDATA_list[1].orders | filter:search | orderBy:"-id"' ng-show='x.freelancer_id==0'>
    <div class="post">
      <!-- ORDER NAME  -->
      <b><a href="#">{{ getUserTitleByID(x.author_id) }}</a></b>
    <h1><a href="#">{{ x.title }}</a></h1>
    <!-- ORDER DESCRP -->
    <p>{{ x.descrp }}</p>
    <!-- ORDER TAGS -->
    <p>
      <a  class="tag" ng-repeat='i in x.tags'>{{ i }}</a>
    </p><hr>
    <!-- ORDER Deadline  -->
    <b>Deadline : </b><a href="#">{{ x.deadline }}</a><br>
    <!-- ORDER money -->
    <b>Price : <a href="#" class="money">〒 {{ x.price }}</a></b>
    <hr>
    <!-- ORDER respond -->
    <div class="" ng-show='auth_boll'>
      <button type="button" name="button" class="btn btn-success" ng-show='x.author_id!=USER_id && x.freelancer_id==0' ng-click='respondThis(x.id,USER_id)'>Respond for task</button>
      <button type="button" name="button" class="btn btn-warning" ng-hide='x.author_id!=USER_id' ng-click='delTask(x.id)'>Delete my task</button>
    </div>
    </div>
  </div>
