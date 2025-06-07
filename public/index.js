//Comprobar si el array contiene un elemento con el mismo value
function contains(children, target){
    for(let i = 0; i < children.length ; i++){
        if(children[i].id === target){
            return true;
        }
    }
    return false;
}
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
    if(document.getElementById('tweets') && document.getElementById('main-container')){
        document.getElementById('tweets').style.maxHeight = document.getElementById('main-container').offsetHeight + 'px';
    }
    if(document.getElementById("back")){
        document.getElementById("back").addEventListener('click', ()=>{
            history.back();
        })
    }
    if(document.getElementById('tagdiv')){
        const children = document.getElementById("tagdiv").children;
        Array.from(children).forEach(element => {
           element.lastElementChild.addEventListener('click', () => {
               element.remove();
           })
        });

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
                tag.classList.add('rounded', 'bg-[grey]','p-2');
                tag.innerText = tagname;
                tag.id = tagid;
                const button = document.createElement('button');
                button.innerText = 'X';
                button.classList.add('buttonRed')
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
            if(document.getElementById('imagen').value !== ""){
                const image64 = await convertToBase64(document.getElementById('imagen').files[0]);
                document.getElementById("image").value = image64;
            }
            if(document.getElementById('tagdiv')){
                event.preventDefault();
                const children = document.getElementById('tagdiv').children;
                if(children.length > 0){
                    let str = "";
                    Array.from(children).forEach(child => {
                        const id=child.id;
                        str += `${id}-`;
                    })
                    document.getElementById('taginput').value = str;
                }
            }
            document.getElementById('formImage').submit();
        })
    }

    if(document.getElementById('dropdown')){
        document.getElementById('dropdown').addEventListener('mouseover', () => {
            document.getElementById('dropdown-user').classList.remove('hidden');
            document.getElementById('dropdown-user').classList.add('flex');
        });
        document.getElementById('dropdown').addEventListener('mouseleave', () => {
            document.getElementById('dropdown-user').classList.add('hidden');
            document.getElementById('dropdown-user').classList.remove('flex');
        });
    }
    if(document.getElementById('dropdownTeams')){
        document.getElementById('dropdownTeams').addEventListener('mouseover', () => {
            document.getElementById('dropdown-team').classList.remove('hidden');
            document.getElementById('dropdown-team').classList.add('flex');
        });
        document.getElementById('dropdownTeams').addEventListener('mouseleave', () => {
            document.getElementById('dropdown-team').classList.add('hidden');
            document.getElementById('dropdown-team').classList.remove('flex');
        });
    }
    document.querySelectorAll('.tweet').forEach(section => {
        section.addEventListener('click', () => {
            const tweetId = section.dataset.tweetId;
            const url = `https://x.com/PioPioEC/status/${tweetId}`;
            window.open(url, '_blank');
        });
    });
})
