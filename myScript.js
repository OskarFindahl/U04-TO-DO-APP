



//check if status or delete buttons are pressed
var statusBtns = document.querySelectorAll('.status');
var deleteBtns = document.querySelectorAll('.delete');
var updateBtns = document.querySelectorAll('.update');


  statusBtns.forEach(item => {
    item.addEventListener('click',event => {
    document.myform.submit();
    })
  })

  deleteBtns.forEach(item => {
    item.addEventListener('click',event => {
    document.myform.submit();
    })
  })




//Editing list items 
  updateBtns.forEach(item => {
    item.addEventListener('click',event => {
      
      let newForm = document.createElement('form');
      newForm.setAttribute('name','editForm');
      newForm.setAttribute('class','editForm');
      newForm.setAttribute('method','POST');
      newForm.setAttribute('action','todo-edit.php');

      let titleEdit = document.createElement('input');
        titleEdit.setAttribute('type','text');
        titleEdit.setAttribute('name',item.value);
        titleEdit.setAttribute('class','title');
        titleEdit.setAttribute('placeholder','Title input');
        titleEdit.required=true;

     let descriptionEdit = document.createElement('input');
        descriptionEdit.setAttribute('type','text');
        descriptionEdit.setAttribute('name','description');
        descriptionEdit.setAttribute('class','description');
        descriptionEdit.setAttribute('placeholder','description input');
        descriptionEdit.required=true;

    let submitButton = document.createElement('button');
        submitButton.setAttribute('class','submitButton');
        submitButton.innerHTML = "Submit";

        var form = item.parentNode; 
        form.children[0].style.display = "none";
        form.children[1].style.display = "none";
        form.children[2].style.display = "none";
        form.children[3].style.display = "none";
        form.children[4].style.display = "none";

        

        form.insertBefore(newForm, item);
  
        form.appendChild(titleEdit);

        newForm.appendChild(titleEdit);
        newForm.appendChild(descriptionEdit);
        newForm.appendChild(submitButton);

       
        submitButton.addEventListener('click', event => {
          setTimeout(function() {
          document.myform.submit();
          document.querySelector('.editForm');
        }, 1500);
        
        
        })
        
    })
  })



//Check press of "all done" button to change all task status 
let selectAllBtn = document.querySelector('.selectAll');
selectAllBtn.addEventListener('click', event => {
        let statusBtns = document.querySelectorAll('.status');
        statusBtns.forEach(item => {
          
          item.checked = true;
          document.myform.submit();

        });
      });


//Check press of "delete done tasks" and delete them
let deleteAllDoneBtn = document.querySelector('.deleteAllDone');
deleteAllDoneBtn.addEventListener('click', event => {
        let deleteBtns = document.querySelectorAll('.delete');
        deleteBtns.forEach(item => {
          
          if(item.previousSibling.checked === true){
          item.checked = true;
          
          }
         document.myform.submit();

        });
      });




