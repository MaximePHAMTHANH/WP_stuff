setInterval(function(){get_info()}, 2000);


function get_info(){
  var url,cur_string;
  var cur_list=[];
  for (const element of document.getElementsByClassName("Crypto_Price")) {cur_list.push(element.id);}

  cur_string="";
  for (const element of cur_list){cur_string=cur_string.concat(',',element);}
  cur_string=cur_string.slice(1);


  url='https://min-api.cryptocompare.com/data/pricemultifull?fsyms='.concat(cur_string,'&tsyms=USD&e=Coinbase');
  axios.get(url).then(response => {
    const Result = response.data.RAW;
    for (const element of cur_list){
      var change24=Result[element]["USD"]["CHANGEPCT24HOUR"].toFixed(2);
      var elem =document.getElementById(element.concat("_UpDown"));
      if (change24>0){elem.innerText="▲ ".concat(change24,"%");
      elem.className="Crypto_Up";
      }
      else if (change24<0) {elem.innerText="▼ ".concat(change24,"%");
      elem.className="Crypto_Down";
      }
      else {elem.innerText="0.00% ";
      elem.className="Crypto_Flat";
      }
      document.getElementById(element).innerText='$'.concat(Result[element]["USD"]["PRICE"].toFixed(2));
    }
  });
  
}

window.addEventListener("load", function() {get_info()});