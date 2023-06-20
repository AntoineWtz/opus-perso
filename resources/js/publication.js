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



  //variable new artiste
  
  let CountArtiste = 1;
   window.ajouterArtiste = function() {
      if (CountArtiste >= 5) {
          return alert("Limite d'artiste atteinte (maximun 4)");
      } else {
          const divformArtiste = document.querySelector("#content");
          divformArtiste.innerHTML += `
  
        <div class='flex flex-wrap w-full' id="${CountArtiste}" >
        <h2 class='font-bold'> Artiste ${CountArtiste} </h2>
  
        <div class="block w-full">
        <h2 class='font-bold'>Photo de profil de l'artiste ${CountArtiste} </h2>
        <input class=" rounded border-gray-200 dropzone p-4 border-2 border-dashed border-gray-400"
        id="myDropzone2" type="file" name="photoArtiste[]" placeholder="Saisir des images">
        </div>
  
        <div class="block w-full">
        <h2 class='font-bold'>Nom de l'artiste ${CountArtiste}</h2>
        <input class=" rounded  border-gray-200" type="text" name="nomArtiste[]" placeholder="nom">
        </div>
  
        <div class="block w-full">
        <h2 class='font-bold '>Descriptif de l'artiste ${CountArtiste}</h2>
        <textarea class="w-2/4 rounded  border-gray-200" type="text" name="descriptifArtiste[]"
            placeholder="discriptif"></textarea>
        </div>
  
        <div class="block w-2/4">   
        <h2 class='font-bold'>lien vers Facebook artiste ${CountArtiste} </h2>
        <input class="full rounded  border-gray-200" type="text" name="=facebook[]"
            placeholder="lien facebook">
        </div>
  
        <div class="block w-2/4">    
        <h2 class='font-bold'>lien vers Youtube artiset ${CountArtiste}</h2>
        <input class="full rounded  border-gray-200" type="text" name="=youtube[]"
            placeholder="lien Youtube">
        </div>
  
        <div class="block w-2/4">    
        <h2 class='font-bold'>lien vers Twitter artiste ${CountArtiste}</h2>
        <input class=" rounded  border-gray-200" type="text" name="=twitter[]"
            placeholder="lien Twitter">
        </div>
  
        <div class="block w-2/4">    
        <h2 class='font-bold'>lien vers Instagram ${CountArtiste}</h2>
        <input class=" rounded  border-gray-200" type="text" name="=instagram[]"
            placeholder="lien Instagram">
        </div>
        <button type="button" onclick="ajouterArtiste()">New</button>
        <button type="button" onclick="annulerArtiste( ${CountArtiste})">Annuler</button>
        </div> 
        `;
          CountArtiste++;
      }
  }
  window.annulerArtiste = function(id){
      const artisteElement = document.getElementById(`${id}`);
      if(artisteElement){
         artisteElement.remove();
         CountArtiste--;
      }
  }
  
 
 
 

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
    // btn annuler gaelerie 2
    btnAnnulerGalerie2.addEventListener("click", function () {
        document.querySelector("div .modalGalerie2").classList.add("hidden");
    });

    //variable new lieux
    const newLieuxbtn = document.getElementById("new-lieux-btn");
    const btnAnnulerLieux = document.getElementById("annuler-lieux-btn");
    //btn new lieux
    newLieuxbtn.addEventListener("click", function () {
        document.querySelector("div .modalLieux").classList.remove("hidden");
    });
    //btn annuler lieux
    btnAnnulerLieux.addEventListener("click", function () {
        document.querySelector("div .modalLieux").classList.add("hidden");
    });

    const myDropzone = document.querySelector("#myDropzone");
    Dropzone.options.myDropzone = {
        paramName: "photo",
        acceptedFiles: ".jpeg,.jpg,.png",
        dictDefaultMessage:
            "Déposez vos fichiers ici ou cliquez pour les sélectionner",
        uploadMultiple: true,
    };
    const myDropzone2 = document.querySelector("#myDropzone2");
    Dropzone.options.myDropzone2 = {
        paramName: "photo",
        acceptedFiles: ".jpeg,.jpg,.png",
        dictDefaultMessage:
            "Déposez vos fichiers ici ou cliquez pour les sélectionner",
    };
});

