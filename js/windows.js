<!-- ДИНАМИЧЕСКИЕ ОКНА -->		
$(document).ready(function () {

	i = 0
	j = 0

	$('#window-type').change(function () {

		if ($('#window-type').val() == 'circle') {

			$('.win-rad').css('display', 'block');
			$('.win-width').css('display', 'none');
			$('.win-height').css('display', 'none');
			$('#vert').css('display', 'none');
			$('#horz').css('display', 'none');

		} else {

			$('.win-rad').css('display', 'none');
			$('.win-width').css('display', 'inline-block');
			$('.win-height').css('display', 'inline-block');
			$('#vert').css('display', 'inline-block');
			$('#horz').css('display', 'inline-block');

		}
	});	

	$('#draw-rect').click(windowdraw);

	$('#draw-vert').click(vertical);

	$('#draw-horz').click(horizontal);

	$('#remove-vert').click(vertical_remove);

	$('#remove-horz').click(horizontal_remove);

	$('.vsize').on('click', $('#win-width').focus());
	$('.hsize').on('click', $('#win-height').focus());

	<!--\ ДИНАМИЧЕСКИЕ ОКНА -->
	function vertical_remove () {

		d3.selectAll('#vertical-' + i).remove();

		i--

		if (i < 0) {
			i = 0
		}
		console.log(i);
	}

	function horizontal_remove () {

		d3.select('#horizontal-' + j).remove();

		j--

		if (j < 0) {
			j = 0
		}
		console.log(j);
	}

	function compare(wdt, hgt, rad) {

		wdt = Number(wdt);
		hgt = Number(hgt);
		vert = Number(vert); 
		horz = Number(horz);
		rad = Number(rad);

		wv = 350
		hv = 350
		sizeheight = hv + wv/2
	};

	function windowdraw () {
		$('.sizes').html('');
		d3.select('.sizes').append('div').attr('class', 'windows')

		console.clear();

		var wdt = $('#win-width').val();
			hgt = $('#win-height').val();
			rad = $('#win-rad').val();
			radv = Number(0);
			rv = 150;

		compare(wdt, hgt, rad);

		radv = 2*rad;

		if ($('#window-type').val() == 'arc') {

			svg = d3.select('.windows')
			.append('svg')
			.attr('class', 'window')
			.attr('width', wv)
			.attr('height', hv + wv/2);
		$('.window').css('display', 'inline');


			ark = d3.select('.window')
				.append('circle')
				.attr('cx', wv / 2)
				.attr('cy', wv / 2)
				.attr('r', wv / 2)
				.attr('fill', 'rgb(234,234,234)')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

			d3.select('.window')
				.append('circle')
				.attr('cx', wv / 2)
				.attr('cy', wv / 2)
				.attr('r', wv / 2 - 10)
				.attr('fill', 'rgb(255,255,255)')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

		// $('.windows').prepend($('.arc'));

			rect = d3.select('.window')
				.append('rect')
				.attr('id', 'rect1')
				.attr('x', 0)
				.attr('y', wv/2)
				.attr('width', wv)
				.attr('height', hv)
				.attr('fill', 'rgb(234,234,234)')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

			d3.select('.window')
				.append('rect')
				.attr('id', 'rect2')
				.attr('x', 10)
				.attr('y', wv/2+10)
				.attr('width', wv - 20)
				.attr('height', hv - 20)
				.attr('fill', 'rgb(255,255,255)')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')


			size = d3.select('.sizes')
				.append('svg')
				.attr('class', 'size-svg size-svg-v')
				.attr('width', 50)
				.attr('height', hv + wv/2);
			$('.arc').css('display', 'inline');

			d3.select('.size-svg-v')
				.append('polyline')
				.attr('points', '0,0 50,0 25,0 25,'+sizeheight+' 50,'+sizeheight+' 0,'+sizeheight+'')
				.attr('fill', 'none')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')				

			$('.sizes').prepend($('.size-svg-v'));

			d3.select('.sizes')
				.append('svg')
				.attr('class', 'size-svg size-svg-h')
				.attr('width', wv)
				.attr('height', 50);
			$('.arc').css('display', 'inline');

			d3.select('.size-svg-h')
				.append('polyline')
				.attr('points', '0,0 0,'+50+' 0,25 '+wv+',25 '+wv+',0 '+wv+',50')
				.attr('fill', 'none')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

			$('.sizes').append($('.size-svg-h'));

				d3.select('.sizes')
				.append('label')
				.attr('class', 'vsize size')
				
				d3.select('.sizes')
				.append('label')
				.attr('class', 'hsize size')

			$('.vsize').html(''+hgt+'см.').css('top','250').css('right','400');
			$('.hsize').html(''+wdt+'см.').css('bottom','-80').css('right','0');
		}

		if ($('#window-type').val() == 'square') {

			svg = d3.select('.windows')
				.append('svg')
				.attr('class', 'window')
				.attr('width', wv)
				.attr('height', hv);
			$('.window').css('display', 'inline');

			rect = d3.select('.window')
				.append('rect')
				.attr('id', 'rect1')
				.attr('x', 0)
				.attr('y', 0)
				.attr('width', wv)
				.attr('height', hv)
				.attr('fill', 'rgb(234,234,234)')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

			d3.select('.window')
				.append('rect')
				.attr('id', 'rect2')
				.attr('x', 10)
				.attr('y', 10)
				.attr('width', wv - 20)
				.attr('height', hv - 20)
				.attr('fill', 'rgb(255,255,255)')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

				size = d3.select('.sizes')
				.append('svg')
				.attr('class', 'size-svg size-svg-v')
				.attr('width', 50)
				.attr('height', hv);
			$('.arc').css('display', 'inline');

			d3.select('.size-svg-v')
				.append('polyline')
				.attr('points', '0,0 50,0 25,0 25,'+hv+' 50,'+hv+' 0,'+hv+'')
				.attr('fill', 'none')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')				

			$('.sizes').prepend($('.size-svg-v'));

			d3.select('.sizes')
				.append('svg')
				.attr('class', 'size-svg size-svg-h')
				.attr('width', wv)
				.attr('height', 50);
			$('.arc').css('display', 'inline');

			d3.select('.size-svg-h')
				.append('polyline')
				.attr('points', '0,0 0,'+50+' 0,25 '+wv+',25 '+wv+',0 '+wv+',50')
				.attr('fill', 'none')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

			$('.sizes').append($('.size-svg-h'));

				d3.select('.sizes')
				.append('label')
				.attr('class', 'vsize size')
				
				d3.select('.sizes')
				.append('label')
				.attr('class', 'hsize size')

			$('.vsize').html(''+hgt+'см.').css('top','250').css('right','400');
			$('.hsize').html(''+wdt+'см.').css('bottom','-80').css('right','0');

		} else if ($('#window-type').val() == 'circle') {

			svg = d3.select('.windows')
				.append('svg')
				.attr('class', 'window')
				.attr('width', wv)
				.attr('height', hv);
			$('.window').css('display', 'inline');

			circle = d3.select('.window')
				.append('circle')
				.attr('cx', wv / 2)
				.attr('cy', wv / 2)
				.attr('r', wv / 2)
				.attr('fill', 'rgb(234,234,234)')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

			d3.select('.window')
				.append('circle')
				.attr('cx', wv / 2)
				.attr('cy', wv / 2)
				.attr('r', wv / 2 - 10)
				.attr('fill', 'rgb(255,255,255)')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

				size = d3.select('.sizes')
				.append('svg')
				.attr('class', 'size-svg size-svg-v')
				.attr('width', 50)
				.attr('height', hv);
			$('.arc').css('display', 'inline');

			d3.select('.size-svg-v')
				.append('polyline')
				.attr('points', '0,0 50,0 25,0 25,'+hv+' 50,'+hv+' 0,'+hv+'')
				.attr('fill', 'none')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')				

			$('.sizes').prepend($('.size-svg-v'));

			d3.select('.sizes')
				.append('svg')
				.attr('class', 'size-svg size-svg-h')
				.attr('width', wv)
				.attr('height', 50);
			$('.arc').css('display', 'inline');

			d3.select('.size-svg-h')
				.append('polyline')
				.attr('points', '0,0 0,'+50+' 0,25 '+wv+',25 '+wv+',0 '+wv+',50')
				.attr('fill', 'none')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

			$('.sizes').append($('.size-svg-h'));

				d3.select('.sizes')
				.append('label')
				.attr('class', 'vsize size')
				
				d3.select('.sizes')
				.append('label')
				.attr('class', 'hsize size')

			$('.vsize').html(''+radv+'см.').css('top','250').css('right','400');
			$('.hsize').html(''+radv+'см.').css('bottom','-80').css('right','0');

		}


		console.log(wdt);
		console.log(hgt);

		console.log(wv);
		console.log(hv);
	}

	function vertical () {


	var wdt = $('#win-width').val();
		hgt = $('#win-height').val();
		vert = $('#vert').val();
		dv = 0

			compare(wdt, hgt, rad);

		if (vert >= wdt || wdt-vert <= 20 || wdt-20 <= vert) {alert('Введены неккоректные данные, растотяние от краёв окна слишком мало.')} else {
	
			if (vert < wdt / 2) {
				dv = wv / 4
			} else if (wdt / vert == 2) {
				dv = wv / 2
			} else if (vert > wdt / 2) {
				dv = wv / 4 * 3
			}
	
			if ($('#window-type').val() == 'arc') { y = wv/2 + 10
			}  else if ($('#window-type').val() == 'square') {y = 10
				} else if ($('#window-type').val() == 'circle') { 
					dv = wv / 2 - 5
					y = 10
					};
	
	
			i++
			var rect = d3.select('.window')
				.append('rect')
				.attr('id', 'vertical-' + i)
				.attr('x', dv)
				.attr('y', y)
				.attr('width', 10)
				.attr('height', hv - 20)
				.attr('fill', 'rgb(234,234,234)')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')
	
			console.log('vert', vert);
			console.log('width/vert', wdt / vert);
			console.log('wv/2', wv / 2);
			console.log('dv', dv);
		}
	};

	function horizontal () {

		var wdt = $('#win-width').val();
		hgt = $('#win-height').val();
		horz = $('#horz').val();
		dh = 0


			compare(wdt, hgt, rad);
	
		if (horz >= hgt || hgt-horz <= 20 || hgt-20 <= horz) {alert('Введены неккоректные данные, растотяние от краёв окна слишком мало.')} else {
			
			if ($('#window-type').val() == 'arc') { x = 10 

				if (horz < hgt / 2) {
					dh = wv/2 + hv - hv / 4
				} else if (hgt / horz == 2) {
						dh = wv/2 + hv / 2
					} else if (horz > hgt / 2) {
							dh = wv/2 + hv / 4
						}

			}  else if ($('#window-type').val() == 'square') {x = 10

				if (horz < hgt / 2) {
				dh = hv - hv / 4
				} else if (hgt / horz == 2) {
					dh = hv / 2
					} else if (horz > hgt / 2) {
						dh = hv / 4
						}
	
				} else if ($('#window-type').val() == 'circle') { 
					dh = hv / 2
					x = 10
					};
	
			j++
			rect = d3.select('.window')
				.append('rect')
				.attr('id', 'horizontal-' + j)
				.attr('x', x)
				.attr('y', dh)
				.attr('width', wv - 20)
				.attr('height', 10)
				.attr('fill', 'rgb(234,234,234)')
				.attr('stroke-width', 3)
				.attr('stroke', 'rgb(50,50,50)')

		}
		console.log('horz ', horz);
		console.log('j ', j);
		console.log('dh ', dh)
	};

})