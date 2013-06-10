/*
  App controls all the JS functionality specifically for E1.com
*/
var App = {};

/*
  Initialize all functionality for the page after document is ready.
*/
App.init = function () {
  App.foundationInit();
};

/* 
  Initialize foundation and necessary settings.
*/
App.foundationInit = function () {
  $(document).foundation();
};

/*
  Entry point into the file.
*/
jQuery(document).ready(function() {
  App.init();
});

