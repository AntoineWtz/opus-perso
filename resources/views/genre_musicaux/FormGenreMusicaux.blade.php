
<x-app-layout>
    <x-slot name="header">
        <h1>New genre musical</h1>
    </x-slot>
    <x-slot name="slot">
   
    <form action="{{ route('GestionGenreMusicaux.store') }}">
      
        {{-- Nom du genre musical --}}
      <h2 class='font-bold'>Nom du genre musical</h2>
      <input class="w-10/12 rounded  border-gray-200" type="text" name="nom" placeholder="nom">
      
      {{-- Statut du genre musical --}}
      <h2>Visibilité du genre</h2>
      <select name="Visibilite" id="Visibilite" class="w-72 rounded border-gray-200">
          <option value="Actif">Actif(Selectionnable)</option>
          <option value="Inactif">Inactif(Inselectionnable)</option>
        </select>
        <button type="submit">Valider</button>
    </form>

    </x-slot>
   
</x-app-layout>
