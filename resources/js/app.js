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
}).on('success', function (file, response) {
    console.log(response);
}
).on('removedfile', function (file) {
    console.log('file removed');
}
);