<script type="text/ng-template" id="addPerson.html">
    <div class="well bs-component">
        <div ng-show="ctrl.added_list" class="">
            <legend>Previously added</legend>

            <div ng-repeat="(id,added_user) in ctrl.added_list track by added_user.id">
                <person data-id="id" data-person="added_user"></person>
            </div>

        </div>

        <form class="form-horizontal" ng-submit="ctrl.addPerson()">
            <fieldset>
                <legend ng-show="ctrl.added_list">Add another</legend>
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Name</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputName" ng-model="ctrl.person.name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <a ng-click="ctrl.cancel()" class="btn btn-default">Cancel</a>
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
                    <person data-person="person"></person>
                </div>
            </div>
            <div ng-show="!ctrl.searchResults.length">
                No results, sorry.
            </div>
        </div>
    </div>
</script>


<script type="text/ng-template" id="person.html">
    <div ng-click="ctrl.goToDashboard()"
         class="row alert alert-dismissable alert-success"
         style="margin-bottom: 5px; cursor: pointer;">
        <div class="col-xs-12">
            <i class="mdi-action-account-circle"
               style="float: left; font-size: 40px; margin-right: 20px;"></i>
                        <span style="display: inline-block; font-size: 18px; line-height: 40px;">
                            {{ ctrl.person.name }}
                        </span>
        </div>
    </div>
</script>

<script type="text/ng-template" id="homepage.html">
    <div class="well bs-component">
        <div ng-if="ctrl.dataLoaded">
            <legend>People</legend>

            <div ng-show="ctrl.people.length">
                <div ng-repeat="person in ctrl.people track by person.id">
                    <person data-person="person"></person>
                </div>
            </div>
            <div ng-show="!ctrl.people.length">
                No entries to show. <a href="/add-person">Add one now</a>.
            </div>
        </div>
        <div ng-if="!ctrl.dataLoaded">
            <p>Data is being fetched... Please wait.</p>
        </div>
    </div>
</script>-