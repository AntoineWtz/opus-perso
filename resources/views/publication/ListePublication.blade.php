<x-app-layout>
        <x-slot name="header">
            <h1>Profil de l'user</h1>
        </x-slot>
        <x-slot name="slot">
            <a class='w-1/3 border rounded-md' href="{{route ('GestionPublication.create') }}">New Publication
            </a>
            <?php 
                  echo $publications;
                  ?>
                <table  class="table-auto w-full">
                    <tr class='text-left'>
                        <th class="w-8">titre</th>
                        <th class="w-8">description</th>
                        <th class="w-5">Date Creation</th>
                        <th class="w-5">Date Mofication</th>
                        <th class="w-2">Statut</th>
                        <th class="w-2">Action</th>
                        
                    </tr>
                @foreach ($publications as $publication)
                 <tr class='border-collapse text-left'>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->titre}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->descriptif}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->created_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->updated_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->statut}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </td>
                    
                 </tr>
                @endforeach
                 </table>
            
        </x-slot>
       
    </x-app-layout>

    
    
