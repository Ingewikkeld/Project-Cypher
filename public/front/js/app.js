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
            self.defaultOptions = {
                url: '',
                date: '',
                phone: '',
                address: ''
            };

            console.log('/api/peoples/' + id);

            $http.get('/api/peoples/' + id).
                then(function (response) {
                    console.log(response);

                    self.data = response.data;
                    self.rows = self.data.data;

                    // this callback will be called asynchronously
                    // when the response is available
                }, function (response) {
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });

            _resetPerson();

            self.addPerson = function () {
                var itemCopy = angular.copy(self.person);
                if (!empty(itemCopy.name)) {
                    // Simple POST request example (passing data) :
                    $http.post('/api/add-person', {name: itemCopy.name}).
                        then(function (response) {
                            //console.log(response);
                            if (empty(self.added_list)) {
                                self.added_list = [];
                            }
                            self.added_list.push(response.data);
                            //console.log(self.added_list);
                            _resetPerson();
                        }, function (response) {
                            console.log(response, 'bad');
                        });

                } else {

                    alert('Error empty name field!!');
                    //self.openModal('md', 'Er ging iets mis!', text, 'OK');
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

function addPerson() {
    "use strict";
    return {
        restrict: 'E',
        scope: {},
        templateUrl: 'addPerson.html',
        controllerAs: 'ctrl',
        controller: function ($scope, $http) {
            var self = this,
                text;

            _resetPerson();

            self.addPerson = function () {
                var itemCopy = angular.copy(self.person);
                if (!empty(itemCopy.name)) {
                    // Simple POST request example (passing data) :
                    $http.post('/api/add-person', {name: itemCopy.name}).
                        then(function (response) {
                            //console.log(response);
                            if (empty(self.added_list)) {
                                self.added_list = [];
                            }
                            self.added_list.push(response.data);
                            //console.log(self.added_list);
                            _resetPerson();
                        }, function (response) {
                            console.log(response, 'bad');
                        });

                } else {
                    text = 'Niet alle velden zijn gevuld';

                    alert('Error empty name field!!');
                    //self.openModal('md', 'Er ging iets mis!', text, 'OK');
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
