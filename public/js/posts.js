const files = document.querySelectorAll('.form-item__file')
files.forEach(function (el) {
    el.addEventListener('change', function (ev) {
        const input = ev.target
        const main = document.getElementById("mainImage")
        const images = document.querySelector('.post-images')
        const label = input.parentElement
        const text = label.querySelector('div')
        // text.innerHTML = ''
        if (input.files.length === 0) {
            text.innerHTML = 'Выберите файл'
            if(input.id ==='image'){
                main.setAttribute('src','/public/storage/images/template.jpg')
                main.setAttribute('title','Template')
                main.dataset.toggle=''
            }
            if(input.id ==='images'){
                images.innerHTML=''
            }
            return false;
        }
        for (let i =0,f; f=input.files[i];i++){
            if (!f.type.match('image.*')) {
                continue;
            }
            let reader = new FileReader();
            reader.onload=(function (file){
                return function (e){
                    if(input.id ==='image'){
                        main.setAttribute('src',e.target.result)
                        main.dataset.toggle='modal'
                        main.dataset.title=file.name
                        main.setAttribute('title',file.name)
                        // text.innerText +=file.name
                    } else{
                        let span = document.createElement('span');
                        span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', file.name, '" data-toggle="modal" ',
                            'data-title="',file.name,'"/>'].join('');
                        images.insertBefore(span, null);
                        // text.innerText +=file.name+'\n'
                    }
                }
            })(f)
            reader.readAsDataURL(f)
        }
    })
})

const modal = $modal()
document.addEventListener('click', function (e) {
    if (e.target.dataset.toggle === 'modal') {
        const img = e.target
        modal.setTitle(img.dataset.title)
        modal.setContent(`<img style="width: 100%;" src="${img.src}" title="${img.title}">`)
        modal.show();
    }
    if(e.target.id==='formDelete'){
        e.preventDefault()
        if(confirm('Вы действительно хотите удалить объявление?')){
            const formData = new FormData()
            formData.append('id',e.target.dataset.id)
            fetch('/api/posts/delete',{
                method: "POST",
                credentials: "same-origin",
                body: formData
            })
                .then(()=>location.reload())
        }
    }
})
