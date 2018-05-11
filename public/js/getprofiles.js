/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 47);
/******/ })
/************************************************************************/
/******/ ({

/***/ 4:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (immutable) */ __webpack_exports__["getProfiles"] = getProfiles;

function getProfiles() {
    var token = document.head.querySelector('meta[name="csrf-token"]').content;
    var profileUrl = './api/potentialmatch/' + document.head.querySelector('meta[name="userId"]').content;
    fetch(profileUrl).then(function (res) {
        return res.json();
    }).then(function (profiles) {
        return profiles.map(function (profile) {

            var profileCard = '<div class="col-sm-6 col-sm-4 col-lg-3 profile-card"><div class="thumbnail"><h5>Name: ' + profile.firstName + '</h5><p class="flex-text"> </p><img src="' + profile.profilePicture + '" alt="' + profile.firstName + '" style="max-height: 400px;"><div class="caption"><p class="flex-text"> </p><div class="text-center .ml-1"><h6>Gender: ' + profile.genderName + '</h6><h6>Age: ' + profile.age + '</h6>';
            if (profile.bodyTypeName != null) {
                profileCard += '<h6>Body Type: ' + profile.bodyTypeName + '</h6>';
            }

            if (profile.email != null) {
                profileCard += '<h6>Email: ' + profile.email + '</h6>';
            }

            profileCard += '</div><form action="updateLikeStatus" method="post" data-userid="' + profile.id + '"><input type="hidden" name="targetId" value="' + profile.id + '    "><div class="btn-group btn-group-toggle text-center col-12" data-toggle="buttons"><label class="btn btn-dislike col-5">' + '    <input type="radio" autocomplete="off" checked> Dislike</label><label class="btn btn-no-like-status active col-2"><input type="radio" autocomplete="off"></label>' + '    <label class="btn btn-like col-5"><input type="radio" autocomplete="off"> Like</label></div></form><button type="button" class="btn btn-info mt-3 mb-2 ml-3 mr-3" data-toggle="modal" data-target="#myModal' + profile.id + '">More Info</button>' + '            <div id="myModal' + profile.id + '" class="modal fade" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">' + '<div class="modal-dialog">' + '<div class="modal-content">' + '<div class="modal-header">' + '<h4 class="modal-title">Name: ' + profile.firstName + '</h4>' + '<button type="button"  data-dismiss="modal">&times;</button>' + '</div>' + '<div class="modal-body">' + '<div class="col-lg-12">' + '<div class="thumbnail">' + '<img src="' + profile.profilePicture + '" alt="' + profile.firstName + '" class="center" style="width:40%; margin:0 auto">' + '</div>' + '</div>' + '</div>' + '<div class="modal-body">' + '<div class="col-lg-12">' + '<div class="form-group row">' + '<label for="gender" class="col-md-4 col-form-label text-md-right">Gender: </label>' + '<div class="col-md-6">' + '<input id="gender" type="text" class="form-control" name="gender" value="' + profile.genderName + '" required disabled>' + '</div>' + '</div>' + '<div class="form-group row">' + '<label for="age" class="col-md-4 col-form-label text-md-right">Age </label>' + '<div class="col-md-6">' + '<input id="age" type="text" class="form-control" name="age" value="' + profile.age + '" required disabled>' + '</div>' + '</div>';

            if (profile.bodyTypeDisplay != null) {
                profileCard += '<div class="form-group row">' + '        <label for="bodyTypeName" class="col-md-4 col-form-label text-md-right">Body Type</label>' + '        <div class="col-md-6">' + '        <input id="bodyTypeName" type="text" class="form-control" name="BodyTypeName" value="' + profile.bodyTypeDisplay + '" required disabled>' + '        </div>' + '        </div>';
            }

            if (profile.stature != null) {
                profileCard += '<div class="form-group row">' + '        <label for="stature" class="col-md-4 col-form-label text-md-right">Stature</label>' + '        <div class="col-md-6">' + '        <input id="stature" type="text" class="form-control" name="Stature" value="' + profile.stature + '" required disabled>' + '        </div>' + '        </div>';
            }
            if (profile.countryName != null) {
                profileCard += '<div class="form-group row">' + '        <label for="countryName" class="col-md-4 col-form-label text-md-right">Country</label>' + '        <div class="col-md-6">' + '        <input id="countryName" type="text" class="form-control" name="Country" value="' + profile.countryName + '" required disabled>' + '        </div>' + '        </div>';
            }
            if (profile.ethnicityName != null) {
                profileCard += '<div class="form-group row">' + '        <label for="ethnicityName" class="col-md-4 col-form-label text-md-right">Ethnicity</label>' + '        <div class="col-md-6">' + '        <input id="ethnicityName" type="text" class="form-control" name="Country" value="' + profile.ethnicityName + '" required disabled>' + '        </div>' + '        </div>';
            }
            if (profile.educationName != null) {
                profileCard += '<div class="form-group row">' + '        <label for="educationName" class="col-md-4 col-form-label text-md-right">Education</label>' + '        <div class="col-md-6">' + '        <input id="educationName" type="text" class="form-control" name="Country" value="' + profile.educationName + '" required disabled>' + '        </div>' + '        </div>';
            }
            if (profile.religionName != null) {
                profileCard += '<div class="form-group row">' + '        <label for="religionName" class="col-md-4 col-form-label text-md-right">Education</label>' + '        <div class="col-md-6">' + '        <input id="religionName" type="text" class="form-control" name="Country" value="' + profile.religionName + '" required disabled>' + '        </div>' + '        </div>';
            }

            if (profile.hairColourName != null) {
                profileCard += '<div class="form-group row">' + '        <label for="hairColourName" class="col-md-4 col-form-label text-md-right">Hair Colour</label>' + '        <div class="col-md-6">' + '        <input id="hairColourName" type="text" class="form-control" name="Country" value="' + profile.hairColourName + '" required disabled>' + '        </div>' + '        </div>';
            }
            if (profile.eyeColourName != null) {
                profileCard += '<div class="form-group row">' + '        <label for="eyeColourName" class="col-md-4 col-form-label text-md-right">Eye Colour</label>' + '        <div class="col-md-6">' + '        <input id="eyeColourName" type="text" class="form-control" name="Country" value="' + profile.eyeColourName + '" required disabled>' + '        </div>' + '        </div>';
            }
            if (profile.drinkingPrefName != null) {
                profileCard += '<div class="form-group row">' + '        <label for="drinkingPrefName" class="col-md-4 col-form-label text-md-right">Drinking</label>' + '        <div class="col-md-6">' + '        <input id="drinkingPrefName" type="text" class="form-control" name="Country" value="' + profile.drinkingPrefName + '" required disabled>' + '        </div>' + '        </div>';
            }
            if (profile.smokingPrefName != null) {
                profileCard += '<div class="form-group row">' + '        <label for="smokingPrefName" class="col-md-4 col-form-label text-md-right">Smoking</label>' + '        <div class="col-md-6">' + '        <input id="smokingPrefName" type="text" class="form-control" name="Country" value="' + profile.smokingPrefName + '" required disabled>' + '        </div>' + '        </div>';
            }
            if (profile.leisureName != null) {
                profileCard += '<div class="form-group row">' + '        <label for="leisureName" class="col-md-4 col-form-label text-md-right">Leisure</label>' + '        <div class="col-md-6">' + '        <input id="leisureName" type="text" class="form-control" name="Country" value="' + profile.leisureName + '" required disabled>' + '        </div>' + '        </div>';
            }
            if (profile.personalityTypeName != null) {
                profileCard += '<div class="form-group row">' + '        <label for="personalityTypeName" class="col-md-4 col-form-label text-md-right">Personality</label>' + '        <div class="col-md-6">' + '        <input id="personalityTypeName" type="text" class="form-control" name="Country" value="' + profile.personalityTypeName + '" required disabled>' + '        </div>' + '        </div>';
            }
            if (profile.email != null) {
                profileCard += '<div class="form-group row">' + '        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>' + '        <div class="col-md-6">' + '        <input id="email" type="text" class="form-control" name="Country" value="' + profile.email + '" required disabled>' + '        </div>' + '        </div>';
            }

            profileCard += '<form action="updateLikeStatus" method="post" data-userid="' + profile.id + '">' + '<input type="hidden" name="targetId" value="' + profile.id + '">' + '<div class="btn-group btn-group-toggle text-center col-12" data-toggle="buttons">' + '<label class="btn btn-dislike col-5">' + '<input type="radio" autocomplete="off" checked> Dislike' + '</label>' + '<label class="btn btn-no-like-status active col-2">' + '<input type="radio" autocomplete="off">' + '</label>' + '<label class="btn btn-like col-5">' + '<input type="radio" autocomplete="off"> Like' + '</label>' + '</div>' + '</form>' + '</div>' + '</div>' + '<div class="modal-footer">' + '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' + '</div>' + '</div>' + '</div>' + '</div>' + '</div>' + '</div>' + '</div>';
            $("#profiles").append(profileCard);
        });
    }).then(function (buttons) {
        return setLikeButtons();
    });
};

/***/ }),

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(4);


/***/ })

/******/ });