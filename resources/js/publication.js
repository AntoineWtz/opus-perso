require('./bootstrap');
require('jquery');
require('select2');
import Dropzone from 'dropzone';
window.Dropzone = Dropzone;
import $ from 'jquery';
import 'select2';
    
    $('.js-example-basic-single').select2();
    $('.js-example-basic-multiple').select2();
    

document.addEventListener('DOMContentLoaded', function() {



//variable new genre musicaux
const newGenreMusicauxbtn = document.getElementById('new-genre-musicaux-btn');
const btnAnnulerGenreMusicaux = document.getElementById('annulerbtn');
//btn new genre musicaux
newGenreMusicauxbtn.addEventListener('click' , function(){
document.querySelector('div .modalgenremusical').classList.remove('hidden'); 
});
//btn annuler Genre musicaux
btnAnnulerGenreMusicaux.addEventListener('click' , function(){
document.querySelector('div .modalgenremusical').classList.add('hidden');
});























//variable new galerie
const newGaleriebtn = document.getElementById('new-galerie1-btn');
const btnAnnulerGalerie = document.getElementById('annuler-galerie1-btn');
// btn new galerie
newGaleriebtn.addEventListener('click' , function(){
document.querySelector('div .modalGalerie').classList.remove('hidden');
});
// btn annuler galerie
btnAnnulerGalerie.addEventListener('click' , function(){
document.querySelector('div .modalGalerie').classList.add('hidden');
});
//variable new galerie 2
const newGaleriebtn2 = document.getElementById('new-galerie2-btn');
const btnAnnulerGalerie2 = document.getElementById('annuler-galerie2-btn');
// btn new galerie 2
newGaleriebtn2.addEventListener('click' , function(){
document.querySelector('div .modalGalerie2').classList.remove('hidden');
    });
// btn annuler gaelerie 2
btnAnnulerGalerie2.addEventListener('click' , function(){
    document.querySelector('div .modalGalerie2').classList.add('hidden');
    });




//variable new lieux
const newLieuxbtn = document.getElementById('new-lieux-btn');
const btnAnnulerLieux = document.getElementById('annuler-lieux-btn');
//btn new lieux
newLieuxbtn.addEventListener('click' , function(){
document.querySelector('div .modalLieux').classList.remove('hidden');
});
//btn annuler lieux
btnAnnulerLieux.addEventListener('click' , function(){
document.querySelector('div .modalLieux').classList.add('hidden');
});



const myDropzone = document.querySelector("#myDropzone")
Dropzone.options.myDropzone = {
    paramName: "photo",
    acceptedFiles: ".jpeg,.jpg,.png",
    dictDefaultMessage: "Déposez vos fichiers ici ou cliquez pour les sélectionner",
    uploadMultiple: true,
}
const myDropzone2 = document.querySelector("#myDropzone2")
Dropzone.options.myDropzone2 = {
    paramName: "photo",
    acceptedFiles: ".jpeg,.jpg,.png",
    dictDefaultMessage: "Déposez vos fichiers ici ou cliquez pour les sélectionner",
    uploadMultiple: true,
}


});