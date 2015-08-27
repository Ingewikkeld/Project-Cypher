var app = angular.module('cypher_app',
        [
            //'ui.router',
            //'ngFlux',
            //'contenteditable',
            //'ui.bootstrap'
        ])

        //framework
        .directive('addPerson', addPerson)
        .directive('searchPeople', searchPeople)
    ;

function addPerson() {
    "use strict";
    return {
        restrict    : 'E',
        scope       : {},
        templateUrl : 'addPerson.html',
        controllerAs: 'ctrl',
        controller  : function ($scope, $http) {
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
                            if(empty(self.added_list)){
                                self.added_list = [];
                            }
                            self.added_list.push(response.data);
                            //console.log(self.added_list);
                            _resetPerson();
                        }, function (response) {
                            console.log(response,'bad');
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

            function _resetPerson(){
                self.person = {
                    name    : "",
                    favorite: false,
                    rating  : "Not yet rated"
                };
            }
        }
    };
}

function searchPeople() {
    "use strict";
    return {
        restrict    : 'E',
        scope       : {},
        templateUrl : 'searchPeople.html',
        controllerAs: 'ctrl',
        controller  : function ($scope, $http) {
            var self = this,
                text,
                searchKeyword = ''
                ;
            self.searchFinished = false;
            self.searchResults = [];

            self.searchPeople = function () {
                self.searchResults = [];
                self.searchFinished = false;

                if (!empty(self.searchKeyword)) {
                    $http.get(
                        '/api/peoples',
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
                            console.log(response,'bad');
                        });

                } else {
                    alert('Please, provide search keyword.');
                }
            };
        }
    };

}










