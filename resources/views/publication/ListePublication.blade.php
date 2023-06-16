<x-app-layout>
        <x-slot name="header">
            <h1>Profil de l'user</h1>
        </x-slot>
        <x-slot name="slot">
            
            {{-- Boutton Création --}}
            <div class="flex ">

                <button class=" bg-transparent hover:bg-purple-600 text-purple-600 font-semibold hover:text-white py-2 px-4 border border-purple-600 hover:border-transparent rounded " type="submit">
                <a class="flex " href="{{ route('GestionPublication.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 st0 fill-current" fill="none" viewBox="0 0 24 24"><g  fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M1.25 8A6.75 6.75 0 0 1 8 1.25h8A6.75 6.75 0 0 1 22.75 8v8A6.75 6.75 0 0 1 16 22.75H8A6.75 6.75 0 0 1 1.25 16V8ZM8 2.75A5.25 5.25 0 0 0 2.75 8v8c0 2.9 2.35 5.25 5.25 5.25h8c2.9 0 5.25-2.35 5.25-5.25V8c0-2.9-2.35-5.25-5.25-5.25H8Z"/><path d="M12 7.007a.75.75 0 0 1 .75.75v8.486a.75.75 0 0 1-1.5 0V7.757a.75.75 0 0 1 .75-.75Z"/><path d="M17 12a.75.75 0 0 1-.75.75H7.765a.75.75 0 0 1 0-1.5h8.485A.75.75 0 0 1 17 12Z"/></g></svg>
                         <span class="ml-2">New Publication</span></a> </button>
            </div>
            <?php 
                  echo $publications;
                  ?>
                <table  class="table-auto">
                    <tr class='text-left'>
                        <th class="w-8">titre</th>
                        <th class="w-8">description</th>
                        <th class="w-5">Date Creation</th>
                        <th class="w-5">Date Mofication</th>
                        <th class="w-2">Statut</th>
                        <th class="w-1">Action</th>
                        <th class="w-1">Action</th>
                      
                    </tr>
                @foreach ($publications as $publication)
                 <tr class='border-collapse text-left'>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->titre}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50 .overflow-visible'>{{$publication->descriptif}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->created_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->updated_at}}</td>
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->statut}}</td>                     
                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>
                        
                        {{-- btn Editer --}}
                        <button class="bg-transparent hover:bg-indigo-500 text-indigo-500 font-semibold hover:text-white py-2 px-4 border border-indigo-500 hover:border-transparent rounded "><a href="{{ route('GestionPublication.edit' , ['GestionPublication' => $publication->id] )}}">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" class="w-5 h-5 st0 fill-current" viewBox="0 0 919.8 919.8"><path d="m684.833 209.4 27-33.8c37-46.2 29.5-113.7-16.801-150.7l-1.699-1.4c-46.2-37-113.7-29.5-150.7 16.8l-26.9 33.7 169.1 135.4z"/>
                                <path d="M520.532 493.5c.9 8.199 5 16 11.9 21.6 13.9 11.1 34.2 8.9 45.3-5l185.5-232c11.3-14.1 8.8-34.8-5.7-45.8-14-10.6-34.1-7.6-45.1 6.1l-18.1 22.6-31-24.8.1-.1-169-135.5-432.4 540.5 169.1 135.4 392.1-490 31 24.8-126.8 158.5c-5.599 6.899-7.799 15.5-6.9 23.7zM203.032 801.5l-159.3-127.601c-2.6 8.9-3.9 16.7-3.9 16.7l-36.5 174.8c-2.6 12.601 10.2 22.9 21.9 17.5l162.6-74c-.1 0 7.1-3 15.2-7.399zM893.633 832.8c-1.4 0-2.7.1-4.101.3l-245.699 31.8c-12.601 1.601-21.4-12.2-14.601-23 3.7-5.7 7.3-11.5 10.9-17.3 9.5-15.4-3.2-35.9-20.8-35.9-1.2 0-2.4.101-3.7.301l-322 48.399-38.5 5.8-105 15.801c-11.9 1.8-19.9 11.899-18.9 24 .4 5.399 2.6 10.5 6.1 14.3 4.1 4.5 9.8 7 16 7 1.2 0 2.4-.101 3.7-.3l383.801-57.7c13.1-2 22.1 12.8 14.399 23.6-2.5 3.4-5 6.9-7.5 10.3-6.899 9.4-5.3 25.101 2.7 33.2 4.1 4.2 9.3 6.4 14.8 6.4.601 0 1.3 0 1.9-.101h.201l331.3-42.199h.201c5.699-.9 10.699-4.2 14-9.301 3.6-5.6 4.899-12.5 3.3-18.699-2.602-10.102-11.402-16.701-22.501-16.701z"/></svg></a></button></td>
                        {{-- btn Supprimer --}}

                    <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>
                        <form action="{{ route('GestionPublication.destroy', $publication->id)}}" method="POST" id="form-delete">
                            @csrf
                            @method('DELETE')
                        <button onclick="return confirmDelete(event)" class="bg-transparent hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 border border-red-600 hover:border-transparent rounded ">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="_x32_" class="w-5 h-5 st0 fill-current" version="1.1" viewBox="0 0 512 512">
                                <path d="M88.594 464.731C90.958 491.486 113.368 512 140.234 512h231.523c26.858 0 49.276-20.514 51.641-47.269l25.642-335.928H62.952l25.642 335.928zm240.589-242.895c.357-5.876 5.4-10.349 11.277-9.992 5.877.357 10.342 5.409 9.993 11.277l-10.129 202.234a10.643 10.643 0 0 1-11.278 9.984c-5.876-.349-10.349-5.4-9.992-11.269l10.129-202.234zm-83.839.638c0-5.885 4.772-10.648 10.657-10.648s10.656 4.763 10.656 10.648v202.242c0 5.885-4.771 10.648-10.656 10.648-5.885 0-10.657-4.763-10.657-10.648V222.474zm-73.813-10.63c5.876-.357 10.92 4.116 11.278 9.992l10.137 202.234c.357 5.869-4.116 10.92-9.992 11.269-5.869.357-10.921-4.108-11.278-9.984l-10.137-202.234c-.357-5.868 4.115-10.92 9.992-11.277zM439.115 64.517s-34.078-5.664-43.34-8.479c-8.301-2.526-80.795-13.566-80.795-13.566l-2.722-19.297C310.388 9.857 299.484 0 286.642 0H225.34c-12.825 0-23.728 9.857-25.616 23.175l-2.721 19.297s-72.469 11.039-80.778 13.566c-9.261 2.815-43.357 8.479-43.357 8.479-10.324 2.848-17.536 12.655-17.536 23.863v21.926h401.336V88.38c0-11.208-7.212-21.015-17.553-23.863zM276.318 38.824h-40.636c-3.606 0-6.532-2.925-6.532-6.532s2.926-6.532 6.532-6.532h40.636c3.606 0 6.532 2.925 6.532 6.532s-2.926 6.532-6.532 6.532z" /></svg></buttononclick=class=>
                        </form>    
                    </td>
      
                       
                    
                    
                 </tr>
                @endforeach
                 </table>

                 <script>
                    function confirmDelete(event) {
                            event.preventDefault();

                            if (confirm("Êtes-vous sûr de vouloir supprimer cette publication ?")) {
                                document.getElementById('form-delete').submit();
                            }
                        }
                 </script>
            
        </x-slot>
       
    </x-app-layout>

    
    
