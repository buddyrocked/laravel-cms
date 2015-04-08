// Place third party dependencies in the lib folder
//
// Configure loading modules from the lib directory,
// except 'app' ones, 
requirejs.config({
    "baseUrl": baseUrl+"/assets",
    "paths": {
      "jquery"            : "vendor/jquery/dist/jquery",
      "jqueryui"          : "vendor/jqueryui/jquery-ui.min",
      "swall"             : "vendor/sweetalert/lib/sweet-alert.min",
      "tagsInput"         : "vendor/jquery.tagsinput/jquery.tagsinput",
      "tinymce"           : "vendor/tinymce/tinymce.min",
      "init"              : "vendor/tinymce/jquery.tinymce.min",
      "masonry"           : "vendor/masonry/dist/masonry.pkgd.min",
      "imagesloaded"      : "vendor/imagesloaded/imagesloaded.pkgd.min",
      "easypiechart"      : "vendor/jquery.easy-pie-chart/dist/jquery.easypiechart",
      "selectpicker"      : "vendor/bootstrap-select/dist/js/bootstrap-select.min",
      "bootstrapSwitch"   : "vendor/bootstrap-switch/dist/js/bootstrap-switch.min",
      "nprogress"         : "vendor/nprogress/nprogress",
      "raphael"           : "vendor/raphael/raphael-min",
      "morris"            : "vendor/morris/morris.min",
      "moment"            : "vendor/moment/min/moment.min",
      "datetimepicker"    : "vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min",
      "amcharts"          : "vendor/amcharts/amcharts",
      "serial"            : "vendor/amcharts/serial",
      "pie"               : "vendor/amcharts/pie",
      "ammap"             : "vendor/ammap/ammap",
      "ammapWh"           : "vendor/ammap/maps/js/worldHigh",
      "mCustomScrollbar"  : "vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar",
      "knob"              : "vendor/jquery-knob/js/jquery.knob"

    },
    shim: {
	    'jquery'        :   {
                	           exports: 'jQuery'
                            },
	    'tagsInput'     :   ['jquery'],
	    'masonry'       :   ['jquery'],
	    'imagesloaded'  :   ['jquery'],
        'tinymce'       :   ['jquery'],
        'init'          :   ['jquery'],
        'selectpicker'  :   ['jquery'],
        'datetimepicker':   ['jquery'],
        'morris'        :   {
                                deps:['jquery', 'raphael'],
                                exports : 'Morris'
                            },
        'serial'        :   {
                                deps: ['amcharts'],
                                exports: 'AmCharts',
                                init: function() {
                                    AmCharts.isReady = true;
                                }
                            },
        'pie'        :   {
                                deps: ['amcharts'],
                                exports: 'AmCharts',
                                init: function() {
                                    AmCharts.isReady = true;
                                }
                            },
        'ammap'        :   {
                                deps: ['amcharts'],
                                exports: 'AmCharts',
                                init: function() {
                                    AmCharts.isReady = true;
                                }
                            },
        'ammapWh'        :   {
                                deps: ['amcharts', 'ammap'],
                                exports: 'AmCharts',
                                init: function() {
                                    AmCharts.isReady = true;
                                }
                            },

	}
});

// Load the main app module to start the app
requirejs(["js/budi-layout2"]);