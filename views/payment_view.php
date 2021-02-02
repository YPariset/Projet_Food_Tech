<div class="wrapper">
    
    <?php if(isset($_GET['load'])) : ?>
        <h1>paiement</h1>
        <div class="gridContainer">
        <ul class="topLinks"> 
        <li>FEELIN' FOOD</li>
        
      </ul>
      <div class="creditCard">
        <div class="visaLogo">
          <span><i>LISA</i></span>
        </div>
        <div class="chipLogo">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 230 384.4 300.4" width="38" height="70">
						<path d="M377.2 266.8c0 27.2-22.4 49.6-49.6 49.6H56.4c-27.2 0-49.6-22.4-49.6-49.6V107.6C6.8 80.4 29.2 58 56.4 58H328c27.2 0 49.6 22.4 49.6 49.6v159.2h-.4z" data-original="#FFD66E" data-old_color="#00FF0C" fill="rgb(237,237,237)"/>
						<path d="M327.6 51.2H56.4C25.2 51.2 0 76.8 0 107.6v158.8c0 31.2 25.2 56.8 56.4 56.8H328c31.2 0 56.4-25.2 56.4-56.4V107.6c-.4-30.8-25.6-56.4-56.8-56.4zm-104 86.8c.4 1.2.4 2 .8 2.4 0 0 0 .4.4.4.4.8.8 1.2 1.6 1.6 14 10.8 22.4 27.2 22.4 44.8s-8 34-22.4 44.8l-.4.4-1.2 1.2c0 .4-.4.4-.4.8-.4.4-.4.8-.8 1.6v74h-62.8v-73.2-.8c0-.8-.4-1.2-.4-1.6 0 0 0-.4-.4-.4-.4-.8-.8-1.2-1.6-1.6-14-10.8-22.4-27.2-22.4-44.8s8-34 22.4-44.8l1.6-1.6s0-.4.4-.4c.4-.4.4-1.2.4-1.6V64.8h62.8v72.4c-.4 0 0 .4 0 .8zm147.2 77.6H255.6c4-8.8 6-18.4 6-28.4 0-9.6-2-18.8-5.6-27.2h114.4v55.6h.4zM13.2 160H128c-3.6 8.4-5.6 17.6-5.6 27.2 0 10 2 19.6 6 28.4H13.2V160zm43.2-95.2h90.8V134c-4.4 4-8.4 8-12 12.8h-122V108c0-24 19.2-43.2 43.2-43.2zm-43.2 202v-37.6H136c3.2 4 6.8 8 10.8 11.6V310H56.4c-24-.4-43.2-19.6-43.2-43.2zm314.4 42.8h-90.8v-69.2c4-3.6 7.6-7.2 10.8-11.6h122.8v37.6c.4 24-18.8 43.2-42.8 43.2zm43.2-162.8h-122c-3.2-4.8-7.2-8.8-12-12.8V64.8h90.8c23.6 0 42.8 19.2 42.8 42.8v39.2h.4z" data-original="#005F75" class="active-path" data-old_color="#005F75" fill="rgba(0,0,0,.4)"/>
				  </svg>
        </div>
        <ul class="ccList">
          <li> </li>
        </ul>
        <h4 class="name"> </h4>
        <h4 class="year">   </h4>
      </div>
      <div class="div previousStep"> 
        <div class="arrow">
        <a onclick='document.location.href="index.php?page=shoppingCart"' >back</a>	
        </div>
        
      </div>
      <form action="#" id="paymentForm">
        <h6>Payment Details</h6>
        <div class="inputCon" id="name" data-top="Name on Card" >
          <input type="text" placeholder="Your name"/>
        </div>
        <div class="inputCon" id="cardNum" data-top="Card Number" title = "type in the card number without spaces" >
          <input type="text" placeholder="1234 5678 9101 1213" >
        </div>
        <div class="inputCon" id="validYear" data-top="Valid Through" >
          <input type="text" placeholder="00/00"/>
        </div>
        <div class="inputCon" id="cvv" data-top="CVV" >
          <input type="text" placeholder="000"/>
        </div>
        <button>pay<span><?= $_SESSION['panierMontant'] ?></span></button>
      </form>
    </div>
    <?php else : ?>
        <div id="loader" class="load"></div>
    <?php endif; ?>
</div>

<script>
    function hide(){
        document.getElementById('loader').style.display= "none";
        document.location.href="index.php?page=payment&load"; 
    }
    setTimeout(hide,4000);



    window.addEventListener("load", () => {
    // forms
    let inputs = document.querySelectorAll("input");
    let ccList = document.querySelectorAll(".ccList li");
    let name = document.querySelector(".name");
    let year = document.querySelector(".year");
    let inputCon = document.querySelectorAll(".inputCon");
    let btn = document.querySelector('button');
    //credit card
    let cName = document.querySelector(".name");
    let cList = document.querySelector(".creditCard ul li");
		let cYear = document.querySelector(".creditCard .year");
    let length = inputs.length;
    let regExp =[/^[A-Za-z\'\s\.\,]+$/,/^4[0-9]{12}(?:[0-9]{3})?$/,/^[0-9]{3,4}$/];
    //focusing the text->function
    let fieldColor = (i) => {
        for (j=0; j<inputCon.length; j++){
            if( i == j) {
                inputCon[i].style.color = "rgb(64,146,181)";
            }
            else {
                inputCon[j].style.color = "rgb(193,193,193)";
            }
        }
    }
   let checkInput = (i) => {
       // Name
       if( i == 0) {
            if (inputs[0].value.match(regExp[0])) {
                cName.innerText = inputs[0].value;
                inputCon[0].style.color = "rgb(64,146,181)";
                inputs[0].style.borderBottomColor = "rgb(64,146,181)";
            }
            else if (inputs[0].value == "" || !inputs[0].value.match(regExp[0] )) {
                cName.innerText = "";
                inputs[0].style.borderBottomColor = "red";
            }
       }

       //CCard NUmber
       if ( i == 1) {
            if(inputs[1].value == "") {
                inputs[1].style.borderBottomColor = "red";
							  cList.innerText = " ";
            }
            else{
                let cNumber = inputs[1].value;
                    cNumber = cNumber.replace(/\s/g, "");
                    if(Number(cNumber)) {
                        cNumber = cNumber.match(/.{1,4}/g);
                        cNumber = cNumber.join(" ");
                        inputs[1].value = cNumber;
                        if(cNumber.length <= 0 ) {
                            cList.innerText = "";
                        }
                        else if (cNumber.length > 19) {
                            cList.innerText = cNumber.substring(0,20);
						    inputs[1].style.borderBottomColor = "red";
                            
                        }
                        else {
                            cList.innerText = cNumber;
						    inputs[1].style.borderBottomColor = "rgb(64,146,181)";
                        }
                    }
                    else  {
                 	    inputs[1].style.borderBottomColor = "red";
                    }
            }
       }
       // card Date
       else if ( i == 2) {
           let dateValue = inputs[2].value;
				   let d = dateValue.replace(/\s/g, "");
           // making sure its a number 
           if(Number(dateValue)) {
               d = dateValue.split("").map((i) => {
                return parseInt(i, 10);
                }   
               );
               let date = new Date();
               let twoDigitYear = parseInt(date.getFullYear().toString().substr(2), 10);
						 //the first two digit in the month field
						if(d.length == 2 ) {
							 //checking for first
							 if((d[0] == 0 && (d[1] !== 0 || d[1] <= 9))  || d[0] == 1 && (d[1] <= 2)) {
								 		inputs[2].style.borderBottomColor = "rgb(64,146,181)";
										cYear.innerText = dateValue + "/";
									}
							else {
								inputs[2].style.borderBottomColor = "red";
							
							}
						 }//End of Month
							else if(d.length == 4) {
							 let twoDigitYearN = parseInt(d[2].toString().concat(d[3].toString()),10);
							 if(twoDigitYearN > twoDigitYear) {
								 let stringDigit = twoDigitYearN.toString();
								 cYear.innerText +=  stringDigit;
								 inputs[2].value = cYear.innerText;
								 inputs[2].style.borderBottomColor = "rgb(64,146,181)";
							 	}
								else {
									inputs[2].style.borderBottomColor = "red";
								}
							}//End of date + full date
           }//END of IF for [i = 2]
        	else {
						    cYear.innerText = "";
								inputs[2].style.borderBottomColor = "red";
					}
       }
		 
		 if(i == 3) {
			 let cV = inputs[i].value;
			 if(Number(cV) && cV.match(regExp[2])) {
				 inputs[i].style.borderBottomColor = "rgb(64,146,181)";
			 }
			 else{
				 inputs[3].style.borderBottomColor = "red";
			 }
		 }
    }
    //setting value initially in the card to that of placeholder
    cName.innerText = inputs[0].getAttribute('placeholder');
    cList.innerText = inputs[1].getAttribute('placeholder');
    cYear.innerText = inputs[2].getAttribute('placeholder') //Adding Event Listeners
    for (i = 0; i < inputCon.length; i++){
        inputs[i].addEventListener('click', fieldColor.bind(this, i));
        inputs[i].addEventListener('input', checkInput.bind(this,i));
    }
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        for(i=0; i < length; i++){
            if(inputs[i].value == "") {
                inputs[i].style.borderBottomColor = "red";
            }
        }
        if(cList.innerText.length < 16) {
            inputs[1].style.borderBottomColor = "red";
        }
    })
});
</script>

<style>
#loader{
  zoom:2;/* Increase this for a bigger symbole*/
  
  display:block;
  
  width:25px;
  height:20px;
  
  margin:20px auto;
  
  animation: wait .80s steps(1, start) infinite;
  
  background: linear-gradient(0deg, #f4f5fa 1px, transparent 0, transparent 8px, #f4f5fa 8px),   /* 6  */
              linear-gradient(90deg, #f4f5fa 1px, #f6f9fb 0, #f6f9fb 3px, #f4f5fa 3px),
    
              linear-gradient(0deg, #ececf5 1px, transparent 0, transparent 8px, #ececf5 8px),   /* 5  */
              linear-gradient(90deg, #ececf5 1px, #f2f3f9 0, #f2f3f9 3px, #ececf5 3px),
    
              linear-gradient(0deg, #e7eaf4 1px, transparent 0, transparent 8px, #e7eaf4 8px),   /* 4  */
              linear-gradient(90deg, #e7eaf4 1px, #eef1f8 0, #eef1f8 3px, #e7eaf4 3px),
    
              linear-gradient(0deg, #b9bedd 1px, transparent 0, transparent 10px, #b9bedd 10px), /* 3  */
              linear-gradient(90deg, #b9bedd 1px, #d0d5e8 0, #d0d5e8 3px, #b9bedd 3px),
              
              linear-gradient(0deg, #9fa6d2 1px, transparent 0, transparent 15px, #9fa6d2 15px), /* 2  */
              linear-gradient(90deg, #9fa6d2 1px, #c0c5e1 0, #c0c5e1 3px, #9fa6d2 3px),
              
              linear-gradient(0deg, #8490c6 1px, transparent 0, transparent 15px, #8490c6 15px), /* 1  */
              linear-gradient(90deg, #8490c6 1px, #aeb5da 0, #aeb5da 3px, #8490c6 3px);  
  
  background-repeat: no-repeat;
  
  background-size: 4px 9px,   /* 6 */
                   4px 9px,
    
                   4px 9px,   /* 5 */
                   4px 9px,
    
                   4px 9px,   /* 4 */
                   4px 9px,
    
                   4px 11px,  /* 3 */
                   4px 11px,
    
                   4px 16px,  /* 2 */
                   4px 16px,
    
                   4px 16px,  /* 1 */
                   4px 16px;
  
  background-position:-4px 3px, -4px 3px, -4px 3px, -4px 3px, -4px 3px, -4px 3px, -4px 2px, -4px 2px, -4px 0, -4px 0, -4px 0, -4px 0;
    
  /****** card *****/
}

@keyframes wait{
  12.5%{
    background-position:   -4px,  /* 6 */
                           -4px,
      
                           -4px,  /* 5 */
                           -4px,
                   
                           -4px,  /* 4 */
                           -4px,
                           
                           -4px,  /* 3 */
                           -4px,
      
                           -4px,  /* 2 */
                           -4px,
      
                              0 ,  /* 1 */
                              0 ;
  }
  25%{
    background-position: -4px,  /* 6 */
                           -4px,
      
                           -4px,  /* 5 */
                           -4px,
                   
                           -4px,  /* 4 */
                           -4px,
                           
                           -4px,  /* 3 */
                           -4px,
      
                              0,  /* 2 */
                              0,
      
                            6px,  /* 1 */
                            6px;
  }
  37.5%{
    background-position: -4px,  /* 6 */
                           -4px,
      
                           -4px,  /* 5 */
                           -4px,
                   
                           -4px,  /* 4 */
                           -4px,
                           
                               0,  /* 3 */
                               0,
      
                             6px,  /* 2 */
                             6px,
      
                            12px,  /* 1 */
                            12px;
  }
  50%{
    background-position: -4px,  /* 6 */
                           -4px,
      
                           -4px,  /* 5 */
                           -4px,
                   
                               0,  /* 4 */
                               0,
                           
                             6px,  /* 3 */
                             6px,
      
                            12px,  /* 2 */
                            12px,
      
                            -4px,  /* 1 */
                            -4px;
  }
  62.5%{
    background-position: -4px,  /* 6 */
                           -4px,
      
                               0,  /* 5 */
                               0,
                   
                             6px,  /* 4 */
                             6px,
                           
                            12px,  /* 3 */
                            12px,
      
                            -4px,  /* 2 */
                            -4px,
      
                            -4px,  /* 1 */
                            -4px;
  }
  75%{
    background-position:     0,  /* 6 */
                               0,
      
                             6px,  /* 5 */
                             6px,
                   
                            12px,  /* 4 */
                            12px,
                           
                            -4px,  /* 3 */
                            -4px,
      
                            -4px,  /* 2 */
                            -4px,
      
                            -4px,  /* 1 */
                            -4px;
  }
  87.5%{
    background-position:   6px,  /* 6 */
                             6px,
      
                            12px,  /* 5 */
                            12px,
                   
                            -4px,  /* 4 */
                            -4px,
                           
                            -4px,  /* 3 */
                            -4px,
      
                            -4px,  /* 2 */
                            -4px,
      
                            -4px,  /* 1 */
                            -4px;
  }
  100%{
    background-position:    12px,  /* 6 */
                            12px,
      
                            -4px,  /* 5 */
                            -4px,
                   
                            -4px,  /* 4 */
                            -4px,
                           
                            -4px,  /* 3 */
                            -4px,
      
                            -4px,  /* 2 */
                            -4px,
      
                            -4px,  /* 1 */
                            -4px;
  }
}


/* Boring body Style */

.wrapper{
  text-align:center;
}




/*** card ***/
.gridContainer {
  position: absolute;
  left: 50%;
	top: 50%;
	transform: translate(-50%,-50%);
  height: 420px;
  width: 670px;
  min-width: 0;
  min-height: 0;
  background: whitesmoke;
  -webkit-box-shadow: 0px 10px 200px 1px #c2c2c2;
  box-shadow: 0px 10px 200px 1px #c2c2c2;
  display: grid;
  grid-template: auto 1fr/repeat(4, 1fr);
  grid-template-areas: "link link link link"
 "card card form form";
}

.gridContainer .topLinks {
  grid-area: link;
  list-style-type: none;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  -webkit-box-shadow: 0px 1.5px 1px #eaeaea;
  box-shadow: 0px 1.5px 1px #eaeaea;
}

.gridContainer .topLinks li {
  display: block;
  padding: 14px 0px;
  text-transform: uppercase;
  font-size: .58rem;
  justify-self: center;
  letter-spacing: .7px;
  font-weight: 600;
  color: #acc8d5;
}

.gridContainer .topLinks li:last-child {
  color: #c1c1c1;
}

.gridContainer .topLinks li:nth-child(3) {
  position: relative;
  color: #4092b5;
}

.gridContainer .topLinks li:nth-child(3):after {
  position: absolute;
  content: " ";
  bottom: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background: #4092b5;
  border-radius: 2px;
}

.creditCard {
  grid-area: card;
  width: 260px;
  height: 161px;
  min-width: 0;
  min-height: 0;
  color: #fff;
  background: -webkit-gradient(linear, left top, right top, color-stop(60%, #4092b5), color-stop(90%, #3580aa));
  background: -webkit-linear-gradient(left, #4092b5 60%, #3580aa 90%);
  background: -o-linear-gradient(left, #4092b5 60%, #3580aa 90%);
  background: linear-gradient(to right, #4092b5 60%, #3580aa 90%);
  margin-top: 82px;
  border-radius: 8px;
  justify-self: right;
  align-self: start;
  display: grid;
  justify-items: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  grid-template: repeat(4, 1fr)/19px repeat(4, 1fr) 19px;
  grid-template-areas: ". . . visa visa ."
 ". chip . visa visa . "
 ". no no no no ."
 ". name name name year .";
}

.creditCard .creditCatd > * {
  overflow: hidden;
}

.creditCard .visaLogo {
  grid-area: visa;
  overflow: hidden;
  justify-self: right;
}

.creditCard .visaLogo svg {
  height: 42px;
}

.creditCard .chipLogo {
  grid-area: chip;
  overflow: hidden;
  width: 38px;
  height: 30px;
  justify-self: left;
  margin-top: 10px;
}

.creditCard ul {
  grid-area: no;
  list-style-type: none;
  justify-self: stretch;
  display: grid;
  grid-template: 1fr/repeat(1, 1fr);
}

.creditCard ul li {
  display: inline-block;
  font-size: 18px;
  letter-spacing: 2px;
  text-align: left;
  font-family: "Roboto", sans-serif;
  font-weight: 100;
  text-shadow: 0px 0px 2px rgba(0, 0, 0, 0.6);
  word-spacing: 3.7px;
}

.creditCard .name {
  grid-area: name;
  justify-self: left;
  font-family: "Roboto Condensed", sans-serif;
  font-size: 12.8px;
  font-weight: lighter;
  text-transform: uppercase;
  letter-spacing: 1.3px;
  padding-bottom: 5px;
  font-weight: 300;
  text-shadow: 0px 0px 2px rgba(0, 0, 0, 0.6);
}

.creditCard .year {
  grid-area: year;
  justify-self: right;
  font-size: 14px;
  font-weight: lighter;
  font-family: "Roboto Condensed", sans-serif;
  text-transform: uppercase;
  letter-spacing: 2.4px;
  padding-bottom: 5px;
  font-weight: 300;
  text-shadow: 0px 0px 2px rgba(0, 0, 0, 0.6);
}

.previousStep {
  position: absolute;
  bottom: 70px;
  height: 20px;
  width: 110px;
  color: #4092b5;
  left: 65px;
  cursor: pointer;
}

.previousStep p {
  margin-top: -16px;
  margin-left: 40px;
  font-size: 10px;
  text-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1);
  font-family: "Roboto", sans-serif;
  font-weight: 600;
  letter-spacing: .5px;
  cursor: pointer;
}

.previousStep .arrow {
  height: 20px;
  width: 30px;
}

.previousStep .arrow svg {
  height: 100%;
  width: 100%;
  -webkit-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  transform: rotate(180deg);
  fill: #3580aa;
}

form {
  margin: 0;
  padding: 0;
  grid-area: form;
  overflow: visible;
  width: 200px;
  min-height: 0;
  min-width: 0;
  display: grid;
  justify-self: center;
  grid-template: 45px repeat(5, 1fr) 55px/repeat(2, 1fr);
  grid-template-areas: ". ."
 "fheading fheading"
 "fname fname"
 "fcno fcno"
 "fyear fcvv"
 "btn btn"
 ". .";
}

form input {
  position: relative;
  margin-top: -12px;
  border: 0;
  border-bottom: 1px solid #ddd;
  height: 38px;
  padding: 7px 0 0 0;
  font-size: 15px;
  background: none;
  width: 100%;
  outline: none;
  color: #000;
}

form input:focus {
  border-bottom: 1.5px solid #9ad0dd;
}

form input:focus + h6 {
  color: red;
}

h6 {
  grid-area: fheading;
  font-size: 20px;
}

.inputCon {
  min-width: 0;
  min-height: 0;
  position: relative;
  color: #c1c1c1;
}

.inputCon:after {
  position: absolute;
  content: attr(data-top);
  top: -16px;
  left: 0;
  height: 10px;
  font-size: 10.4px;
  letter-spacing: .5px;
}

#name {
  grid-area: fname;
}

#cardNum {
  grid-area: fcno;
}

#validYear {
  grid-area: fyear;
  margin-right: 13px;
}

#cvv {
  grid-area: fcvv;
  margin-left: 13px;
}

button {
  margin-top: 10px;
  grid-area: btn;
  height: 36px;
  width: 198px;
  background: -webkit-gradient(linear, left top, right top, color-stop(60%, #3580aa), color-stop(90%, #4092b5));
  background: -webkit-linear-gradient(left, #3580aa 60%, #4092b5 90%);
  background: -o-linear-gradient(left, #3580aa 60%, #4092b5 90%);
  background: linear-gradient(to right, #3580aa 60%, #4092b5 90%);
  border-radius: 5px;
  border: none !important;
  text-transform: uppercase;
  letter-spacing: .5px;
  font-size: 13.5px;
  color: #acccdd;
  cursor: pointer;
  -webkit-transition: all 1s ease-out;
  -o-transition: all 1s ease-out;
  transition: all 1s ease-out;
}

button:focus {
  outline: none;
}

button span {
  margin-left: 3px;
  font-weight: bold;
  letter-spacing: .5px;
  color: #fff;
}
</style>