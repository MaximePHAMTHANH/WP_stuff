function Convert(to_convert,output1,output2,output3){
	var eth,btc,eur,input,coin_url;
	coin_url="https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC,ETH&tsyms=USD,EUR&e=Coinbase";
	axios.get(coin_url).then(response=>{
		eth=response.data.RAW["ETH"]["USD"]["PRICE"];
		btc=response.data.RAW["BTC"]["USD"]["PRICE"];
		eur=response.data.RAW["BTC"]["USD"]["PRICE"]/response.data.RAW["BTC"]["EUR"]["PRICE"];
		input=document.getElementById(to_convert).value;
		if (to_convert=="eth"){
		document.getElementById(output1).value=(eth*input).toFixed(0);
		document.getElementById(output2).value=(eth/btc*input).toFixed(3);
		document.getElementById(output3).value=(eth/eur*input).toFixed(0);	
		}
		else if (to_convert=="dol"){
		document.getElementById(output1).value=(1/eth*input).toFixed(2);
		document.getElementById(output2).value=(1/btc*input).toFixed(3);
		document.getElementById(output3).value=(1/eur*input).toFixed(0);		
		}
		else if (to_convert=="btc"){
		document.getElementById(output1).value=(btc/eth*input).toFixed(2);
		document.getElementById(output2).value=(btc*input).toFixed(0);
		document.getElementById(output3).value=(btc/eur*input).toFixed(0);		
		}
		else if (to_convert=="eur"){
		document.getElementById(output1).value=(eur/eth*input).toFixed(2);
		document.getElementById(output2).value=(eur*input).toFixed(0);
		document.getElementById(output3).value=(eur/btc*input).toFixed(3);		
		}

	});
	
}


