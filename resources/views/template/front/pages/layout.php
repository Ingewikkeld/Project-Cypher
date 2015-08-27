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
                        <input type="text" class="form-control" id="inputName" ng-model="ctrl.person.name" placeholder="Name">
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



<script type="text/ng-template" id="searchPeople.html">
    <div class="well bs-component">
        <form class="form-horizontal" ng-submit="ctrl.searchPeople()">
            <fieldset>
                <legend>Keyword</legend>
                <div class="form-group">
                    <label for="inputKeyword" class="col-lg-2 control-label">Keyword</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputKeyword" ng-model="ctrl.searchKeyword" placeholder="Keyword">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
    <div class="well bs-component" ng-show="ctrl.searchFinished">
        <div>
            <legend>Results</legend>

            <div ng-show="ctrl.searchResults.length">
                <div class="" ng-repeat="person in ctrl.searchResults track by person.id">
                    {{ person.id }} - {{ person.name }}
                </div>
            </div>
            <div ng-show="!ctrl.searchResults.length">
                No results, sorry.
            </div>

            <br/>
            <br/>
        </div>
    </div>
</script>