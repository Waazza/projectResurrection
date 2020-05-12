window.onload = function(){


    let butDel = document.getElementsByClassName('delButton');
    console.log(butDel);
    for (let i of butDel){
        console.log(i);
        i.addEventListener('click', function(event){
            event.preventDefault();
            let divDel = document.getElementById('displayDel');
            let userId = i.dataset.id;
            console.log(userId);
            if(divDel.style.display === 'none'){
                divDel.style.display = 'block';
            }else if(divDel.style.display === 'block'){
                divDel.style.display = 'none';
            }
        });
    }
};

