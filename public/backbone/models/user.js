	User = Backbone.Model.extend({
     initialize: function() {
     },
     validate: function ( attributes ) {
      if( attributes.pwduser !=null && attributes.firstnameuser!=null && attributes.lastnameuser!=null ) {
       return "Veuillez remplir tout les champs";
      }
      
     }
    });
     

