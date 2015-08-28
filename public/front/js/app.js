var app = angular.module('cypher_app',
        [
            //'ui.router',
            //'ngFlux',
            //'contenteditable',
            //'ui.bootstrap'
        ])

        //framework
        .directive('addPerson', addPerson)
        .directive('personDashboard', personDashboard)
        .directive('searchPeople', searchPeople)
        .directive('person', person)
        .directive('homepage', homepage)
    ;

function personDashboard() {
    "use strict";
    return {
        restrict: 'E',
        scope: {
            id: "@"
        },
        templateUrl: 'personDashboard.html',
        controllerAs: 'ctrl',

        controller: function ($scope, $http) {
            var self = this;

            var id = $scope.id;
            //self.defaultOptions = {
            //    url: '',
            //    date: '',
            //    phone: '',
            //    address: ''
            //};

            $http.get('/api/people/' + id).
                then(function (response) {
                    self.data = response.data;
                    self.rows = self.data.data;

                    // this callback will be called asynchronously
                    // when the response is available
                }, function (response) {
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
        }
    };
}

function addPerson() {
    "use strict";
    return {
        restrict: 'E',
        scope: {},
        templateUrl: 'addPerson.html',
        controllerAs: 'ctrl',
        controller: function ($scope, $http) {
            var self = this;

            _resetPerson();

            self.addPerson = function () {
                var itemCopy = angular.copy(self.person);
                if (!empty(itemCopy.name)) {
                    // Simple POST request example (passing data) :
                    $http.post('/api/add-person', {name: itemCopy.name}).
                        then(function (response) {
                            if (empty(self.added_list)) {
                                self.added_list = [];
                            }
                            self.added_list.push(response.data);
                            _resetPerson();
                        }, function (response) {
                        });

                } else {
                    alert('Error empty name field!!');
                }
            };

            self.cancel = function () {
                //window.history.back();
                window.location = "/"
            };

            function _resetPerson() {
                self.person = {
                    name: "",
                    favorite: false,
                    rating: "Not yet rated"
                };
            }
        }
    };
}


function searchPeople() {
    "use strict";
    return {
        restrict: 'E',
        scope: {},
        templateUrl: 'searchPeople.html',
        controllerAs: 'ctrl',
        controller: function ($scope, $http) {
            var self = this,
                searchKeyword = ''
                ;
            self.searchFinished = false;
            self.searchResults = [];

            self.searchPeople = function () {
                self.searchResults = [];
                self.searchFinished = false;

                if (!empty(self.searchKeyword)) {
                    $http.get(
                        '/api/people',
                        {
                            params: {
                                keyword: self.searchKeyword
                            }
                        }).
                        then(function (response) {
                            self.searchResults = response.data;
                            self.searchFinished = true;
                        }, function (response) {
                            self.searchFinished = true;
                        });

                } else {
                    alert('Please, provide search keyword.');
                }
            };
        }
    };

}

function person() {
    "use strict";
    return {
        restrict: 'E',
        scope: {
            person: '='
        },
        templateUrl: 'person.html',
        controllerAs: 'ctrl',
        controller: function ($scope, $http) {
            var self = this
                ;

            self.person = $scope.person;

            self.goToDashboard = function () {
                window.location = "/person/" + $scope.person.id;
            };
        }
    };

}

function homepage() {
    "use strict";
    return {
        restrict: 'E',
        scope: {},
        templateUrl: 'homepage.html',
        controllerAs: 'ctrl',
        controller: function ($http) {
            var self = this
                ;

            self.dataLoaded = false;
            self.people = [];

            $http.get('/api/people').
                then(function (response) {
                    self.people = response.data;
                    self.dataLoaded = true;
                }, function (response) {
                    self.people = [];
                    self.dataLoaded = false;
                });

        }
    };

}

