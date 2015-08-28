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
            <img class="picture" ng-src="/images/{{ ctrl.person.canonical }}.jpg" alt="" />
            <span class="name">{{ ctrl.person.name }}</span>
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
</script>

<script type="text/ng-template" id="personDashboard.html">

    <div class="well bs-component"
         style="padding: 0;
         margin-bottom: 0;
         background: url('/images/frankvandenbrink.jpg') no-repeat center center ; height: 200px; background-size: cover">

    </div>

    <div class="well bs-component" style="padding-top: 10px;">

        <h1 style="margin-left: 20px;">{{ ctrl.data.name }}</h1>
        <br/>
        <br/>

        <form class="form-horizontal" ng-submit="ctrl.addPerson()">

            <fieldset>


                <div class="list-group">

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
