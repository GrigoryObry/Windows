function calcPrice() {
	var w = $('#wndWidth').val()/100;
	var h = $('#wndHeight').val()/100;
	var P
	var str = $('#main-img').attr('src')
	P = ((1300*(w*h))+3000);

	if ((str.charAt(12) >= 1) && (str.charAt(12) <= 6)) 
	{
		P = P + 2*(1200*w);
		P =	P + 2*(1200*h);
	}
//тип рамы 1 - одна створка
	if (( (str.charAt(12) >= 7) && (str.charAt(12) <= 9) ) || ( (str.charAt(12)+str.charAt(13) >=10) && (str.charAt(12)+str.charAt(13) <= 15) )) 
	{
		P = P + 2*(1200*w);
		P =	P + 3*(1200*h);
	}
//тип рамы 2 - две створки
	if ((str.charAt(12)+str.charAt(13) >= 16) && (str.charAt(12)+str.charAt(13) <= 22)) 
	{
		P = P + 2*(1200*w);
		P =	P + 4*(1200*h);
	}
// тип рамы 3 - три створки
	if ((str.charAt(12)+str.charAt(13) >= 23) && (str.charAt(12)+str.charAt(13) <= 25)) 
	{
		P = P + 2*(1200*w);
		P =	P + 2*(1200*h);
		P = P + 1200*(0.65*h);
	}
	else if ((str.charAt(12)+str.charAt(13) >= 26) && (str.charAt(12)+str.charAt(13) <= 27))
	{
		P = P + 2*(1200*w);
		P =	P + 2*(1200*h);
		P = P + 2*(1200*(0.65*h));
	}
// тип рамы 4 - балконная дверь и створки	
	if ((str.charAt(12)+str.charAt(13) >= 28) && (str.charAt(12)+str.charAt(13) <= 30)) 
	{
		P = P + 2*(1200*h);
		P =	P + 3*(1200*w);
		P =	P + 1200*(0.7*h);
	} 
	else if ((str.charAt(12)+str.charAt(13) >= 31) && (str.charAt(12)+str.charAt(13) <= 32)) 
	{
		P = P + 2*(1200*h);
		P =	P + 3*(1200*w);
		P =	P + 2*(1200*(0.7*h));
	}
// тип рамы 5 - горизонтальная створки
	if ($('#podokonnik').prop("checked")) 
	{
		P = P + (1000*w);
	}

	if ($('#otliv').prop("checked")) 
	{
		P = P + (1100*w);
	}

	if ($('#otkos').prop("checked")) 
	{
		P = P + (1000*w+2*(1000*h));
	}

	if ($('#setka').prop("checked")) 
	{
		P = P + (600*(w*h));
	}

	P = Math.round(P);
	$('#priceSpan').text(P);
	$('#price').val(P);
};

	
$('#baseform').on('change', calcPrice);
$('body').on('click', calcPrice);


function scale(i) {
var w1 = 70 //Ширина одностворного окна
var h1 = 120 //Высота одностворного окна

var w2 = 140 //Ширина двустворного окна
var h2 = 120 //Высота двустворного окна

var w3 = 210 //Ширина трехстворного окна
var h3 = 120 //Высота техсворного окна

var w4 = 200 //Ширина балконного окна
var h4 = 220 //Высота балконого окна

var w5 = 200 //Ширина окна с горизонтальной створкой 
var h5 = 160 //Высота окна с горизонтальной створкой


	if (i==1) {$('#wndWidth').attr('value', w1) && $('#wndHeight').attr('value',h1)} 
		else if (i==2) {$('#wndWidth').attr('value', w2) && $('#wndHeight').attr('value',h2)}
			else if (i==3) {$('#wndWidth').attr('value', w3) && $('#wndHeight').attr('value',h3)}
				else if (i==4) {$('#wndWidth').attr('value', w4) && $('#wndHeight').attr('value',h4)}
					else if (i==5) {$('#wndWidth').attr('value', w5) && $('#wndHeight').attr('value',h5)}
};

function check(c) {
	if (c==1) 
	{
		if ($('#podokonnik').val()==1) {$('#podokonnik').val(0); $('#podokonnik-hidden').val(0);} 
		else { $('#podokonnik').val(1); $('#podokonnik-hidden').val(1);}
	} 
	else if (c==2) 
	{
		if ($('#otliv').val()==1) {	$('#otliv').val(0); $('#otliv-hidden').val(0);} 
		else {	$('#otliv').val(1); $('#otliv-hidden').val(1);}
	}
	else if (c==3) 
	{
		if ($('#otkos').val()==1) {	$('#otkos').val(0); $('#otkos-hidden').val(0);} 
		else {	$('#otkos').val(1); $('#otkos-hidden').val(1);}
	}
	else if (c==4) 
	{
		if ($('#setka').val()==1) {	$('#setka').val(0); $('#setka-hidden').val(0);} 
		else {	$('#setka').val(1); $('#setka-hidden').val(1);}
	}

};