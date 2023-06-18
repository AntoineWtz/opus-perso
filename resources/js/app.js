require('./bootstrap');





//Fonction open Modal Search
document.addEventListener('DOMContentLoaded', function() {
    const openModalButtons = document.querySelectorAll('.open-modal');
    const modal = document.getElementById('modal');
  
    openModalButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        modal.classList.remove('hidden');
      });
    });
    
//Fonction fermeture Modal Search
  //   const closeModalButton = document.getElementById('closeModal');
    
  //   closeModalButton.addEventListener('click', function() {
  //     modal.classList.add('hidden');
  //   });
   });

// Carrousel
