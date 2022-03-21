document.addEventListener('DOMContentLoaded',()=>{
    iniciarApp();
});

function iniciarApp(){
    boton();
}


function boton(){
    const boton = document.querySelector('.boton');
    boton.onclick = selecionar;
    
} 

function selecionar(){
    const texto = document.querySelector('#texto');
    const tiempo = document.querySelector('#tiempo');
    const text = document.querySelector('#text');
    
    if(tiempo.value !== ''){
        if (texto.value !== '') {
           text.textContent = separador(parseInt(tiempo.value),texto.value);
        }
        else{
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El texto no debe estar vacio'
              });
        }
    }else{

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'El tiempo no debe estar vacio'
          });
    }

}




function separador(minu, text)
{

    let result = text;
    for (let i=0; i <= minu; i++){ 
        
        for (let n=0; n <= 59; n++) { 
            if(text.search(`0${i}:${n}`) || text.search(`${i}:0${n}`) || text.search(`0${i}:0${n}`) || text.search(`${i}:${n}`)){
                
                if(n <=9 && i> 9){
                    result = result.replace(`${i}:0${n}`,' ');
                }
                else if(i <= 9 && n> 9){
                    result = result.replace(`0${i}:${n}`,' ');
                }
                else if(i > 9 && n > 9) {
                    result = result.replace(`${i}:${n}`,' ');
                }else{
                    result = result.replace(`0${i}:0${n}`,' ');
                }
                
            }
        }
    }
    return result;
}

