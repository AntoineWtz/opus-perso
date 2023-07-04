
<x-app-layout>

        <x-slot name="header">
            <h1 class='text-center text-4xl m-4'>Publication</h1>
            <p class="text-center">Liste des Publications</p>
        </x-slot>
        <x-slot name="slot">
            
            {{-- Boutton Création --}}
            <!-- bouton nouvelle entrée -->
            <div class="m-8 text-center">
                <x-bouton.buttonNew routeName="GestionPublication" sectionName="Publication" />
            </div>

                <table  class="table-auto w-full mx-auto">
                    <thead>
                        <tr class='text-center'>
                            <th class="w-auto">Titre</th>
                            <th class="w-auto">Date Creation</th>
                            <th class="w-auto">Date Mofication</th>
                            <th class="w-auto">Statut</th>
                            <th class="w-auto">Créateur</th>
                            <th class="w-auto">Modifier</th>
                            <th class="w-auto">Supprimer</th>                  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publications as $publication)
                        <tr class='border-collapse text-center'>
                            <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$publication->titre}}</td>
                            <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$publication->created_at}}</td>
                            <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$publication->updated_at}}</td>
                            <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$publication->statut}}</td>                     
                            <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>{{$publication->user->name}}</td>                     
                            <td class='px-4 border-l-2 border-y-2 border-solid bg-gray-100'>
                                <!-- modifier -->
                                @include('components.bouton.buttonModifier', ['routeName' => 'GestionPublication', 'itemId' => $publication->id])
                            </td>
                            <td class='px-4 border-l-2 border-y-2 border-gray-100 border-solid  bg-gray-50'>
                                <!-- supprimer -->
                                <x-bouton.buttonSupprimer routeName="GestionPublication" itemId="{{ $publication->id }}" />
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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

    
    
