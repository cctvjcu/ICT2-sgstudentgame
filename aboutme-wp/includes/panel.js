(function () {
  "use strict";
    tinymce.create('tinymce.plugins.accordion', {
        init : function(ed, url) {
            ed.addButton('accordion', {
                title : 'Add an Accordion',
                image : url+'/images/accordion.png',
                onclick : function() {
                     ed.selection.setContent("[accordion head='']" + ed.selection.getContent() + "[/accordion]");

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('accordion', tinymce.plugins.accordion);
})();

(function () {
  "use strict";
    tinymce.create('tinymce.plugins.resume', {
        init : function(ed, url) {
            ed.addButton('resume', {
                title : 'Add a Resume',
                image : url+'/images/resume.png',
                onclick : function() {
                     ed.selection.setContent("[resume place='' time='']" + ed.selection.getContent() + "[/resume]");

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('resume', tinymce.plugins.resume);
})();