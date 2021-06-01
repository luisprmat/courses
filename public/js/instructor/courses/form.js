document.getElementById('title').addEventListener('keyup', slugChange)

function slugChange() {
    title = document.getElementById('title').value
    document.getElementById('slug').value = slugify(title, { lower: true, strict: true, locale: "{{ app()->getLocale() }}" })
}

// CKEditor
ClassicEditor.create(document.getElementById('description'), {
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
    heading: {
        options: [
            { model: 'paragraph', title: 'Párrafo', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Título 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Título 2', class: 'ck-heading_heading2' }
        ]
    }
})
.catch( error => {
    console.error( error );
});

// Change image
document.getElementById('file').addEventListener('change', changeImage)

function changeImage(e) {
    const file = e.target.files[0]
    const reader = new FileReader()
    reader.onload = e => {
        document.getElementById('picture').setAttribute('src', e.target.result)
    }

    reader.readAsDataURL(file)
}
