
  <!-- <b class="color:black" ng-repeat='x in ALLDATA_list[0][1]'> HEllo </b> -->
  <div class="col-md-12 ORDER_post" >
    <div class="post">
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Title of task</label>
          <input  ng-model='title' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title of your task">
          <small id="fileHelp" class="form-text text-muted">This section it the main title of your task.</small>
        </div>
        <div class="form-group">
          <label for="exampleTextarea">Example textarea</label>
          <textarea ng-model='descrp' class="form-control" id="exampleTextarea" rows="6" placeholder="text or description of your task ... "></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Write a tags, which users must need to know this parts.</label>
          <input ng-model='tags' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="AngularJs,Css,html,Js,...">
          <small id="fileHelp" class="form-text text-muted"> write tage for example : html,css,js...</small>
        </div>
        <div class="row">
          <div class="col-xs-5">
            <label for="exampleTextarea">Date of deadline this deadline</label>
            <input ng-model='date' class="form-control" type="date"  id="example-date-input">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-5">
            <label for="exampleInputEmail1">Price of project</label>
            <input ng-model='price' type="number" class="form-control" placeholder="$ 99.9">
          </div>
        </div><hr>
        <button type="submit" class="btn btn-primary" ng-click='CreatTask(title,descrp,tags,date,price)'>Submit</button>
      </form>
    </div>
  </div>
