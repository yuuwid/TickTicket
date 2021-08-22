// togleshow password login
const pass = document.getElementById('password');
if (pass != null){
    const checkbox = document.getElementById('showpass');
    checkbox.addEventListener('click', function(){
        const status = pass.getAttribute('type');
        if( status == 'password' ){
            pass.setAttribute('type', 'text');
        } else if ( status == 'text' ){
            pass.setAttribute('type', 'password');
        }
    })
}

// togleshow password register
const passreg = document.getElementById('rpassword');
if (passreg != null){
    const passpassreg2 = document.getElementById('password2');
    const checkbox = document.getElementById('showpass');

    checkbox.addEventListener('click', function(){
        const status = passreg.getAttribute('type');

        if( status == 'password' ){
            passreg.setAttribute('type', 'text');
            passpassreg2.setAttribute('type', 'text');

        } else if ( status == 'text' ){
            passreg.setAttribute('type', 'password');
            passpassreg2.setAttribute('type', 'password');
        }
    })
}



// checkbox tiket pesawat
const checkPulang = document.getElementById('pulangcb');
if( checkPulang != null ){
    checkPulang.addEventListener('click', function(){
        const input = document.getElementById('tanggalPulang');
        if(input.getAttribute('readonly') == ''){
            input.removeAttribute('readonly');
        } else {
            input.setAttribute('readonly', '');
        }
        
    })
}


$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
