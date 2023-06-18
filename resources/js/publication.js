require('./bootstrap');


document.addEventListener('DOMContentLoaded', function() {



//variable new genre musicaux
var newGenreMusicauxbtn = document.getElementById('new-genre-musicaux-btn');
var btnAnnulerGenreMusicaux = document.getElementById('annulerbtn');
//btn new genre musicaux
newGenreMusicauxbtn.addEventListener('click' , function(){
document.querySelector('div .modalgenremusical').classList.remove('hidden'); 
});
//btn annuler Genre musicaux
btnAnnulerGenreMusicaux.addEventListener('click' , function(){
document.querySelector('div .modalgenremusical').classList.add('hidden');
});


//variable new galerie
var newGaleriebtn = document.getElementById('new-galerie1-btn');
var btnAnnulerGalerie = document.getElementById('annuler-galerie-btn');
// btn new galerie
newGaleriebtn.addEventListener('click' , function(){
document.querySelector('div .modalGalerie').classList.remove('hidden');
});
// btn annuler galerie
btnAnnulerGalerie.addEventListener('click' , function(){
document.querySelector('div .modalGalerie').classList.add('hidden');
});

//variable new lieux
var newLieuxbtn = document.getElementById('new-lieux-btn');
var btnAnnulerLieux = document.getElementById('annuler-lieux-btn');
//btn new lieux
newLieuxbtn.addEventListener('click' , function(){
document.querySelector('div .modalLieux').classList.remove('hidden');
});
//btn annuler lieux
btnAnnulerLieux.addEventListener('click' , function(){
document.querySelector('div .modalLieux').classList.add('hidden');
});



});