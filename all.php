<div class="col-md-9 ORDER_pane">
  <!-- <b class="color:black" ng-repeat='x in ALLDATA_list[0][1]'> HEllo </b> -->
  <div class="col-md-6 ORDER_post" ng-repeat='x in ALLDATA_list[1].orders|orderBy:"-id"'>
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
    <button type="button" name="button" class="btn btn-success">Respond for job</button>
    </div>
  </div>
</div>
