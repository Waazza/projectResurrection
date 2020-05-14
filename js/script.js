window.onload = function(){


    let butDel = document.getElementsByClassName('delButton');
    console.log(butDel);
    for (let i of butDel){
        console.log(i);
        i.addEventListener('click', function(e){
            e.preventDefault();
            let divDel = document.getElementById('displayDel');
            let userId = i.dataset.id;
            let str = userId.replace(/\s+/g, '');
            let linkMod = document.getElementById('linkMod');
            console.log(userId);
            if(divDel.style.display === 'none'){
                divDel.style.display = 'block';
                linkMod.href += '&user_id=' + str;
            }
        });
    }

    let butNo = document.getElementById('butNo');
    butNo.addEventListener('click', function(e){
        e.preventDefault();
        let divDel = document.getElementById('displayDel');
        let linkMod = document.getElementById('linkMod');
        if(divDel.style.display === 'block'){
            divDel.style.display = 'none';
        }
    });
};

