var app = angular.module('cypher_app',
        [
            //'ui.router',
            //'ngFlux',
            //'contenteditable',
            //'ui.bootstrap'
        ])

        //framework
        .directive('addPerson', addPerson)
    ;

function addPerson() {
    "use strict";
    return {
        restrict    : 'E',
        scope       : {},
        templateUrl : 'addPerson.html',
        controllerAs: 'ctrl',
        controller  : function ($scope) {
            var self = this,
                text;

            // TODO - empty 'login_user' for release
            self.login_user = {
                email   : "r.jansen@code14.nl",
                password: "123"
            };

            self.login = function () {
                var itemCopy = angular.copy(self.login_user);
                if (!empty(itemCopy.email) && !empty(itemCopy.password)) {

                } else {
                    text = 'Niet alle velden zijn gevuld';
                    self.openModal('md', 'Er ging iets mis!', text, 'OK');
                }
            };

            function _handleUser(status) {
                var text;
                if (status === 200) {
                    log('loginInputSubmit >> goto: choose_company');
                    //$state.go('choose_company', {order: 'asc', filter: ''});
                }
                else if (status === 400) {
                    text = 'Sorry, de combinatie van gebruikersnaam en wachtwoord was onjuist.';
                    //self.openModal('md', 'Er ging iets mis!', text, 'OK');
                }
                else if (status === 403) {
                    text = 'Sorry, u heeft geen toegang. Neem contact op met de beheerder.';
                    //self.openModal('md', 'Er ging iets mis!', text, 'OK');
                }
                else if (status === 500) {
                    text = 'Sorry, er is een systeem fout. Neem contact op met de beheerder.';
                    //self.openModal('md', 'Er ging iets mis!', text, 'OK');
                }
            }
        }
    };
}











