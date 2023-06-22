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













    const myDropzone = document.querySelector("#myDropzone");
    Dropzone.options.myDropzone = {
        paramName: "photo",
        acceptedFiles: ".jpeg,.jpg,.png",
        dictDefaultMessage:
            "Déposez vos fichiers ici ou cliquez pour les sélectionner",
        uploadMultiple: true,
        init: function() {}
    };
    const myDropzone2 = document.querySelector("#myDropzone2");
    Dropzone.options.myDropzone2 = {
        paramName: "photo",
        acceptedFiles: ".jpeg,.jpg,.png",
        dictDefaultMessage:
            "Déposez vos fichiers ici ou cliquez pour les sélectionner",
        init: function() {}
        };
});





window.validerFormulaire = function () {
     if(!document.querySelector('.modalLieux').classList.contains('hidden') ){
        var nom = document.getElementById('nomLieux').value ;
        var adresse = document.getElementById('adresseLieux').value ;

        if(nom === '' || nom === null || adresse === '' || adresse === null){
            if (nom === '' || nom === null) {
                document.querySelector('.nomLieux').classList.remove('border-gray-200');
                document.querySelector('.nomLieux').style.borderColor= '#e53e3e';
            }
            if (adresse === '' || adresse === null) {
                document.querySelector('.adresseLieux').classList.remove('border-gray-200');
                document.querySelector('.adresseLieux').style.borderColor= '#e53e3e';
                
            }
            alert('veuillez remplir les champs du nouveaux lieux ou l\'annuler');
            return false
        }

     }





    return true;
}