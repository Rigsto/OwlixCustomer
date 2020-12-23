function showNewAddressForm() {  
    var clickCounter = 0;

    clickCounter = clickCounter + 1;
   
    if (clickCounter == "2"){
        document.getElementById("detailAlamat").classList.remove('detailAlamatPenerimaHide');
        document.getElementById("detailAlamat").classList.add('detailAlamatPenerimaShow');          
        document.getElementById("alamatForm").classList.remove('addNewAddressFormShow');
        document.getElementById("alamatForm").classList.add('addNewAddressFormHide');
        clickCounter = 0;
    }
    else{
        console.log(clickCounter);
        document.getElementById("detailAlamat").classList.remove('detailAlamatPenerimaShow');          
        document.getElementById("detailAlamat").classList.add('detailAlamatPenerimaHide');
        document.getElementById("alamatForm").classList.add('addNewAddressFormShow');
        document.getElementById("alamatForm").classList.remove('addNewAddressFormHide');
    }
   }

   function copyCode(){
      /* Get the text field */
  var copyText = document.getElementById("kodeVA");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
  }