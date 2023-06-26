
<x-app-layout>

        <x-slot name="header">
            <h1 class='text-center text-4xl'>Publication</h1>
            <p class="text-center">Liste des Publications</p>
        </x-slot>
        <x-slot name="slot">
            
            {{-- Boutton Création --}}
            <!-- bouton nouvelle entrée -->
            <x-bouton.buttonNew routeName="GestionPublication" sectionName="Publication" />
            <?php 
                  ?>
                <table  class="table-auto w-full">
                    <tr class='text-left'>
                        <th class="w-8">titre</th>
                        <th class="w-6">Date Creation</th>
                        <th class="w-6">Date Mofication</th>
                        <th class="w-2">Statut</th>
                        <th class="w-2">Créateur</th>
                        <th class="w-1">Modifier</th>
                        <th class="w-1">Supprimer</th>
                      
                    </tr>
                @foreach ($publications as $publication)
                 <tr class='border-collapse text-left'>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->titre}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->created_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->updated_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->statut}}</td>                     
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->user->name}}</td>                     
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>
                        
                        <!-- modifier -->
                    @include('components.bouton.ButtonModifier', ['routeName' => 'GestionPublication', 'itemId' => $publication->id])
                    </td>

                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>
                    <!-- supprimer -->
                    <x-bouton.buttonSupprimer routeName="GestionPublication" itemId="{{ $publication->id }}" />
                          
                    </td>
      
                       
                    
                    
                 </tr>
                @endforeach
                 </table>

                 <script>
                    function confirmDelete(event, publicationId) {
                            event.preventDefault();

                            if (confirm("Êtes-vous sûr de vouloir supprimer cette publication ?")) {
                                document.getElementById('form-delete-' + publicationId).submit();
                            }
                        }
                 </script>
            
        </x-slot>
       
    </x-app-layout>

    
    
