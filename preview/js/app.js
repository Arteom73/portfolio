var app = {

	'init': function() {

		if (!$('.js-select-theme.active').length) {
			$('.js-select-theme').first().addClass('active');
		}

		var currentTheme = [];
		currentTheme['name'] = $('.js-select-theme.active').text();
		currentTheme['link'] = $('.js-select-theme.active').attr('href');

		app.buildFrame(currentTheme['link']);

		$('.js-select-current').text(currentTheme['name']);

		$(document).on('click', '.js-select-theme', function(e) {
			e.preventDefault();
			var $this = $(this);
			currentTheme['name'] = $this.text();
			currentTheme['link'] = $this.attr('href');
			$('.js-select-theme').removeClass('active');
			$this.addClass('active');
			app.updateFrame(currentTheme['link']);
			history.pushState({foo: 'bar'}, currentTheme['name'] + ' >> Coder-free', '/preview/'+currentTheme['name']+'/');
		})

	},
	'buildFrame': function(link) {

		$('body').append('<iframe class="iframe js-frame" scrolling="0" frameborder="0" name="iframe" src="'+link+'"></iframe>')

	},
	'updateFrame': function(link) {

		$('.js-frame').attr('src', link);

	}

}
$(function() {
	app.init();
})