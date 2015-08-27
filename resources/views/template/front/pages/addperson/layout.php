<script type="text/ng-template" id="addPerson.html">
    <div class="well bs-component">
        <div ng-show="ctrl.added_list" class="">
            <legend>Added new</legend>

            <div class="" ng-repeat="added_user in ctrl.added_list track by added_user.id">
                {{ added_user.id }} - {{ added_user.name }}
            </div>

            <br/>
            <br/>
        </div>

        <form class="form-horizontal" ng-submit="ctrl.addPerson()">
            <fieldset>
                <legend>To add</legend>
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Name</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputName" ng-model="ctrl.person.name"
                               placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Favorite</label>

                    <div class="col-lg-10">
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox" ng-model="ctrl.person.favorite">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Rating</label>

                    <div class="col-lg-10">
                        <select class="form-control" id="select" ng-model="ctrl.person.rating">
                            <option selected="selected">Not yet rated</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button ng-click="ctrl.cancel()" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</script>


<script type="text/ng-template" id="personDashboard.html">

    <div class="well bs-component"
         style="padding: 0;
         margin-bottom: 0;
         background: url('/front/images/test/pussies.jpg') no-repeat center center ; height: 200px; background-size: cover">

    </div>

    <div class="well bs-component" style="padding-top: 10px;">

        <h1 style="margin-left: 20px;">{{ ctrl.data.name }}</h1>
        <br/>
        <br/>

        <form class="form-horizontal" ng-submit="ctrl.addPerson()">

            <fieldset>


                <div class="list-group">
<!--                    <div class="list-group-item">-->
<!--                        <div class="row-action-primary" style="padding-right: 30px;">-->
<!--                            <i class="mdi-file-folder"></i>-->
<!--                        </div>-->
<!--                        <div class="row-content">-->
<!--                            <div class="action-secondary"><i class="mdi-material-info"></i></div>-->
<!--                            <div>-->
<!---->
<!--                                        <span style="width: 50%; margin-right: 9%; display: inline-block;"-->
<!--                                              type="text" class="form-control" id="inputName"-->
<!--                                              ng-model="ctrl.person.name" placeholder="{{ row.value }}"-->
<!--                                              value="{{ row.value }}">-->
<!--                                            {{ ctrl.data.name }}-->
<!--                                        </span>-->
<!---->
<!--                                        <span style="width: 40%; display: inline-block;"-->
<!--                                              type="text" class="form-control" id="inputName"-->
<!--                                              ng-model="ctrl.person.name" placeholder="{{ row.label }}">-->
<!--                                            Name-->
<!--                                         </span>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="list-group-item" ng-repeat="row in ctrl.rows">
                        <div class="row-action-primary" style="padding-right: 30px;">
                            <i class="mdi-file-folder"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-material-info"></i></div>
                            <div>

                                    <span style="width: 50%; margin-right: 9%; display: inline-block;"
                                          type="text" class="form-control" id="inputName" ng-model="ctrl.person.name"
                                          placeholder="{{ row.value }}" value="{{ row.value }}">
                                        {{ row.value }}
                                    </span>

                                    <span style="width: 40%; display: inline-block;"
                                          type="text" class="form-control" id="inputName" ng-model="ctrl.person.name"
                                          placeholder="{{ row.label }}">
                                        {{ row.label }}
                                     </span>

                            </div>
                        </div>
                    </div>

                    <div class="list-group-separator"></div>
                </div>


                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button ng-click="ctrl.cancel()" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</script>