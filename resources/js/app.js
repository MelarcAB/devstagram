import Dropzone from 'dropzone';

import '../sass/app.scss';
import '../css/app.css';



Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Drop files here to upload',
    acceptedFiles: 'image/*',
    //   acceptedFiles: '.png',
    maxFilesize: 3,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        //verificar si hay una imagen que se haya subido previamente
        if (document.querySelector('[name="image"]').value.trim()) {
            const imagen_publicada = {}
            imagen_publicada.size = 1234
            imagen_publicada.name = document.querySelector('[name="image"]').value

            this.options.addedfile.call(this, imagen_publicada)
            this.options.thumbnail.call(this, imagen_publicada, `/uploads/${imagen_publicada.name}`)
            imagen_publicada.previewElement.classList.add('dz-success', 'dz-complete')
        }
    }
});

dropzone.on('success', function (file, response) {
    // console.log(response);
    document.querySelector('[name="image"]').value = response.image;
});

dropzone.on('error', function (file, response) {
    // console.log(response);
});

dropzone.on('removedfile', function (file) {
    // console.log(file);
});