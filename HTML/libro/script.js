for (const el of document.querySelectorAll('.tagin')) {
          tagin(el)
        }

function cloneRow() {
      var row = document.getElementById("rowToClone"); // find row to copy
      var table = document.getElementById("tableToModify"); // find table to append to
      var clone = row.cloneNode(true); // copy children too
      var rowCount = $("#Table_id tr").length;
      console.log(rowCount);
     //debito
      clone.firstChild.nextElementSibling.firstChild.id = "debito" + rowCount;
      clone.firstChild.nextElementSibling.firstChild.value =0;
      clone.firstChild.nextElementSibling.firstChild.attributes.onchange.nodeValue =
        "changeDebito(" + rowCount + ")";
     clone.firstChild.nextElementSibling.firstChild.readOnly = false;



      clone.firstChild.nextElementSibling.nextSibling.nextElementSibling.firstChild.id =
        "credito" + rowCount;
        clone.firstChild.nextElementSibling.nextSibling.nextElementSibling.firstChild.readOnly = false;
        clone.firstChild.nextElementSibling.nextSibling.nextElementSibling.firstChild.value=0;
       clone.firstChild.nextElementSibling.nextSibling.nextElementSibling.firstChild.attributes.onchange.nodeValue ="changeCredito(" + rowCount + ")";

      clone.firstChild.nextElementSibling.nextSibling.nextElementSibling.nextSibling.nextElementSibling.firstChild.firstChild.nextElementSibling.nextElementSibling.id =
        "cuentas" + rowCount;

      //cambiar evento onchage 
      clone.firstChild.nextElementSibling.nextSibling.nextElementSibling.nextSibling.nextElementSibling.firstChild.firstChild.nextElementSibling.nextElementSibling.attributes.onchange.nodeValue =
        "changeSelect(" + rowCount + ")";
       
      debito = clone.firstChild.nextElementSibling.firstChild.disabled=false;
      credito=clone.firstChild.nextElementSibling.nextSibling.nextElementSibling.disabled=false;
      clone.id = "newID"; // change id or other attributes/contents
      table.appendChild(clone); // add new row to end of table
    }