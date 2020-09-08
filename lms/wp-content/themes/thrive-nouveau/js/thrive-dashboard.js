/**
 * This file loads when dashboard template is loaded.
 * @since 3.0
 */
jQuery(document).ready(function($){
	var dash_toolbar = $('#reset-widgets-position').draggabilly({});
	 $('[data-toggle="tooltip"]').tooltip(); 
});
// external js: packery.pkgd.js, draggabilly.pkgd.js
// -------------------------------
// add Packery.prototype methods
// get JSON-friendly data for items positions
jQuery(document).ready(function($){
	
	Packery.prototype.getShiftPositions = function( attrName ) {
	  attrName = attrName || 'id';
	  var _this = this;
	  return this.items.map( function( item ) {
	    return {
	      attr: item.element.getAttribute( attrName ),
	      x: item.rect.x / _this.packer.width
	    }
	  });
	};

	Packery.prototype.initShiftLayout = function( positions, attr ) {
	  if ( !positions ) {
	    // if no initial positions, run packery layout
	    this.layout();
	    return;
	  }

	  var supported_dashboard_size = 900;

	  if ( $('#dashboard-widgets').width() < supported_dashboard_size ) {
	  	this.layout();
	    return;
	  }

	  // parse string to JSON
	  if ( typeof positions == 'string' ) {
	    try {
	      positions = JSON.parse( positions );
	    } catch( error ) {
	      console.error( 'JSON parse error: ' + error );
	      this.layout();
	      return;
	    }
	  }
	  
	  attr = attr || 'id'; // default to id attribute
	  this._resetLayout();
	  // set item order and horizontal position from saved positions
	  this.items = positions.map( function( itemPosition ) {
	    	var selector = '[' + attr + '="' + itemPosition.attr  + '"]'
	    	var itemElem = this.element.querySelector( selector );
	    	var item = this.getItem( itemElem );
	    	if ( item ) {
	    		item.rect.x = itemPosition.x * this.packer.width;
	    	}
	    	return item;
	  	}, this );

	 		this.shiftLayout();
	};
});
// -----------------------------//

jQuery(document).ready(function($){
	// Packery for homepage
	$('#dashboard-widgets').imagesLoaded( function()
		{

			$('#dashboard-widgets > .home-widgets').each(function(i){
				$(this).attr('data-item-id', i+1);
			});

			// Initialize packery.
			var grid = $('#dashboard-widgets').packery({
				itemSelector: '.home-widgets',
				columnWidth: '.home-widgets',
				gutter: 20,
				percentPosition: true,
				initLayout: false, // disable initial layout,
			});

			// Fetch the user custom widget location.
			var initPositions = null;
			var finalNodes = initPositions;

			if ( thrive_dashboard_widgets.user_widgets_position[0]  ) 
			{
				initPositions = thrive_dashboard_widgets.user_widgets_position[0];

				// Check if there are new widgets.
				var count_rendered_home_widgets = $('.home-widgets').length;
				var count_saved_home_widgets = JSON.parse(initPositions).length;

				if ( count_rendered_home_widgets > count_saved_home_widgets ) 
				{
					finalNodes = JSON.parse(initPositions);

					for (var i = count_saved_home_widgets+1; i <= count_rendered_home_widgets; i++) 
					{
						finalNodes[i-1] = {attr: i.toString(), x: 0 };
					}

				} else {
					finalNodes = JSON.parse(initPositions);
				}

			}

			var widgetFinalPositions = finalNodes;
			
			if ( finalNodes ) {
				widgetFinalPositions = JSON.stringify(widgetFinalPositions);
			}

			grid.packery( 'initShiftLayout', widgetFinalPositions, 'data-item-id' );

			// Make the home widgets draggable if the size of the dashboard is supported.
			var supported_dashboard_size = 900;
			var draggies = [];

			if ( $('#dashboard-widgets').width() > supported_dashboard_size  ) {
				grid.find('.home-widgets').each( function( i, itemElem ) {
			  		var draggie = new Draggabilly( itemElem, {
						handle: '.widget-title',
			  		});
			  		grid.packery( 'bindDraggabillyEvents', draggie );
			  		draggies.push(draggie);
			  		$('.home-widgets > .widget-title').each(function(){
			    		$(this).addClass('draggable');
			    	});
				});
			}

			
			// Save the position after the current logged-in user drop the .home-widget element.
			grid.on( 'dragItemPositioned', function() {
			  	var positions = grid.packery( 'getShiftPositions', 'data-item-id' );
			  	saveHomepageWidgetsPosition( JSON.stringify( positions ) );
			});

			// Assign a 'data-item-id' attribute when the user starts dragging and dropping widgets.
			grid.on( 'layoutComplete', orderItems );
			grid.on( 'dragItemPositioned', orderItems );

			// Callback function to 'layoutComplete' and dragItemPositioned.
			function orderItems() 
			{
				var itemElems = grid.packery('getItemElements');
			  	$( itemElems ).each( function( i, itemElem ) {
			    	$(itemElem).attr( 'data-item-id', i + 1 );
			  	});
			}

			// Disable/Enable the drag and drop functionality depending on the size of the dashboard.
			var resizeId;
			$(window).resize(function() {
			    clearTimeout(resizeId);
			    resizeId = setTimeout(doneResizing, 500);
			});

			function doneResizing(){
				// Disable drag and drop
			    if ( $('#dashboard-widgets').width() < supported_dashboard_size  ) {
			    	console.log('disabling drag and drop');
			    	$('.home-widgets > .widget-title').each(function(){
			    		$(this).removeClass('draggable');
			    	});
				  	draggies.forEach( function( draggie ) { draggie['disable'](); });
				  
			    } else {
			    	console.log('enabling drag an drop');
			    	$('.home-widgets > .widget-title').each(function(){
			    		$(this).addClass('draggable');
			    	});
				  	draggies.forEach( function( draggie ) { draggie['enable'](); });
			    }
			}

			// Sents a request to server to persist the record the the user_meta table.
			function saveHomepageWidgetsPosition( clientOrder )
			{
				
				var dashboardWidgetsPositionEntry = [];

				$('#dashboard-widgets > .home-widgets').each(function(){
					var key = $(this).attr('data-item-id');
					dashboardWidgetsPositionEntry[key-1] = $(this).attr('id');
				});
				
				var widgetsPosition = {
					widgetsOrder: dashboardWidgetsPositionEntry,
					packeryOrder: clientOrder,
					action: 'thrive_dashboard_widgets_reposition'
				}

				$.ajax({
				  	type: "POST",
				  	url: thrive_dashboard_widgets.ajax_url,
				  	data: widgetsPosition,
				  	success: function(response){
				  		console.log(response);
				  	},
				  	error: function (e, event, f) {
				  		console.log(f)
				  	}
				});
				
				console.log('saving.. saving complete..');
			}
		}
	);
	
})