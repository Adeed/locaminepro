if (document.getElementsByClassName('note')[0]) { 
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.open( 'POST', '/message');
	xmlHttp.send( null );
	setTimeout(function () {
		document.getElementsByClassName('client-note-box')[0].setAttribute('hidden', '');
	}, 7500);
}

if (captchaform = document.getElementById("captcha")) {
	function validateForm() {		
		if (captchaform.checkValidity() == true) {
			grecaptcha.execute();
		} 		
		else {
			document.getElementById("formerror").innerHTML = "Error! Please re-check your data.";
		}
	}
	
	function submitForm() {
		captchaform.submit();
	}
	
	captchaform.addEventListener('keypress', function (e) {
		if (e.keyCode == 13) {
			e.preventDefault();
			validateForm();
		}
	});	
}

function getProfitPerTime(amount) {	
	if (amount == 0) amount = 0.00000001;
	var proportion = (amount - data.pricing.min_investment) / (data.pricing.max_investment - data.pricing.min_investment),
		scaledROI = data.pricing.roi_duration - ((data.pricing.roi_duration * data.pricing.invest_scaling) * proportion);				
	return ((amount / (scaledROI * 86400)) * (days.value * 86400)) / amount;		
}

function getBTCpower(btc) {	
	var min_hashpower = data.pricing.min_investment / data.pricing.hashpower_price,
		max_hashpower = data.pricing.max_investment / data.pricing.hashpower_price,
		proportion = (max_hashpower - min_hashpower) / (data.pricing.max_investment - data.pricing.min_investment),
		scaling = (((btc - data.pricing.min_investment) / (data.pricing.max_investment - data.pricing.min_investment)) * (1 - data.pricing.invest_scaling));		
	if (btc < data.pricing.min_investment) scaling = 0;
	if (btc > data.pricing.max_investment) scaling = (1 - data.pricing.invest_scaling);		
	return Math.round((1+scaling) * btc * proportion);
}

var excData = [];
function updateExchange() {
	var setCurrency = document.getElementsByClassName('setCurrency');
	
	switch (currency.value) {
		case 'usd':
			excData.price = data.btc_price.usd;
			excData.currency = 'USD';
			break;
		case 'eur':
			excData.price = data.btc_price.eur;
			excData.currency = 'EUR';
			break;
		case 'gbp':
			excData.price = data.btc_price.gbp;
			excData.currency = 'GBP';
			break;
		case 'rub':
			excData.price = data.btc_price.rub;
			excData.currency = 'RUB';
			break;
		case 'cny':
			excData.price = data.btc_price.cny;
			excData.currency = 'CNY';
			break;
		case 'inr':
			excData.price = data.btc_price.inr;
			excData.currency = 'INR';
			break;
		default:
			excData.price = 1;
			excData.currency = 'BTC';
			break;
	}
	
	if (typeof(Storage) !== 'undefined') localStorage.setItem('currency', currency.value);	
	for (i = 0; i < setCurrency.length; i++) setCurrency[i].innerHTML = excData.currency;					
}

function exchangeAll() {
	var exchangeItems = document.querySelectorAll('[data-btc]');	
	(excData.currency == 'BTC') ? numFix = 8 : numFix = 2;		
	
	for (i = 0; i < exchangeItems.length; i++) {		
		if (exchangeItems[i].tagName == 'INPUT') {
			exchangeItems[i].removeAttribute('value');
			exchangeItems[i].value = (exchangeItems[i].getAttribute('data-btc') * excData.price).toFixed(numFix);			
		}
		
		else {
			exchangeItems[i].innerHTML = (exchangeItems[i].getAttribute('data-btc') * excData.price).toFixed(numFix) + ' ' + excData.currency;	
		}
	}			
}

function exchangeByElement(el) {
	var exchangeItem = el;	
	(excData.currency == 'BTC') ? numFix = 8 : numFix = 2;		
			
	if (exchangeItem.tagName == 'INPUT') {
		exchangeItem.removeAttribute('value');
		exchangeItem.value = (exchangeItem.getAttribute('data-btc') * excData.price).toFixed(numFix);			
	}
	
	else {
		exchangeItem.innerHTML = (exchangeItem.getAttribute('data-btc') * excData.price).toFixed(numFix) + ' ' + excData.currency;	
	}		
}

function updatePricing() {	
	if (investment.value < parseInt(investment.min)) investment.value = investment.min;
	if (investment.value > (data.pricing.max_investment * excData.price)) investment.value = (data.pricing.max_investment * excData.price);	
	if (days.value < parseInt(days.min)) days.value = days.min;
	if (days.value > parseInt(days.max)) days.value = days.max;		
	investment.setAttribute('data-btc', (investment.value / excData.price));	
	decProfit = getProfitPerTime(investment.getAttribute('data-btc'));
	
	var proportion = (investment.getAttribute('data-btc') - data.pricing.min_investment) / (data.pricing.max_investment - data.pricing.min_investment),
		scaledROI = data.pricing.roi_duration - ((data.pricing.roi_duration * data.pricing.invest_scaling) * proportion),
		scaledUP = data.pricing.hashpower_price - ((data.pricing.hashpower_price * data.pricing.invest_scaling) * proportion);
	
	roi.innerHTML = scaledROI.toFixed(0);		
	unitprice.setAttribute('data-btc', scaledUP.toFixed(8));
	exchangeByElement(unitprice);		
	
	setDays.innerHTML = days.value;	
	profit.setAttribute('data-btc', (decProfit * investment.getAttribute('data-btc')));
	exchangeByElement(profit);	
	pProfit.innerHTML = (decProfit * 100).toFixed(3);	
	setInvestment.setAttribute('data-btc', investment.getAttribute('data-btc'));
	exchangeByElement(setInvestment);	
	hashpower.innerHTML = getBTCpower(investment.getAttribute('data-btc'));
}

if (currency = document.getElementById('currency')) {
	if ((typeof(Storage) !== 'undefined') && (typeof(localStorage.currency) !== 'undefined')) currency.value = localStorage.currency;	
	
	// --
	if (localStorage.currency == 'btc') currency.checked = false;
	else if (localStorage.currency == 'usd') currency.checked = true;
	
	function syncCurrencyCheckbox() {			
		if (!currency.checked) currency.value = 'btc'; 
		else if (currency.checked) currency.value = 'usd';		
	}	
	syncCurrencyCheckbox();
	currency.addEventListener('change', syncCurrencyCheckbox);
	// --	
	
	updateExchange();	
	exchangeAll();	
	currency.addEventListener('change', updateExchange);
	currency.addEventListener('change', exchangeAll);
}

if (calculator = document.getElementById('calculator')) {	
	var investment = document.getElementById('investment'),
		setInvestment = calculator.getElementsByClassName('setInvestment')[0],
		days = document.getElementById('days'),
		setDays = calculator.getElementsByClassName('setDays')[0],
		roi = document.getElementById('roi'),
		unitprice = document.getElementById('unitprice'),		
		profit = document.getElementById('profit'),		
		pProfit = document.getElementById('pProfit'),		
		hashpower = document.getElementById('hashpower');
	
	updatePricing();	
	investment.addEventListener('keyup', updatePricing);
	investment.addEventListener('change', updatePricing);	
	days.addEventListener('keyup', updatePricing);	
	days.addEventListener('change', updatePricing);		
}

if (datetimes = document.querySelectorAll('[data-time]')) {
	function pad(d) {
		return (d < 10) ? '0' + d.toString() : d.toString();
	}
	
	for (i = 0; i < datetimes.length; i++) {
		var date = new Date(datetimes[i].getAttribute('data-time')*1000),
			year = date.getFullYear(),
			month = pad(date.getMonth()+1),
			day = pad(date.getDate()),
			hours = pad(date.getHours()),
			minutes = pad(date.getMinutes()),
			seconds = pad(date.getSeconds());
		datetimes[i].innerHTML = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
	}
}

/*
if (userBalance = document.getElementById('user-balance')) {
	var lastBalance = data.user.balance;
	setInterval(function () {
		lastBalance += (data.user.profit_sec);
		userBalance.innerHTML = lastBalance.toFixed(8);
	}, 33);
}
*/

if (investor = document.getElementById('investor')) {	
	var deposit = document.getElementById('deposit'),
		buyHashpower = document.getElementById('deposit-hashpower'),
		payinValue = document.getElementById('payin_value'),
		payWithBTCBtn = document.getElementById('payWithBTC'),
		closePayWithBTCBox = document.getElementById('closePayWithBTCBox'),
		payWithBTCBox = document.getElementById('btc-deposit'),		
		paymentURL = document.getElementById('paymentURL'),
		defaultpaymentURL = paymentURL.href,
		paymentQR = document.getElementById('paymentQR'),		
		timeout;
	
	var qrcode = new QRCode(paymentQR, {
			text: defaultpaymentURL,
			width: 200,
			height: 200,
			colorDark : "#000000",
			colorLight : "#ffffff",
			correctLevel : QRCode.CorrectLevel.L
		});
	
	payWithBTCBtn.addEventListener('click', function () {
		payWithBTCBox.removeAttribute('hidden');		
	});
	
	closePayWithBTCBox.addEventListener('click', function () {
		payWithBTCBox.setAttribute('hidden', '');
		
	});
		
	function updatePayIn() {
		if (deposit.value < parseInt(deposit.min)) deposit.value = deposit.min;
		if (deposit.value > (data.pricing.max_investment * excData.price)) deposit.value = (data.pricing.max_investment * excData.price).toFixed(numFix);
		deposit.setAttribute('data-btc', (deposit.value / excData.price));
		buyHashpower.innerHTML = getBTCpower(deposit.getAttribute('data-btc'));		
		paymentURL.href = defaultpaymentURL + '?amount=' + deposit.getAttribute('data-btc');		
		clearTimeout(timeout);
		timeout = setTimeout(function () {
			qrcode.makeCode(paymentURL.href); 			
		}, delay);		
		payinValue.value = deposit.getAttribute('data-btc');		
	}
	
	delay = 0;	
	updatePayIn();
	delay = 500;
	deposit.addEventListener('keyup', updatePayIn);
	deposit.addEventListener('change', updatePayIn);	
}

if (withdraw = document.getElementById('withdraw')) {
	var payoutValue = document.getElementById('payout_value'); 
	function syncWithdraw() {
		if (withdraw.value < parseInt(withdraw.min)) withdraw.value = withdraw.min;
		if (withdraw.value > (data.user.balance * excData.price)) withdraw.value = (data.user.balance * excData.price).toFixed(numFix);
		withdraw.setAttribute('data-btc', (withdraw.value / excData.price));		
		payoutValue.value = withdraw.getAttribute('data-btc');			
	}
	syncWithdraw();
	withdraw.addEventListener('keyup', syncWithdraw);
	withdraw.addEventListener('change', syncWithdraw);	
}

if (refSelect = document.getElementById('refselect')) {
	var refIMG = document.getElementById('refimg'),
		refBB = document.getElementById('refbbcode'),
		refHTML = document.getElementById('refhtml'),
		refID = data.user.user_id;
	function updateRefIMG() {
		refIMG.src = '/assets/images/banner/b' + refSelect.value + '.gif';
		refBB.value = '[url='+data.ref_url+'/?ref='+refID+'][img]'+data.ref_url+'/assets/images/banner/b'+refSelect.value+'.gif[/img][/url]';
		refHTML.value = '<a href="'+data.ref_url+'/?ref='+refID+'" alt="'+data.site_name+' Banner"><img src="'+data.ref_url+'/assets/images/banner/b'+refSelect.value+'.gif"></a>';
	}
	updateRefIMG();
	refSelect.addEventListener('change', updateRefIMG);
}
