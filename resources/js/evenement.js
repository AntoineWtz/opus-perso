require("./bootstrap");
require("jquery");
require("select2");
import $ from "jquery";
import "select2";

$(".js-example-basic-single").select2();
$(".js-example-basic-multiple").select2();
$(".js-example-basic-multiple2").select2();
$(".js-example-basic-multiple-art1").select2();

document.addEventListener("DOMContentLoaded", function () {
    //variable new genre musicaux
    const newGenreMusicauxbtn = document.getElementById(
        "new-genre-musicaux-btn"
    );
    const btnAnnulerGenreMusicaux = document.getElementById("annulerbtn");
    //btn new genre musicaux
    newGenreMusicauxbtn.addEventListener("click", function () {
        document
            .querySelector("div .modalgenremusical")
            .classList.remove("hidden");
    });
    //btn annuler Genre musicaux
    btnAnnulerGenreMusicaux.addEventListener("click", function () {
        document
            .querySelector("div .modalgenremusical")
            .classList.add("hidden");
    });

    
    //variable lieux/ btn new lieux / btn annuler lieux
    const newLieux = document.getElementById('newLieux');
    const annulerLieux =  document.getElementById('annulerLieux');
    newLieux.addEventListener('click' , function () {
        document.querySelector("div .modalLieux").classList.remove('hidden');
        document.querySelector("div .allLieux").classList.add('hidden');
    })
    annulerLieux.addEventListener('click' , function () {
        document.querySelector("div .modalLieux").classList.add('hidden');
        document.querySelector("div .allLieux").classList.remove('hidden');
    })


    //  const form = document.querySelector('.form');
    //  form.addEventListener('submit', function (e) {
    //      e.preventDefault();
    //  })

});





window.validerFormulaire = function (event) {
    let valid = true;
    const titre = document.getElementById('titre').value;
    const image_demo = document.getElementById('image-demo').value;
    const alt_imgdemo = document.getElementById('alt_img_demo').value;

    //verif titre
    if(titre === '' || titre == null){
        document.querySelector('.redtitre').style.color= '#e53e3e';    
        valid = false ;
    } 
    //vérif image aperçu
    if (image_demo === '' || image_demo == null) {
            
        document.querySelector('.redimg').style.color= '#e53e3e';  
        valid = false ;
    } 
    if (alt_imgdemo === '' || image_demo == null) {

        document.querySelector('.redalt').style.color= '#e53e3e';
        valid = false ;
    }
    //vérif lieux 
    if(!document.querySelector('.modalLieux').classList.contains('hidden') ){
        var nom = document.getElementById('nomLieux').value ;
        var adresse = document.getElementById('adresseLieux').value ;

        if(nom === '' || nom == null || adresse === '' || adresse == null){
            if (nom === '' || nom == null) {
                document.querySelector('.redlieux').style.color= '#e53e3e'; 
                valid = false ;
            }
            if (adresse === '' || adresse == null) {
                document.querySelector('.redadresse').style.color= '#e53e3e'; 
                valid = false ;
            }
            
            valid = false ;
        }
     }
    //vérif Artiste
    if (!document.querySelector('.Artiste-1').classList.contains('hidden')) {
        const artistesSelect = document.getElementById('artiste');
        const artistesSelectionnes = Array.from(artistesSelect.selectedOptions).map(option => option.value);
        if (artistesSelectionnes.length === 0) {
            document.querySelector('.redartiste').style.color = '#e53e3e';
            valid = false;
        }
    }
    

    //vérif Galerie 1
    if(!document.querySelector('.modalGalerie').classList.contains('hidden')){
        var nom = document.getElementById('nomgalerie').value;
        var imgInput = document.querySelector('input[name="photo[]"]');
        var img = imgInput.files;
        if(nom === '' || nom == null || img.length === 0){
            if (nom === '' || nom == null) {
                document.querySelector('.redng1').style.color= '#e53e3e'; 
                valid = false ;
            }
            if (img.length === 0) {
                document.querySelector('.redig1').style.color= '#e53e3e'; 
                valid = false ;
            }
            
            valid = false ;
        }
    
    }








     

    if(valid !== true){
        alert('Veuillez remplir les champs obligatoire !');
        return false;
    } else {
        return true;
    }
}