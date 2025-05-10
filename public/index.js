<<<<<<< HEAD
=======
function validateImage(foto){
    if((foto.files[0] === undefined || !/(.png|.jpg|.webp)$/i.test(foto.files[0].name)) && document.getElementById('image').value === ""){
        if(foto.nextElementSibling && foto.nextElementSibling.classList.contains('error')){
            foto.nextElementSibling.remove();
        }
        const error = document.createElement('small');
        error.innerText = "Solo se aceptan imagenes(.jpg, .png, .webp)";
        error.classList.add('error');
        foto.insertAdjacentElement('afterend', error);
        return false;
    }
    if(foto.nextElementSibling && foto.nextElementSibling.classList.contains('error')){
        foto.nextElementSibling.remove();
    }
    return true;
}
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
//Comprobar si el array contiene un elemento con el mismo value
function contains(children, target){
    for(let i = 0; i < children.length ; i++){
        if(children[i].id === target){
            return true;
        }
    }
    return false;
}
<<<<<<< HEAD
=======
function validateTitleAbstract(text){
    if(text.value.length <= 0 || text.value.length > 255){
        if(text.nextElementSibling && text.nextElementSibling.classList.contains('error')){
            text.nextElementSibling.remove();
        }
        const error = document.createElement('small');
        error.innerText = "No se puede dejar el campo vacío y debe tener máximo 255 caracteres";
        error.classList.add('error');
        text.insertAdjacentElement('afterend', error);
        return false;
    }
    if(text.nextElementSibling && text.nextElementSibling.classList.contains('error')){
        text.nextElementSibling.remove();
    }
    return true;
}
function limitarCaracteres(text){
    if(text.value.length > 255){
        if(text.nextElementSibling && text.nextElementSibling.classList.contains('error')){
            text.nextElementSibling.remove();
        }
        text.value.replace(/.$/,"");
        if(text.nextElementSibling && text.nextElementSibling.classList.contains('error')){
            text.nextElementSibling.remove();
        }
        const error = document.createElement('small');
        error.innerText = "Has llegado al máximo de caracteres";
        error.classList.add('error');
        text.insertAdjacentElement('afterend', error);
        return false;
    }
    if(text.nextElementSibling && text.nextElementSibling.classList.contains('error')){
        text.nextElementSibling.remove();
    }
    return true;
}
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
function convertToBase64(image){

    return new Promise((resolve) => {
        const reader= new FileReader();
        reader.addEventListener('load', (event) => {
            resolve(event.target.result);
        })
        reader.readAsDataURL(image)
    })
}
addEventListener('DOMContentLoaded', () => {
<<<<<<< HEAD

    if(document.getElementById('tagdiv')){
=======
    if(document.getElementById('tagdiv').children){
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
        const children = document.getElementById("tagdiv").children;
        Array.from(children).forEach(element => {
           element.lastElementChild.addEventListener('click', () => {
               element.remove();
           })
        });
<<<<<<< HEAD

    }
    if(document.getElementById('tags')){
        document.getElementById('tags').addEventListener('change', (event) => {
            const container = document.getElementById('tagdiv');
            const target = event.target;
            const children = Array.from(container.children);
            const taginfo = target.value.split('-');
            const tagid = taginfo[0];
            const tagname = taginfo[1];
            if(!contains(children, tagid) && target.value !== ""){

                const tag = document.createElement('p');
                tag.classList.add('tags');
                tag.innerText = tagname;
                tag.id = tagid;
                const button = document.createElement('button');
                button.innerText = 'X';
                button.addEventListener('click', () => {
                    button.parentElement.remove();
                })
                tag.insertAdjacentElement("beforeend", button)
                container.insertAdjacentElement('beforeend', tag);
            }
        });
    }
    if(document.getElementById('formImage')){
        const dropeo = document.getElementById("dropeo");
        dropeo.addEventListener('dragover', (event)=>{
            event.preventDefault();
            dropeo.classList.add("sombra")
        });
        dropeo.addEventListener('dragleave',()=>{
            dropeo.classList.remove('sombra');
        })
        dropeo.addEventListener('drop', (event) =>{
            event.preventDefault();
            dropeo.classList.remove("sombra");

            const file = event.dataTransfer.files[0];
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            document.getElementById('imagen').files = dataTransfer.files;
        });
        document.getElementById('formImage').addEventListener('submit', async (event) => {
            event.preventDefault();
            console.log(document.getElementById('imagen'))
            if(document.getElementById('imagen').value !== ""){
                const image64 = await convertToBase64(document.getElementById('imagen').files[0]);
                document.getElementById("image").value = image64;
            }
            document.getElementById('formImage').submit();
        })
    }
    if(document.getElementById('dropdown')){
        document.getElementById('dropdown').addEventListener('mouseover', () => {
            document.getElementById('dropdown-user').classList.remove('hidden');
            document.getElementById('dropdown-user').classList.add('flex');
        })
        document.getElementById('dropdown').addEventListener('mouseleave', () => {
            document.getElementById('dropdown-user').classList.add('hidden');
            document.getElementById('dropdown-user').classList.remove('flex');
        })
    }

=======
    }
    document.getElementById('formCreateNews').addEventListener('submit', async (event) => {
        event.preventDefault();
        validateTitleAbstract(document.getElementById('title'))
        validateTitleAbstract(document.getElementById('abstract'))
        if(validateImage(document.getElementById('imagen'))
            && validateTitleAbstract(document.getElementById('title'))
            && validateTitleAbstract(document.getElementById('abstract'))){
            try {
                Array.from(document.getElementById('tagdiv').children).forEach(element => {
                    document.getElementById('taginput').value += `${element.id.replace(/-.*$/, "")}-`;
                });
                if(document.getElementById('image').value === ""){
                    const image64 = await convertToBase64(document.getElementById('imagen').files[0]);
                    document.getElementById("image").value = image64;
                }
                document.getElementById('imagen').remove();
                document.getElementById('formCreateNews').submit();
            } catch (error) {
                console.error("Error al convertir la imagen:", error);
            }
        }
        return false;
    })
    document.getElementById('title').addEventListener('input', () => limitarCaracteres(document.getElementById('title')))
    document.getElementById('abstract').addEventListener('input', () => limitarCaracteres(document.getElementById('abstract')))
    document.getElementById('tags').addEventListener('change', (event) => {
        const container = document.getElementById('tagdiv');
        const target = event.target;
        const children = Array.from(container.children);
        const taginfo = target.value.split('-');
        const tagid = taginfo[0];
        const tagname = taginfo[1];
        if(!contains(children, tagid) && target.value !== ""){

            const tag = document.createElement('p');
            tag.classList.add('tags');
            tag.innerText = tagname;
            tag.id = tagid;
            const button = document.createElement('button');
            button.innerText = 'X';
            button.addEventListener('click', () => {
                button.parentElement.remove();
            })
            tag.insertAdjacentElement("beforeend", button)
            container.insertAdjacentElement('beforeend', tag);
        }
    });
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
})
