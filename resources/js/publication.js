require("./bootstrap");
require("jquery");
require("select2");
import Dropzone from "dropzone";
window.Dropzone = Dropzone;
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

    //variable new galerie
    const newGaleriebtn = document.getElementById("new-galerie1-btn");
    const btnAnnulerGalerie = document.getElementById("annuler-galerie1-btn");
    // btn new galerie
    newGaleriebtn.addEventListener("click", function () {
        document.querySelector("div .modalGalerie").classList.remove("hidden");
    });
    // btn annuler galerie
    btnAnnulerGalerie.addEventListener("click", function () {
        document.querySelector("div .modalGalerie").classList.add("hidden");
    });
    //variable new galerie 2
    const newGaleriebtn2 = document.getElementById("new-galerie2-btn");
    const btnAnnulerGalerie2 = document.getElementById("annuler-galerie2-btn");
    // btn new galerie 2
    newGaleriebtn2.addEventListener("click", function () {
        document.querySelector("div .modalGalerie2").classList.remove("hidden");
    });
    // btn annuler galerie 2
    btnAnnulerGalerie2.addEventListener("click", function () {
        document.querySelector("div .modalGalerie2").classList.add("hidden");
    });
    //variable new galerie 3
    const newGaleriebtn3 = document.getElementById("new-galerie3-btn");
    const btnAnnulerGalerie3 = document.getElementById("annuler-galerie3-btn");
    // btn new galerie 3
    newGaleriebtn3.addEventListener("click", function () {
        document.querySelector("div .modalGalerie3").classList.remove("hidden");
    });
    // btn annuler galerie 3
    btnAnnulerGalerie3.addEventListener("click", function () {
        document.querySelector("div .modalGalerie3").classList.add("hidden");
    });
    //variable new galerie 4
    const newGaleriebtn4 = document.getElementById("new-galerie4-btn");
    const btnAnnulerGalerie4 = document.getElementById("annuler-galerie4-btn");
    // btn new galerie 4
    newGaleriebtn4.addEventListener("click", function () {
        document.querySelector("div .modalGalerie4").classList.remove("hidden");
    });
    // btn annuler galerie 4
    btnAnnulerGalerie4.addEventListener("click", function () {
        document.querySelector("div .modalGalerie4").classList.add("hidden");
    });














    // variable art1 / btn new art1 / btn annuler art1
    const newArtiste1 = document.getElementById("newArtiste-1");
    const annulerArtiste1 = document.getElementById("annulerArtiste-1");
    newArtiste1.addEventListener("click", function () {
        document.querySelector("div .Artiste-1").classList.remove("hidden");
    });
    annulerArtiste1.addEventListener("click", function () {
        document.querySelector("div .Artiste-1").classList.add("hidden");
    });
    // variable art2 / btn new art2 / btn annuler art2
    const newArtiste2 = document.getElementById("newArtiste-2");
    const annulerArtiste2 = document.getElementById("annulerArtiste-2");
    newArtiste2.addEventListener("click", function () {
        document.querySelector("div .Artiste-2").classList.remove("hidden");
    });
    annulerArtiste2.addEventListener("click", function () {
        document.querySelector("div .Artiste-2").classList.add("hidden");
    });
    // variable art3 / btn new art3 / btn annuler art3
    const newArtiste3 = document.getElementById("newArtiste-3");
    const annulerArtiste3 = document.getElementById("annulerArtiste-3");
    newArtiste3.addEventListener("click", function () {
        document.querySelector("div .Artiste-3").classList.remove("hidden");
    });
    annulerArtiste3.addEventListener("click", function () {
        document.querySelector("div .Artiste-3").classList.add("hidden");
    });
    // variable art4 / btn new art4 / btn annuler art4
    const newArtiste4 = document.getElementById("newArtiste-4");
    const annulerArtiste4 = document.getElementById("annulerArtiste-4");
    newArtiste4.addEventListener("click", function () {
        document.querySelector("div .Artiste-4").classList.remove("hidden");
    });
    annulerArtiste4.addEventListener("click", function () {
        document.querySelector("div .Artiste-4").classList.add("hidden");
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










    const myDropzone = document.querySelectorAll("#myDropzone");
    Dropzone.options.myDropzone = {
        paramName: "photo",
        acceptedFiles: ".jpeg,.jpg,.png",
        dictDefaultMessage:
            "Déposez vos fichiers ici ou cliquez pour les sélectionner",
        uploadMultiple: true,
        init: function() {}
    };
    const myDropzone2 = document.querySelectorAll("#myDropzone2");
    Dropzone.options.myDropzone2 = {
        paramName: "photo",
        acceptedFiles: ".jpeg,.jpg,.png",
        dictDefaultMessage:
            "Déposez vos fichiers ici ou cliquez pour les sélectionner",
        init: function() {}
        };

    

});





window.validerFormulaire = function () {
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
    if(!document.querySelector('.Artiste-1').classList.contains('hidden')){

    }

    //vérif Galerie 1
    if(!document.querySelector('.modalGalerie').classList.contains('hidden')){
        var nom = document.getElementById('nomgalerie').value;
        var imgInput = document.querySelector('input[name="photoGalerie_0[]"]');
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
    //vérif Galerie 2
    if(!document.querySelector('.modalGalerie2').classList.contains('hidden')){
        var nom = document.getElementById('nomgalerie2').value;
        var imgInput = document.querySelector('input[name="photoGalerie_1[]"]');
        var img = imgInput.files;
        if(nom === '' || nom == null || img.length === 0){
            if (nom === '' || nom == null) {
                document.querySelector('.redng2').style.color= '#e53e3e'; 
                valid = false ;
            }
            if (img.length === 0) {
                document.querySelector('.redig2').style.color= '#e53e3e'; 
                valid = false ;
            }       
            valid = false ;
        }   
    }
    //vérif Galerie 3
    if(!document.querySelector('.modalGalerie3').classList.contains('hidden')){
        var nom = document.getElementById('nomgalerie3').value;
        var imgInput = document.querySelector('input[name="photoGalerie_2[]"]');
        var img = imgInput.files;
        if(nom === '' || nom == null || img.length === 0){
            if (nom === '' || nom == null) {
                document.querySelector('.redng3').style.color= '#e53e3e'; 
                valid = false ;
            }
            if (img.length === 0) {
                document.querySelector('.redig3').style.color= '#e53e3e'; 
                valid = false ;
            }
            
            valid = false ;
        }
    
    }
    //vérif Galerie 4
    if(!document.querySelector('.modalGalerie4').classList.contains('hidden')){
        var nom = document.getElementById('nomgalerie4').value;
        var imgInput = document.querySelector('input[name="photoGalerie_3[]"]');
        var img = imgInput.files;
        if(nom === '' || nom == null || img.length === 0){
            if (nom === '' || nom == null) {
                document.querySelector('.redng4').style.color= '#e53e3e'; 
                valid = false ;
            }
            if (img.length === 0) {
                document.querySelector('.redig4').style.color= '#e53e3e'; 
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