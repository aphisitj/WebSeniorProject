(function() {
    var app = angular.module('store', []);
    app.controller('StoreController', function() {
        this.product = gems;
    });

    var gems = [
	    {
	        name: 'Dodecahedron',
	        price: 2.95,
	        description: '......',
	        canPurchase: true,
	        soldOut: false,
	        images:[
	        {
	        	full:'',
	        	thumb:''
	        }]
	    },
	     {
	        name: 'Pentagonal Gem',
	        price: 5.95,
	        description: '......',
	        canPurchase: true,
	        soldOut: false,
	        images:[
	        {
	        	full:'',
	        	thumb:''
	        }]
	    }
    ];

})();
