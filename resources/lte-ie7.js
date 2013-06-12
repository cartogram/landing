/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-cart' : '&#xe000;',
			'icon-paypal' : '&#xe001;',
			'icon-twitter' : '&#xe002;',
			'icon-facebook' : '&#xe003;',
			'icon-close' : '&#xe005;',
			'icon-checkmark' : '&#xe006;',
			'icon-plus' : '&#xe007;',
			'icon-minus' : '&#xe008;',
			'icon-heart-fill' : '&#xe009;',
			'icon-arrow-right' : '&#xe004;',
			'icon-arrow-up' : '&#xe00a;',
			'icon-arrow-down' : '&#xe00b;',
			'icon-arrow-left' : '&#xe00c;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};