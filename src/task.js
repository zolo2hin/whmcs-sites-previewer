var page = require('webpage').create(),
	system = require('system');

var address = system.args[1],
	file = system.args[2],
	b_width = system.args[3],
	b_height = system.args[4],
	c_width = system.args[5],
	c_height = system.args[6];
	console.log('address');
console.log(address);
console.log('file');
console.log(file);
console.log('b_width');
console.log(b_width);
console.log('b_height');
console.log(b_height);
console.log('c_width');
console.log(c_width);
console.log('c_height');
console.log(c_height);

page.viewportSize = {width: b_width, height: b_height};

page.clipRect = {"width":c_width,"height":c_height,"top":0,"left":0};

page.open(address, function (status) {
    if (status !== 'success') { phantom.exit(1); }
    page.render(file);
    phantom.exit();
});
